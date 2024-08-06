<?php

declare(strict_types=1);

use Pest\Arch\Exceptions\ArchExpectationFailedException;
use Tests\Fixtures\HasEmptyTranslatable1;
use Tests\Fixtures\HasEmptyTranslatable2;
use Tests\Fixtures\HasNoEmptyTranslatable1;
use Tests\Fixtures\HasNoEmptyTranslatable2;
use Tests\Fixtures\HasNoTranslatable;
use Tests\Fixtures\HasSomeEmptyTranslatable;

dataset('locales', ['de', 'en', ['de', 'en']]);

describe('pass valid cases', function () {
    test('__ helper', function (string|array $locales) {
        expect(HasNoEmptyTranslatable1::class)
            ->toHaveNoEmptyTranslatable($locales);
    })->with('locales');

    test('trans helper', function (string|array $locales) {
        expect(HasNoEmptyTranslatable2::class)
            ->toHaveNoEmptyTranslatable($locales);
    })->with('locales');

    test('no translatable', function (string|array $locales) {
        expect(HasNoTranslatable::class)
            ->toHaveNoEmptyTranslatable($locales);
    })->with('locales');

    test('mixed locales', function () {
        expect(HasSomeEmptyTranslatable::class)
            ->toHaveNoEmptyTranslatable('en');

        expect(HasSomeEmptyTranslatable::class)
            ->not
            ->toHaveNoEmptyTranslatable('de');
    });
});

describe('pass invalid cases negated', function () {
    test('__ helper', function (string|array $locales) {
        expect(HasEmptyTranslatable1::class)
            ->not
            ->toHaveNoEmptyTranslatable($locales);
    })
        ->with('locales');

    test('trans helper', function (string|array $locales) {
        expect(HasEmptyTranslatable2::class)
            ->not
            ->toHaveNoEmptyTranslatable($locales);
    })
        ->with('locales');
});

describe('fail invalid cases', function () {
    test('__ helper', function (string|array $locales) {
        expect(HasEmptyTranslatable1::class)
            ->toHaveNoEmptyTranslatable($locales);
    })
        ->with('locales')
        ->throws(ArchExpectationFailedException::class);

    test('trans helper', function (string|array $locales) {
        expect(HasEmptyTranslatable2::class)
            ->toHaveNoEmptyTranslatable($locales);
    })
        ->with('locales')
        ->throws(ArchExpectationFailedException::class);
});
