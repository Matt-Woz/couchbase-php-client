<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: couchbase/internal/hooks/v1/hooks.proto

namespace Couchbase\Protostellar\Generated\Internal\Hooks\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>couchbase.internal.hooks.v1.HookAction</code>
 */
class HookAction extends \Google\Protobuf\Internal\Message
{
    protected $action;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\PBIf $if
     *     @type \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\Counter $counter
     *     @type \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\WaitOnBarrier $wait_on_barrier
     *     @type \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\SignalBarrier $signal_barrier
     *     @type \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\ReturnResponse $return_response
     *     @type \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\ReturnError $return_error
     *     @type \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\Execute $execute
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Couchbase\Internal\Hooks\V1\Hooks::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.If if = 1;</code>
     * @return \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\PBIf|null
     */
    public function getIf()
    {
        return $this->readOneof(1);
    }

    public function hasIf()
    {
        return $this->hasOneof(1);
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.If if = 1;</code>
     * @param \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\PBIf $var
     * @return $this
     */
    public function setIf($var)
    {
        GPBUtil::checkMessage($var, \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\PBIf::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.Counter counter = 2;</code>
     * @return \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\Counter|null
     */
    public function getCounter()
    {
        return $this->readOneof(2);
    }

    public function hasCounter()
    {
        return $this->hasOneof(2);
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.Counter counter = 2;</code>
     * @param \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\Counter $var
     * @return $this
     */
    public function setCounter($var)
    {
        GPBUtil::checkMessage($var, \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\Counter::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.WaitOnBarrier wait_on_barrier = 3;</code>
     * @return \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\WaitOnBarrier|null
     */
    public function getWaitOnBarrier()
    {
        return $this->readOneof(3);
    }

    public function hasWaitOnBarrier()
    {
        return $this->hasOneof(3);
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.WaitOnBarrier wait_on_barrier = 3;</code>
     * @param \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\WaitOnBarrier $var
     * @return $this
     */
    public function setWaitOnBarrier($var)
    {
        GPBUtil::checkMessage($var, \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\WaitOnBarrier::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.SignalBarrier signal_barrier = 4;</code>
     * @return \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\SignalBarrier|null
     */
    public function getSignalBarrier()
    {
        return $this->readOneof(4);
    }

    public function hasSignalBarrier()
    {
        return $this->hasOneof(4);
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.SignalBarrier signal_barrier = 4;</code>
     * @param \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\SignalBarrier $var
     * @return $this
     */
    public function setSignalBarrier($var)
    {
        GPBUtil::checkMessage($var, \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\SignalBarrier::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.ReturnResponse return_response = 5;</code>
     * @return \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\ReturnResponse|null
     */
    public function getReturnResponse()
    {
        return $this->readOneof(5);
    }

    public function hasReturnResponse()
    {
        return $this->hasOneof(5);
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.ReturnResponse return_response = 5;</code>
     * @param \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\ReturnResponse $var
     * @return $this
     */
    public function setReturnResponse($var)
    {
        GPBUtil::checkMessage($var, \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\ReturnResponse::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.ReturnError return_error = 6;</code>
     * @return \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\ReturnError|null
     */
    public function getReturnError()
    {
        return $this->readOneof(6);
    }

    public function hasReturnError()
    {
        return $this->hasOneof(6);
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.ReturnError return_error = 6;</code>
     * @param \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\ReturnError $var
     * @return $this
     */
    public function setReturnError($var)
    {
        GPBUtil::checkMessage($var, \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\ReturnError::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.Execute execute = 7;</code>
     * @return \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\Execute|null
     */
    public function getExecute()
    {
        return $this->readOneof(7);
    }

    public function hasExecute()
    {
        return $this->hasOneof(7);
    }

    /**
     * Generated from protobuf field <code>.couchbase.internal.hooks.v1.HookAction.Execute execute = 7;</code>
     * @param \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\Execute $var
     * @return $this
     */
    public function setExecute($var)
    {
        GPBUtil::checkMessage($var, \Couchbase\Protostellar\Generated\Internal\Hooks\V1\HookAction\Execute::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->whichOneof("action");
    }

}

