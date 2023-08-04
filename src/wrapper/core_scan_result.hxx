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

// #pragma once
//
// #include "common.hxx"
//
// #include "core_error_info.hxx"
//
// #include <core/scan_result.hxx>
// #include <Zend/zend_API.h>
//
// #include <chrono>
// #include <memory>
// #include <string>
// #include <system_error>

#pragma once

#include "common.hxx"
#include <couchbase/store_semantics.hxx>

#include <core/operations/document_query.hxx>

#include <couchbase/cas.hxx>
#include <couchbase/durability_level.hxx>
#include <couchbase/persist_to.hxx>
#include <couchbase/replicate_to.hxx>

#include <Zend/zend_API.h>

#include <chrono>

namespace couchbase::php
{

COUCHBASE_API void
initialize_core_scan_result(const zend_function_entry* scan_result_functions);

COUCHBASE_API zend_class_entry*
get_core_scan_result();

typedef struct _cb_core_scan_result_data {
    zend_object std;
    std::unique_ptr<couchbase::core::scan_result> scan_result{};
} cb_core_scan_result_data;

class core_scan_result
{
  public:
    core_scan_result() = default;

    COUCHBASE_API
    core_error_info
    scan_next_item(zval* return_value, cb_core_scan_result_data* data);

    COUCHBASE_API
    core_error_info
    scan_is_cancelled(zval* return_value, cb_core_scan_result_data* data);

    COUCHBASE_API
    core_error_info
    scan_cancel(zval* return_value, cb_core_scan_result_data* data);
  private:
};
} // namespace couchbase:php
