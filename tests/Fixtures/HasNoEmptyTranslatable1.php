<?php

declare(strict_types=1);

namespace Tests\Fixtures;

class HasNoEmptyTranslatable1
{
    public function __construct() {}

    public function getString(): string
    {
        return __('test.string');
    }

    public function getSecondString(): string
    {
        return __('test.string2');
    }
}
