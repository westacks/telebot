<?php

use WeStacks\TeleBot\Foundation\FileStorage;
use WeStacks\TeleBot\TeleBot;

function createStorage(): FileStorage
{
    $bot = new TeleBot('test_file_storage');

    return new FileStorage($bot);
}

function cleanupStorage(FileStorage $storage): void
{
    $reflection = new ReflectionClass($storage);
    $path = $reflection->getMethod('path')->invoke($storage);

    if (is_dir($path)) {
        array_map('unlink', glob($path . '/*'));
        rmdir($path);
    }
}

test('can set and get a value', function () {
    $storage = createStorage();

    $storage->set('test_key', 'test_value');
    $result = $storage->get('test_key');

    expect($result)->toBe('test_value');

    cleanupStorage($storage);
});

test('can get default value for non-existent key', function () {
    $storage = createStorage();

    $result = $storage->get('non_existent_key', 'default_value');

    expect($result)->toBe('default_value');

    cleanupStorage($storage);
});

test('returns null when no default provided for non-existent key', function () {
    $storage = createStorage();

    $result = $storage->get('non_existent_key');

    expect($result)->toBeNull();

    cleanupStorage($storage);
});

test('can delete an existing value', function () {
    $storage = createStorage();

    $storage->set('delete_key', 'delete_value');
    expect($storage->get('delete_key'))->toBe('delete_value');

    $deleted = $storage->delete('delete_key');
    expect($deleted)->toBeTrue();
    expect($storage->get('delete_key'))->toBeNull();

    cleanupStorage($storage);
});

test('delete returns false for non-existent key', function () {
    $storage = createStorage();

    $result = $storage->delete('non_existent_key');

    expect($result)->toBeFalse();

    cleanupStorage($storage);
});

test('can overwrite an existing value', function () {
    $storage = createStorage();

    $storage->set('overwrite_key', 'original');
    expect($storage->get('overwrite_key'))->toBe('original');

    $storage->set('overwrite_key', 'updated');
    expect($storage->get('overwrite_key'))->toBe('updated');

    cleanupStorage($storage);
});

test('handles multiple independent keys', function () {
    $storage = createStorage();

    $storage->set('key1', 'value1');
    $storage->set('key2', 'value2');
    $storage->set('key3', 'value3');

    expect($storage->get('key1'))->toBe('value1');
    expect($storage->get('key2'))->toBe('value2');
    expect($storage->get('key3'))->toBe('value3');

    $storage->delete('key2');

    expect($storage->get('key1'))->toBe('value1');
    expect($storage->get('key2'))->toBeNull();
    expect($storage->get('key3'))->toBe('value3');

    cleanupStorage($storage);
});

test('creates storage directory on instantiation', function () {
    $storage = createStorage();

    $reflection = new ReflectionClass($storage);
    $path = $reflection->getMethod('path')->invoke($storage);

    expect(is_dir($path))->toBeTrue();

    cleanupStorage($storage);
});
