<?php

/*
 * Copyright 2022-Present Couchbase, Inc.
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

namespace Couchbase\StellarNebula;

use InvalidArgumentException;

class SamplingScan implements ScanType
{
    private int|string $limit;
    private int|string $seed;

    public function __construct(int|string $limit, int|string $seed = null)
    {
        if ($limit < 0) {
            throw new InvalidArgumentException("Limit cannot be less than 0");
        }
        $this->limit = $limit;
        $this->seed = $seed;
    }

    public function getLimit(): int|string
    {
        return $this->limit;
    }

    public function getSeed(): int|string
    {
        return $this->seed;
    }

    public function getScanType(): string
    {
        return "sampling_scan";
    }
}
