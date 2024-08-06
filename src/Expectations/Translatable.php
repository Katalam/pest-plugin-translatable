<?php

declare(strict_types=1);

use Pest\Arch\Contracts\ArchExpectation;
use Pest\Arch\Expectations\Targeted;
use Pest\Arch\Support\FileLineFinder;
use PHPUnit\Architecture\Elements\ObjectDescription;

expect()->extend('toHaveNoEmptyTranslatable', fn (string|array $languages): ArchExpectation => Targeted::make(
    $this,
    static function (ObjectDescription $object) use (&$match, $languages): bool {
        $fileContents = (string) file_get_contents($object->path);

        preg_match_all('/(__|trans)\([\'"](?<translation>.+)[\'"]\)/i', $fileContents, $matches);

        $translationKeys = data_get($matches, 'translation', '') ?? '';

        if (is_string($languages)) {
            $languages = [$languages];
        }

        foreach ($translationKeys as $translationKey) {
            foreach ($languages as $language) {
                if (! app('translator')->has($translationKey, $language, false)) {
                    $match = $translationKey;

                    return false;
                }
            }
        }

        return true;
    },
    'to not have empty translation keys',
    FileLineFinder::where(static function (string $line) use (&$match): bool {
        return str_contains(strtolower($line), strtolower($match ?? ''));
    })
));
