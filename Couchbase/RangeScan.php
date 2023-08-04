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

class RangeScan implements ScanType
{
    private ?ScanTerm $from = null;
    private ?ScanTerm $to = null;

    public static function build(): RangeScan
    {
        return new RangeScan();
    }

    public function from(ScanTerm $from): RangeScan
    {
        $this->from = $from;
        return $this;
    }

    public function to(ScanTerm $to): RangeScan
    {
        $this->to = $to;
        return $this;
    }

    public static function export(RangeScan $rangeScan): array
    {
        return [
            'type' => 'range_scan',
            'from' => $rangeScan->from == null ? null : $rangeScan->from->export($rangeScan->from),
            'to' => $rangeScan->to == null ? null : $rangeScan->to->export($rangeScan->to)
        ];
    }
}
