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

class ScanTerm
{
    private string $term;
    private ?bool $exclusive = null;

    public function __construct(string $term)
    {
        $this->term = $term;
    }

    public static function build(string $term): ScanTerm
    {
        return new ScanTerm($term);
    }

    public function exclusive(bool $exclusive): ScanTerm
    {
        $this->exclusive = $exclusive;
        return $this;
    }

    public static function export(ScanTerm $term): array
    {
        return [
            'term' => $term->term,
            'exclusive' => $term->exclusive
        ];
    }
}