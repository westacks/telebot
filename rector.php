<?php

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPhpVersion(PhpVersion::PHP_82)
    ->withSets([
        SetList::DEAD_CODE,
        SetList::PHP_82,
    ])
    ->withIndent(' ', 4)
    ->withPaths([
        __DIR__.'/src',
        __DIR__.'/tests',
        __DIR__.'/generator',
    ]);
