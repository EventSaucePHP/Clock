<?php

declare(strict_types=1);

namespace EventSauce\Clock;

use DateTimeImmutable;
use DateTimeZone;

interface Clock
{
    public function now(): DateTimeImmutable;

    public function timeZone(): DateTimeZone;
}
