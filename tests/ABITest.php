<?php

use Couchbase\ExtensionNamespaceResolver;

include_once __DIR__ . "/Helpers/CouchbaseTestCase.php";

class ABITest extends Helpers\CouchbaseTestCase
{
    public function setUp(): void
    {
        $this->skipIfNotABI();
        parent::setUp();
    }

    public function testBothExtensionsLoaded() {
        $abi = getenv('TEST_ABI');
        $unversionedFunc = 'Couchbase\\Extension\\version';
        $versionedFunc = 'Couchbase\\Extension' . ExtensionNamespaceResolver::COUCHBASE_EXTENSION_VERSION . '\\version';
        if ($abi == "both") {
            print_r($unversionedFunc());
            print_r($versionedFunc());
        } else if ($abi == "versioned") {
            print_r($versionedFunc());
        } else if ($abi == "unversioned") {
            print_r($unversionedFunc());
        }
    }

    public function testNamespaceResolver()
    {
        ExtensionNamespaceResolver::defineExtensionNamespace();
        $abi = getenv('TEST_ABI');

        if ($abi == "both" || $abi == "unversioned") {
            $this->assertEquals("Couchbase\\Extension", COUCHBASE_EXTENSION_NAMESPACE);
        } else if ($abi == "versioned") {
            $this->assertEquals("Couchbase\\Exception" . ExtensionNamespaceResolver::COUCHBASE_EXTENSION_VERSION, COUCHBASE_EXTENSION_NAMESPACE);
        }
    }
}