/**
 * Copyright 2016-Present Couchbase, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

#include "wrapper.hxx"

#include "../php_couchbase.hxx"
#include "common.hxx"
#include "connection_handle.hxx"
#include "conversion_utilities.hxx"
#include "core/utils/json.hxx"
#include "passthrough_transcoder.hxx"
#include "version.hxx"

#include <core/range_scan_options.hxx>
#include <core/range_scan_orchestrator.hxx>
#include <core/range_scan_orchestrator_options.hxx>

#include <couchbase/cluster.hxx>
#include <couchbase/collection.hxx>
#include <couchbase/mutation_token.hxx>
#include <couchbase/retry_reason.hxx>

#include <fmt/core.h>

#include <array>
#include <thread>

zend_class_entry* core_scan_result_ce;

static zend_object_handlers core_scan_result_object_handlers;


COUCHBASE_API
zend_class_entry*
get_core_scan_result()
{
    return core_scan_result_ce;
}

static void cb_core_scan_result_free_storage_handler(cb_core_scan_result_data *data)
{
    zend_object_std_dtor(&data->std);
    if (data->scan_result != nullptr && !data->scan_result->is_cancelled()) {
        data->scan_result->cancel();
    }
    data->scan_result.reset();
    efree(intern);
}


static zend_object_value core_scan_result_data_clone_handler(zval *object)
{
    cb_core_scan_result_data *old_object = zend_object_store_get_object(object);
    zend_object_value new_object_val = core_scan_result_create_object_handler(Z_OBJCE_P(object));
    cb_core_scan_result_data *new_object = zend_object_store_get_object_by_handle(
       new_object_val.handle
    );

    zend_objects_clone_members(
        &new_object->std, new_object_val,
        &old_object->std, Z_OBJ_HANDLE_P(object)
    );

    new_object->scan_result = old_object->scan_result; //TODO: should check if old object has scan_result first?

    return new_object_val;
}

zend_object_value core_scan_result_create_object_handler(zend_class_entry *class_type)
{
    zend_object_value retval;

    cb_core_scan_result_data *intern = emalloc(sizeof(cb_core_scan_result_data));
    memset(intern, 0, sizeof(cb_core_scan_result_data));

    zend_object_std_init(&intern->std, class_type);
    object_properties_init(&intern->std, class_type);

    retval.handle = zend_objects_store_put(
        intern,
        (zend_objects_store_dtor_t) zend_objects_destroy_object,
        (zend_objects_free_object_storage_t) cb_core_scan_result_free_storage_handler,
        (zend_objects_store_clone_t) core_scan_result_clone_object_storage_handler //TODO: unsure if this is necessary since we set the handler later
    };
    retval.handlers = &core_scan_result_object_handlers;

    return retval;
}

COUCHBASE_API
void
initialize_core_scan_result(const zend_function_entry* scan_result_functions)
{
    zend_class_entry ce;
    INIT_NS_CLASS_ENTRY(ce, "Couchbase\\Scan", "CoreScanResult", scan_result_functions);
    core_scan_result_ce = zend_register_internal_class(&ce);
    zend_declare_property_null(core_scan_result_ce, ZEND_STRL("core"), ZEND_ACC_PRIVATE);
    core_scan_result_ce->create_object = core_scan_result_create_object_handler;

    memcpy(&core_scan_result_object_handlers, zend_get_std_object_handlers(), sizeof(zend_object_handlers));
    core_scan_result_object_handlers.clone_obj = core_scan_result_data_clone_handler;
}


COUCHBASE_API
core_scan_result::scan_next_item(zval* return_value, cb_core_scan_result_data* data)
{
    auto barrier = std::make_shared<std::promise<tl::expected<couchbase::core::range_scan_item, std::error_code>>>();
    auto f = barrier->get_future();
    data->scan_result->next([barrier](couchbase::core::range_scan_item item, std::error_code ec) {
        if (ec) {
            return barrier->set_value(tl::unexpected(ec));
        } else {
            return barrier->set_value(item);
        }
    });
    auto resp = f.get();
    if (!resp.has_value()) {
        if (resp.error() != couchbase::errc::key_value::range_scan_completed) {
            return { resp.error(), ERROR_LOCATION, "Unable to fetch next scan item");
        }
        array_init(return_value);
        return {};
    }
    auto item = resp.value();
    array_init(return_value);
    add_assoc_stringl(return_value, "id", item.key.data(), item.key.size());
    if (item.body.has_value()) {
        auto body = item.body.value();
        auto cas = fmt::format("{:x}", body.cas.value());
        add_assoc_stringl(return_value, "cas", cas.data(), cas.size());
        add_assoc_long(return_value, "flags", body.flags);
        add_assoc_stringl(return_value, "value", reinterpret_cast<const char*>(body.value.data()), body.value.size());
        add_assoc_long(return_value, "expiry", body.expiry.value());
        add_assoc_bool(return_value, "idsOnly", 0);
    } else {
        add_assoc_bool(return_value, "idsOnly", 1);
    }
    return {};
}

COUCHBASE_API
core_error_info
core_scan_result::scan_is_cancelled(zval* return_value, cb_core_scan_result_data* data)
{
    auto resp = data->scan_result->is_cancelled();
    array_init(return_value);
    add_assoc_bool(return_value, "isCancelled", resp);
    return {};
}

COUCHBASE_API
core_error_info
core_scan_result::scan_cancel(zval* return_value, cb_core_scan_result_data* data)
{
    data->scan_result->cancel();
    array_init(return_value);
    return {};
}
