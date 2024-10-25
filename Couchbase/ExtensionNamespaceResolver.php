<?php

namespace Couchbase;


use Couchbase\Exception\CouchbaseException;

class ExtensionNamespaceResolver
{
    const COUCHBASE_EXTENSION_VERSION = "_4_2_5";

    public static function defineExtensionNamespace() {
        if (defined('COUCHBASE_EXTENSION_NAMESPACE')) {
            return;
        }
        $namespace = self::aliasExtensionNamespace();
        define('COUCHBASE_EXTENSION_NAMESPACE', $namespace);
    }

    private static function aliasExtensionNamespace() {
        if (extension_loaded('couchbase')) {
            return "Couchbase\\Extension";
        } elseif (extension_loaded('couchbase' . self::COUCHBASE_EXTENSION_VERSION)) {
            return "Couchbase\\Extension" . self::COUCHBASE_EXTENSION_VERSION;
        } else {
            throw new CouchbaseException("Neither Couchbase extension nor valid versioned Couchbase extension is loaded.");
        }
    }
}
