<?php

function counterFilePath(): string
{
    $counterFile = getenv('COUNTER_FILE');
    if ($counterFile === false || $counterFile === '') {
        return __DIR__ . '/counter.json';
    }

    return $counterFile;
}

function ensureCounterStorage(string $counterFile): void
{
    $directory = dirname($counterFile);
    if (!is_dir($directory)) {
        mkdir($directory, 0775, true);
    }

    if (!file_exists($counterFile)) {
        file_put_contents($counterFile, '');
    }
}
