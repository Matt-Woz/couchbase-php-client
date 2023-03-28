<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: couchbase/routing/v1/routing.proto

namespace Couchbase\Protostellar\Generated\Routing\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>couchbase.routing.v1.DataRoutingEndpoint</code>
 */
class DataRoutingEndpoint extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 endpoint_idx = 1;</code>
     */
    protected $endpoint_idx = 0;
    /**
     * Generated from protobuf field <code>repeated uint32 local_vbuckets = 2;</code>
     */
    private $local_vbuckets;
    /**
     * Generated from protobuf field <code>repeated uint32 group_vbuckets = 3;</code>
     */
    private $group_vbuckets;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $endpoint_idx
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $local_vbuckets
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $group_vbuckets
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Couchbase\Routing\V1\Routing::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint32 endpoint_idx = 1;</code>
     * @return int
     */
    public function getEndpointIdx()
    {
        return $this->endpoint_idx;
    }

    /**
     * Generated from protobuf field <code>uint32 endpoint_idx = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setEndpointIdx($var)
    {
        GPBUtil::checkUint32($var);
        $this->endpoint_idx = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 local_vbuckets = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLocalVbuckets()
    {
        return $this->local_vbuckets;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 local_vbuckets = 2;</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLocalVbuckets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::UINT32);
        $this->local_vbuckets = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 group_vbuckets = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGroupVbuckets()
    {
        return $this->group_vbuckets;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 group_vbuckets = 3;</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGroupVbuckets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::UINT32);
        $this->group_vbuckets = $arr;

        return $this;
    }

}

