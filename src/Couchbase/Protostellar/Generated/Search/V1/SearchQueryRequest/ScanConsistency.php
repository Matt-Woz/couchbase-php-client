<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: couchbase/search/v1/search.proto

namespace Couchbase\Protostellar\Generated\Search\V1\SearchQueryRequest;

use UnexpectedValueException;

/**
 * Protobuf type <code>couchbase.search.v1.SearchQueryRequest.ScanConsistency</code>
 */
class ScanConsistency
{
    /**
     * Generated from protobuf enum <code>SCAN_CONSISTENCY_NOT_BOUNDED = 0;</code>
     */
    const SCAN_CONSISTENCY_NOT_BOUNDED = 0;

    private static $valueToName = [
        self::SCAN_CONSISTENCY_NOT_BOUNDED => 'SCAN_CONSISTENCY_NOT_BOUNDED',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScanConsistency::class, \Couchbase\Protostellar\Generated\Search\V1\SearchQueryRequest_ScanConsistency::class);

