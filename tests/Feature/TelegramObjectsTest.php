<?php

use WeStacks\TeleBot\Methods\SendMessageMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\Update;
use function WeStacks\TeleBot\synthesize;

test('create update', function (string $update) {
    $result = Update::from($array = json_decode($update, true));

    expect($result->toArray())->toMatchArray($array);
    expect($result)->toBeInstanceOf(Update::class);
})->with('updates');

test('inline keyboard', function () {
    $method = synthesize([
        'chat_id' => 1,
        'text' => 'test',
        'reply_markup' => [
            'inline_keyboard' => [[
                ['text' => '1', 'callback_data' => '1'],
                ['text' => '2', 'callback_data' => '2'],
            ]],
        ]
    ], SendMessageMethod::class);

    expect($method)->toBeInstanceOf(SendMessageMethod::class);
    expect($method->reply_markup)->toBeInstanceOf(InlineKeyboardMarkup::class);
});

test('plain keyboard', function () {
    $method = synthesize([
        'chat_id' => 1,
        'text' => 'test',
        'reply_markup' => [
            'keyboard' => [[['text' => 'test']]],
            'resize_keyboard' => true,
            'one_time_keyboard' => false,
        ]
    ], SendMessageMethod::class);

    expect($method)->toBeInstanceOf(SendMessageMethod::class);
    expect($method->reply_markup)->toBeInstanceOf(ReplyKeyboardMarkup::class);

    $method = synthesize([
        'chat_id' => 1,
        'text' => 'test',
        'reply_markup' => [
            'keyboard' => ['test'],
            'resize_keyboard' => true,
            'one_time_keyboard' => false,
        ]
    ], SendMessageMethod::class);
})->throws(\InvalidArgumentException::class);