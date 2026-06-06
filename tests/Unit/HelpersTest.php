<?php

use function WeStacks\TeleBot\array_pull;
use function WeStacks\TeleBot\get_public_object_vars;
use function WeStacks\TeleBot\split;

test('split handles simple command with no arguments', function () {
    $result = split('/start');

    expect($result)->toBe(['/start']);
});

test('split handles command with one argument', function () {
    $result = split('/start arg1');

    expect($result)->toBe(['/start', 'arg1']);
});

test('split handles command with multiple arguments', function () {
    $result = split('/start arg1 arg2 arg3');

    expect($result)->toBe(['/start', 'arg1', 'arg2', 'arg3']);
});

test('split handles quoted arguments', function () {
    $result = split('/start "arg1 with spaces"');

    expect($result)->toBe(['/start', 'arg1 with spaces']);
});

test('split handles single-quoted arguments', function () {
    $result = split("/start 'arg1 with spaces'");

    expect($result)->toBe(['/start', 'arg1 with spaces']);
});

test('split handles escaped quotes in single-quoted strings', function () {
    $result = split("/start 'arg1\\'s value'");

    expect($result)->toBe(['/start', "arg1's value"]);
});

test('split handles escaped backslash in single-quoted strings', function () {
    $result = split("/start 'path\\\\to\\\\file'");

    expect($result)->toBe(['/start', 'path\\to\\file']);
});

test('split handles empty argument list', function () {
    $result = split('');

    expect($result)->toBe([]);
});

test('array_pull removes and returns key from array', function () {
    $array = ['name' => 'John', 'age' => 30];

    $result = array_pull($array, 'name');

    expect($result)->toBe('John');
    expect($array)->toBe(['age' => 30]);
});

test('array_pull returns default for non-existent key', function () {
    $array = ['name' => 'John'];

    $result = array_pull($array, 'non_existent', 'default');

    expect($result)->toBe('default');
    expect($array)->toBe(['name' => 'John']);
});

test('array_pull returns null when no default and key missing', function () {
    $array = ['name' => 'John'];

    $result = array_pull($array, 'non_existent');

    expect($result)->toBeNull();
});

test('get_public_object_vars returns public properties', function () {
    $obj = new stdClass();
    $obj->public = 'value';
    $obj->private = 'hidden'; // stdClass has no private, but this is fine

    $vars = get_public_object_vars($obj);

    expect($vars)->toHaveKeys(['public', 'private']);
});

test('get_public_object_vars returns empty for object with no properties', function () {
    $obj = new stdClass();

    $vars = get_public_object_vars($obj);

    expect($vars)->toBeEmpty();
});
