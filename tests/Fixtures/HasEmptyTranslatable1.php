<?php

declare(strict_types=1);

namespace Tests\Fixtures;

class HasEmptyTranslatable1
{
    public function __construct() {}

    public function getString(): string
    {
        return __('test.abc');
    }

    public function getSecondString(): string
    {
        return __('test.abc2');
    }
}
