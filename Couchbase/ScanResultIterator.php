<?php

namespace Couchbase;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use Traversable;

class ScanResultIterator implements Countable, IteratorAggregate, ArrayAccess
{
    private $core_scan_result;
    private Transcoder $transcoder;
    public function __construct($core_scan_result, Transcoder $transcoder)
    {
        $this->core_scan_result = $core_scan_result;
        $this->transcoder = $transcoder;
    }

//    public function getIterator(): Traversable
//    {
//        // TODO: Implement getIterator() method.
//    }
//
//    public function offsetExists(mixed $offset): bool
//    {
//        // TODO: Implement offsetExists() method.
//    }
//
//    public function offsetGet(mixed $offset): mixed
//    {
//        // TODO: Implement offsetGet() method.
//    }
//
//    public function offsetSet(mixed $offset, mixed $value): void
//    {
//        // TODO: Implement offsetSet() method.
//    }
//
//    public function offsetUnset(mixed $offset): void
//    {
//        // TODO: Implement offsetUnset() method.
//    }
//
//    public function count(): int
//    {
//        // TODO: Implement count() method.
//    }
}