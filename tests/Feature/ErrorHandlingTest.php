<?php

use WeStacks\TeleBot\Exceptions\TelegramApiException;
use WeStacks\TeleBot\Exceptions\TelegramObjectException;

test('TelegramApiException is throwable', function () {
    $exception = new TelegramApiException([
        'ok' => false,
        'description' => 'Not Found',
        'error_code' => 404,
    ], 404);

    expect($exception)->toBeInstanceOf(\Throwable::class);
    expect($exception->getMessage())->toBe('Not Found');
    expect($exception->getCode())->toBe(404);
});

test('TelegramApiException without error code defaults to 0', function () {
    $exception = new TelegramApiException([
        'ok' => false,
        'description' => 'Forbidden',
    ]);

    expect($exception->getCode())->toBe(0);
});

test('TelegramApiException with parameters', function () {
    $exception = new TelegramApiException([
        'ok' => false,
        'description' => 'Too Many Requests',
        'error_code' => 429,
        'parameters' => [
            'retry_after' => 30,
        ],
    ], 429);

    expect($exception->parameters)->toBeInstanceOf(
        WeStacks\TeleBot\Objects\ResponseParameters::class
    );
    expect($exception->parameters->retry_after)->toBe(30);
});

test('TelegramApiException without parameters has null parameters', function () {
    $exception = new TelegramApiException([
        'ok' => false,
        'description' => 'Not Found',
        'error_code' => 404,
    ], 404);

    expect($exception->parameters)->toBeNull();
});

test('TelegramObjectException is throwable', function () {
    $exception = new TelegramObjectException('Unable to synthesize object');

    expect($exception)->toBeInstanceOf(\Throwable::class);
    expect($exception)->toBeInstanceOf(\UnexpectedValueException::class);
    expect($exception->getMessage())->toBe('Unable to synthesize object');
});

test('TelegramObjectException with previous exception', function () {
    $previous = new \InvalidArgumentException('Original error');
    $exception = new TelegramObjectException('Wrapper error', 0, $previous);

    expect($exception->getPrevious())->toBe($previous);
});
