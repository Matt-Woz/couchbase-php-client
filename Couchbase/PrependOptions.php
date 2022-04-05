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

class PrependOptions
{
    private ?int $timeoutMilliseconds = null;
    private ?string $durabilityLevel = null;
    private ?int $durabilityTimeoutSeconds = null;

    /**
     * Static helper to keep code more readable
     *
     * @return PrependOptions
     * @since 4.0.0
     */
    public static function build(): PrependOptions
    {
        return new PrependOptions();
    }

    /**
     * Sets the operation timeout in milliseconds.
     *
     * @param int $milliseconds the operation timeout to apply
     * @return PrependOptions
     * @since 4.0.0
     */
    public function timeout(int $milliseconds): PrependOptions
    {
        $this->timeoutMilliseconds = $milliseconds;
        return $this;
    }

    /**
     * Sets the durability level to enforce when writing the document.
     *
     * @param string $level the durability level to enforce
     * @param int|null $timeoutSeconds
     * @return PrependOptions
     * @since 4.0.0
     */
    public function durabilityLevel(string $level, ?int $timeoutSeconds): PrependOptions
    {
        $this->durabilityLevel = $level;
        $this->durabilityTimeoutSeconds = $timeoutSeconds;
        return $this;
    }

    /**
     * @private
     * @param PrependOptions|null $options
     * @return array
     * @since 4.0.0
     */
    public static function export(?PrependOptions $options): array
    {
        if ($options == null) {
            return [];
        }
        return [
            'timeoutMilliseconds' => $options->timeoutMilliseconds,
            'durabilityLevel' => $options->durabilityLevel,
            'durabilityTimeoutSeconds' => $options->durabilityTimeoutSeconds,
        ];
    }
}
