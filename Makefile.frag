$(phplibdir)/libcouchbase_php_wrapper.${SHLIB_SUFFIX_NAME}: 
	$(CMAKE) --build $(COUCHBASE_CMAKE_BUILD_DIRECTORY) --verbose

.PHONY: build-wrapper
build-wrapper: $(phplibdir)/libcouchbase.${SHLIB_SUFFIX_NAME}