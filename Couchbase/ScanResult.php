<?php

namespace Couchbase;

use DateTimeImmutable;
use DateTimeInterface;

class ScanResult extends Result
{
    private Transcoder $transcoder;
    private bool $idsOnly;
    private ?int $flags = null;
    private ?string $value = null;
    private ?int $expiry = null;

    public function __construct(array $responses, Transcoder $transcoder)
    {
        parent::__construct($responses);
        $this->transcoder = $transcoder;
        $this->idsOnly = $responses['idsOnly'];
        if (array_key_exists('flags', $responses)) {
            $this->flags = $responses['flags'];
        }
        if (array_key_exists('value', $responses)) {
            $this->value = $responses['value'];
        }
        if (array_key_exists('expiry', $responses)) {
            $this->expiry = $responses['expiry'];
        }
    }

    public function idsOnly(): bool
    {
        return $this->idsOnly;
    }

    public function content()
    {
        return $this->transcoder->decode($this->value, $this->flags);
    }

    public function contentAs(Transcoder $transcoder, ?int $overrideFlags = null)
    {
        return $transcoder->decode($this->value, $overrideFlags == null ? $this->flags : $overrideFlags);
    }

    public function expiryTime(): ?DateTimeInterface
    {
        if ($this->expiry == null || $this->expiry == 0) {
            return null;
        }
        return DateTimeImmutable::createFromFormat("U", sprintf("%d", $this->expiry)) ?: null;
    }
}
