<?php

declare(strict_types=1);

use Tests\Fixtures\HasNoEmptyTranslatable;

describe('pass valid cases', function () {
    test('__ helper', function () {
        expect(HasNoEmptyTranslatable::class)
            ->toHaveNoEmptyTranslatable();
    });
});
