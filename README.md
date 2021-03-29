# EventSauce Clock

This is the EventSauce Clock component, which provides
a straight forward way to consume time. Using a clock
makes your code easier to test.

## Installation

```bash
composer require eventsauce/clock
```

## Usage

This package provides two implementations of the `EventSauce\Clock\Clock` interface.

---

In your production configuration, use the `EventSauce\Clock\SystemClock` implementation.

```php
<?php

use EventSauce\Clock\SystemClock;

$clock = new SystemClock(new DateTimeZone('UTC') /* timezone optional */);

$dateTimeImmutable = $clock->now();
$timezone = $clock->timeZone();
```

In your test configuration, use the `EventSauce\Clock\TestClock` implementation.

```php
<?php

use EventSauce\Clock\TestClock;

$testClock = new TestClock();
$dateTimeImmutable = $testClock->now();
$timezone = $testClock->timeZone();

// move the clock forward
$testClock->moveForward(DateInterval::createFromDateString('1 day'));

// Skip to system "now"
$testClock->tick();

// Fixate the clock to a specific date and time
$testClock->fixate('1987-11-24 18:33:10');
```
