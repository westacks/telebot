<?php

use WeStacks\TeleBot\Methods\SendMediaGroupMethod;
use WeStacks\TeleBot\Methods\SendMessageMethod;
use WeStacks\TeleBot\Methods\SendPhotoMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\InputMediaPhoto;
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

test('send photo test', function () {
    $method = synthesize([
        'chat_id' => 1,
        'photo' => 'AgACAgIAAxkBAAIyJ2Mx5uBv0nL2hUv3m4nWk2kF8gACZQACFwEAAu8t6QI8ZpI6UvIb8gQ',
    ], SendPhotoMethod::class);

    expect($method)->toBeInstanceOf(SendPhotoMethod::class);
    expect($method->photo)->toBeString();

    $method = synthesize([
        'chat_id' => 1,
        'photo' => __DIR__.'/../Lib/test-document.txt',
    ], SendPhotoMethod::class);

    expect($method)->toBeInstanceOf(SendPhotoMethod::class);
    expect($method->photo)->toBeInstanceOf(InputFile::class);
});

test('send media group', function () {
    $method = synthesize([
        'chat_id' => 1,
        'media' => [
            ['type' => 'photo', 'media' => 'AgACAgIAAxkBAAIyJ2Mx5uBv0nL2hUv3m4nWk2kF8gACZQACFwEAAu8t6QI8ZpI6UvIb8gQ'],
            ['type' => 'photo', 'media' => __DIR__.'/../Lib/test-document.txt'],
        ],
    ], SendMediaGroupMethod::class);

    expect($method)->toBeInstanceOf(SendMediaGroupMethod::class);
    expect($method->media[0])->and($method->media[1])->toBeInstanceOf(InputMediaPhoto::class);
    expect($method->media[0]->media)->toBeString();
    expect($method->media[1]->media)->toBeInstanceOf(InputFile::class);
});
