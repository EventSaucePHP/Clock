<?php

declare(strict_types=1);

namespace EventSauce\Clock;

use DateTimeImmutable;
use DateTimeZone;

class SystemClock implements Clock
{
    private DateTimeZone $timeZone;

    public function __construct(DateTimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone ?: new DateTimeZone('UTC');
    }

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }

    public function timeZone(): DateTimeZone
    {
        return $this->timeZone;
    }
}
