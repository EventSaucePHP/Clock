<?php

declare(strict_types=1);

namespace EventSauce\Clock;

use DateTimeImmutable;
use DateTimeZone;
use Psr\Clock\ClockInterface;

interface Clock extends ClockInterface
{
    public function now(): DateTimeImmutable;

    public function timeZone(): DateTimeZone;
}
