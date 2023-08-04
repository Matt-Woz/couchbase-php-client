<?php

/**
 * Copyright 2014-Present Couchbase, Inc.
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

declare(strict_types=1);

namespace Couchbase;

use Couchbase\Exception\InvalidArgumentException;

class ScanOptions
{
    private Transcoder $transcoder;
    private ?MutationState $consistentWith = null;
    private ?int $timeoutMilliseconds = null;
    private ?bool $idsOnly = null;
    private ?int $batchByteLimit = null;
    private ?int $batchItemLimit = null;
    private ?int $concurrency = null;

    public function __construct()
    {
        $this->transcoder = JsonTranscoder::getInstance();
    }

    public static function build(): ScanOptions
    {
        return new ScanOptions();
    }

    public function transcoder(Transcoder $transcoder): ScanOptions
    {
        $this->transcoder = $transcoder;
        return $this;
    }

    public function consistentWith(MutationState $state): ScanOptions
    {
        $this->consistentWith = $state;
        return $this;
    }

    public function timeout(int $milliseconds): ScanOptions
    {
        $this->timeoutMilliseconds = $milliseconds;
        return $this;
    }

    public function idsOnly(bool $idsOnly): ScanOptions
    {
        $this->idsOnly = $idsOnly;
        return $this;
    }

    public function batchByteLimit(int $batchByteLimit): ScanOptions
    {
        $this->batchByteLimit = $batchByteLimit;
        return $this;
    }

    public function setBatchItemLimit(int $batchItemLimit): ScanOptions
    {
        $this->batchItemLimit = $batchItemLimit;
        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setConcurrency(int $concurrency): ScanOptions
    {
        if ($concurrency < 1) {
            throw new InvalidArgumentException("Concurrency must be positive");
        }
        $this->concurrency = $concurrency;
        return $this;
    }

    public static function getTranscoder(?ScanOptions $options): Transcoder
    {
        if ($options == null) {
            return JsonTranscoder::getInstance();
        }
        return $options->transcoder;
    }

    public static function export(?ScanOptions $options): array
    {
        if ($options == null) {
            return [];
        }
        return [
            'consistentWith' => $options->consistentWith == null ? null : $options->consistentWith->export(),
            'timeoutMilliseconds' => $options->timeoutMilliseconds,
            'idsOnly' => $options->idsOnly,
            'batchByteLimit' => $options->batchByteLimit,
            'batchItemLimit' => $options->batchItemLimit,
            'concurrency' => $options->concurrency,
        ];
    }
}
