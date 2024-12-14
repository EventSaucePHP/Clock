<?php

declare(strict_types=1);

namespace EventSauce\Clock;

class TestClock implements Clock
{
    /**
     * @private
     */
    public const FORMAT_OF_TIME = 'Y-m-d H:i:s.uO';
    private \DateTimeImmutable $time;
    private \DateTimeZone $timeZone;

    public function __construct(?\DateTimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone ?: new \DateTimeZone('UTC');
        $this->tick();
    }

    public function tick(): void
    {
        $this->time = new \DateTimeImmutable('now', $this->timeZone);
    }

    public function fixate(string $input, string $format = '!Y-m-d H:i:s'): void
    {
        $dateTime = \DateTimeImmutable::createFromFormat($format, $input, $this->timeZone);

        if ( ! $dateTime instanceof \DateTimeImmutable) {
            throw new \InvalidArgumentException("Invalid input for date/time fixation provided: {$input}");
        }

        $this->time = $dateTime;
    }

    public function moveForward(\DateInterval $interval): void
    {
        $this->time = $this->now()->add($interval);
    }

    public function now(): \DateTimeImmutable
    {
        return $this->time;
    }

    public function timeZone(): \DateTimeZone
    {
        return $this->timeZone;
    }
}
