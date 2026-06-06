<?php

use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\TeleBot;

function createBotManager(): BotManager
{
    return new BotManager([
        'primary' => new TeleBot('primary_token'),
        'secondary' => ['token' => 'secondary_token', 'name' => 'SecondaryBot'],
        'tertiary' => ['token' => 'tertiary_token', 'name' => 'TertiaryBot'],
    ]);
}

test('can instantiate BotManager', function () {
    $botManager = createBotManager();

    expect($botManager)->toBeInstanceOf(BotManager::class);
});

test('defaults to the first bot', function () {
    $botManager = createBotManager();
    $bot = $botManager->bot();

    expect($bot)->toBeInstanceOf(TeleBot::class);
    expect($bot->config['token'])->toBe('primary_token');
});

test('can get a bot by name', function () {
    $botManager = createBotManager();
    $bot = $botManager->bot('secondary');

    expect($bot)->toBeInstanceOf(TeleBot::class);
    expect($bot->config['token'])->toBe('secondary_token');
    expect($bot->config['name'])->toBe('SecondaryBot');
});

test('returns list of bot names', function () {
    $botManager = createBotManager();
    $bots = $botManager->bots();

    expect($bots)->toBe(['primary', 'secondary', 'tertiary']);
});

test('can add a new bot', function () {
    $botManager = createBotManager();

    $botManager->add('fourth', ['token' => 'fourth_token']);

    $bot = $botManager->bot('fourth');

    expect($bot)->toBeInstanceOf(TeleBot::class);
    expect($bot->config['token'])->toBe('fourth_token');
});

test('can add a TeleBot instance directly', function () {
    $botManager = createBotManager();

    $botManager->add('direct', new TeleBot('direct_token'));

    $bot = $botManager->bot('direct');

    expect($bot)->toBeInstanceOf(TeleBot::class);
    expect($bot->config['token'])->toBe('direct_token');
});

test('can remove a bot', function () {
    $botManager = createBotManager();

    $botManager->remove('secondary');

    $bots = $botManager->bots();

    expect($bots)->toBe(['primary', 'tertiary']);
});

test('can set the default bot', function () {
    $botManager = createBotManager();

    $botManager->default('tertiary');

    $bot = $botManager->bot();

    expect($bot->config['token'])->toBe('tertiary_token');
});

test('setting invalid default throws exception', function () {
    $botManager = createBotManager();

    $botManager->default('non_existent');
})->throws(\InvalidArgumentException::class);

test('constructor throws exception for invalid default bot', function () {
    new BotManager([
        'primary' => new TeleBot('token'),
    ], 'non_existent');
})->throws(\InvalidArgumentException::class);

test('getting a non-existent bot throws exception', function () {
    $botManager = createBotManager();

    $botManager->bot('non_existent');
})->throws(\InvalidArgumentException::class);

test('can set default to null after removing default', function () {
    $botManager = createBotManager();

    $botManager->default('primary');
    $botManager->remove('primary');

    expect($botManager->bot()->config['token'])->toBe('secondary_token');
});
