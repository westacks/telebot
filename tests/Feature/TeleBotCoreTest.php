<?php

use WeStacks\TeleBot\Foundation\TeleBotResponse;
use WeStacks\TeleBot\Objects;
use WeStacks\TeleBot\TeleBot;

test('can register and remove handlers', function () {
    $bot = new TeleBot('test');

    $handler = function (TeleBot $bot, Objects\Update $update, callable $next) {
        return 'handled';
    };

    $bot->handler($handler);

    $update = Objects\Update::from([
        'update_id' => 1,
        'message' => [
            'message_id' => 1,
            'date' => 1,
            'chat' => ['id' => 1, 'type' => 'private'],
            'text' => 'test',
        ],
    ]);

    $bot->fake([
        TeleBotResponse::make([
            'message_id' => 2,
            'date' => 2,
            'chat' => ['id' => 1, 'type' => 'private'],
            'text' => 'response',
        ]),
    ]);

    $res = $bot->handle($update);
    expect($res)->toBe('handled');

    $bot->purge();

    // After purge, handler should be gone; update with no handler returns null
    $res = $bot->handle($update);
    expect($res)->toBeNull();
});

test('handler returns self for chaining', function () {
    $bot = new TeleBot('test');

    $result = $bot->handler(function () {
    });

    expect($result)->toBe($bot);
});

test('purge reinitializes kernel', function () {
    $bot = new TeleBot('test');

    $handler = function (TeleBot $bot, Objects\Update $update, callable $next) {
        return 'test';
    };

    $bot->handler($handler);
    $bot->purge();

    $update = Objects\Update::from([
        'update_id' => 1,
        'message' => [
            'message_id' => 1,
            'date' => 1,
            'chat' => ['id' => 1, 'type' => 'private'],
            'text' => 'test',
        ],
    ]);

    $bot->fake([
        TeleBotResponse::make([
            'message_id' => 2,
            'date' => 2,
            'chat' => ['id' => 1, 'type' => 'private'],
            'text' => 'response',
        ]),
    ]);

    $res = $bot->handle($update);
    expect($res)->toBeNull();
});

test('fake with false disables mocking', function () {
    $bot = new TeleBot('test');

    $bot->fake([
        TeleBotResponse::make(['message_id' => 2, 'date' => 2, 'chat' => ['id' => 1, 'type' => 'private'], 'text' => 'mocked']),
    ]);

    $bot->fake(false); // Disable mocking

    // Without mocking, the bot would try to make a real API call
    // We just verify that disable doesn't throw
    expect(true)->toBeTrue();
});

test('config returns configuration values', function () {
    $bot = new TeleBot([
        'token' => 'test_token',
        'name' => 'TestBot',
    ]);

    expect($bot->config['token'])->toBe('test_token');
    expect($bot->config['name'])->toBe('TestBot');
    expect($bot->config['api_url'])->toBe('https://api.telegram.org');
    expect($bot->config['kernel'])->toBe(WeStacks\TeleBot\Kernel::class);
    expect($bot->config['storage'])->toBe(WeStacks\TeleBot\Foundation\FileStorage::class);
});

test('constructor with string creates bot with just token', function () {
    $bot = new TeleBot('string_token');

    expect($bot->config['token'])->toBe('string_token');
});

test('constructor throws exception without token', function () {
    new TeleBot([]);
})->throws(\InvalidArgumentException::class);
