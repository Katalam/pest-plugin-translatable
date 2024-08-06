<?php

declare(strict_types=1);

namespace Tests\Fixtures;

class HasEmptyTranslatable2
{
    public function __construct() {}

    public function getString(): string
    {
        return trans('test.abc');
    }

    public function getSecondString(): string
    {
        return trans('test.abc2');
    }
}
