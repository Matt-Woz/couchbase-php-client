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

class SamplingScan implements ScanType
{
    private int $limit;
    private ?int $seed = null;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(int $limit)
    {
        if ($limit < 1) {
            throw new InvalidArgumentException("The limit must be positive");
        }
        $this->limit = $limit;
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function build(int $limit): SamplingScan
    {
        return new SamplingScan($limit);
    }

    public function seed(int $seed): SamplingScan
    {
        $this->seed = $seed;
        return $this;
    }

    public static function export(SamplingScan $samplingScan): array
    {
        return [
            'type' => 'sampling_scan',
            'limit' => $samplingScan->limit,
            'seed' => $samplingScan->seed,
        ];
    }
}
