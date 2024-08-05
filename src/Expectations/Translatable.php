<?php

declare(strict_types=1);

use Pest\Arch\Contracts\ArchExpectation;
use Pest\Arch\Expectations\Targeted;
use Pest\Arch\Support\FileLineFinder;
use PHPUnit\Architecture\Elements\ObjectDescription;

expect()->extend('toHaveNoEmptyTranslatable', fn (): ArchExpectation => Targeted::make(
    $this,
    function (ObjectDescription $object) use (&$match): bool {
        $fileContents = (string) file_get_contents($object->path);

        preg_match_all('/(__|trans)\([\'"](?<translation>.+)[\'"]\)/i', $fileContents, $matches);

        $translationKeys = data_get($matches, 'translation', '') ?? '';

        foreach ($translationKeys as $translationKey) {
            if (! app('translator')->has($translationKey)) {
                $match = $translationKey;
                return false;
            }
        }

        return true;
    },
    'to not have empty translation keys',
    FileLineFinder::where(static function (string $line) use (&$match): bool {
        return str_contains(strtolower($line), strtolower($match ?? ''));
    })
));
