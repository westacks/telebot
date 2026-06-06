<?php

use WeStacks\TeleBot\Foundation\UpdateHandler;
use WeStacks\TeleBot\Kernel;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class TestHandler extends UpdateHandler
{
    public function trigger(): bool
    {
        return $this->update->type('message');
    }

    public function handle()
    {
        return 'handled_by_test';
    }
}

class StopHandler extends UpdateHandler
{
    public function trigger(): bool
    {
        return $this->update->type('message');
    }

    public function handle()
    {
        return 'handled_by_stop';
    }
}

class SkipHandler extends UpdateHandler
{
    public function trigger(): bool
    {
        return false; // Always skip
    }

    public function handle()
    {
        return 'should_not_reach';
    }
}

function createTestBot(): TeleBot
{
    return new TeleBot('test');
}

function createMessageUpdate(string $text = 'test'): Update
{
    return Update::from([
        'update_id' => 1,
        'message' => [
            'message_id' => 1,
            'date' => 1,
            'chat' => ['id' => 1, 'type' => 'private'],
            'text' => $text,
        ],
    ]);
}

test('kernel runs handler when trigger returns true', function () {
    $bot = createTestBot();
    $kernel = new Kernel([TestHandler::class]);

    $result = $kernel->run($bot, createMessageUpdate());

    expect($result)->toBe('handled_by_test');
});

test('kernel runs first matching handler and stops', function () {
    $bot = createTestBot();
    $kernel = new Kernel([StopHandler::class, TestHandler::class]);

    $result = $kernel->run($bot, createMessageUpdate());

    // StopHandler is first and matches, so it should stop before TestHandler
    expect($result)->toBe('handled_by_stop');
});

test('kernel skips handlers that return false from trigger', function () {
    $bot = createTestBot();
    $kernel = new Kernel([SkipHandler::class, TestHandler::class]);

    $result = $kernel->run($bot, createMessageUpdate());

    // SkipHandler returns false, so TestHandler should run
    expect($result)->toBe('handled_by_test');
});

test('kernel returns null when no handler matches', function () {
    $bot = createTestBot();
    $kernel = new Kernel([SkipHandler::class]);

    $result = $kernel->run($bot, createMessageUpdate());

    expect($result)->toBeNull();
});

test('kernel accepts closure handlers', function () {
    $bot = createTestBot();
    $kernel = new Kernel([
        function (TeleBot $bot, Update $update, callable $next) {
            if ($update->message->text === '/start') {
                return 'handled_by_closure';
            }

            return $next();
        },
    ]);

    $result = $kernel->run($bot, createMessageUpdate('/start'));

    expect($result)->toBe('handled_by_closure');
});

test('kernel passes to next closure when current does not handle', function () {
    $bot = createTestBot();
    $kernel = new Kernel([
        function (TeleBot $bot, Update $update, callable $next) {
            return $next();
        },
        TestHandler::class,
    ]);

    $result = $kernel->run($bot, createMessageUpdate());

    expect($result)->toBe('handled_by_test');
});

test('kernel can add handlers after instantiation', function () {
    $bot = createTestBot();
    $kernel = new Kernel();
    $kernel->add(TestHandler::class);

    $result = $kernel->run($bot, createMessageUpdate());

    expect($result)->toBe('handled_by_test');
});

test('kernel validates handler class on construction', function () {
    new Kernel(['NonExistentHandlerClass']);
})->throws(\InvalidArgumentException::class);

test('kernel validates handler on add', function () {
    $kernel = new Kernel();
    $kernel->add('NonExistentHandlerClass');
})->throws(\InvalidArgumentException::class);
