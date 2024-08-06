<?php

declare(strict_types=1);

namespace Tests\Fixtures;

class HasSomeEmptyTranslatable
{
    public function __construct() {}

    public function getString(): string
    {
        return __('test.foo');
    }
}
