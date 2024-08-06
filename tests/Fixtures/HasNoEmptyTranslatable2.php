<?php

declare(strict_types=1);

namespace Tests\Fixtures;

class HasNoEmptyTranslatable2
{
    public function __construct() {}

    public function getString(): string
    {
        return trans('test.string');
    }

    public function getSecondString(): string
    {
        return trans('test.string2');
    }
}
