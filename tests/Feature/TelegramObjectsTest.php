<?php

use WeStacks\TeleBot\Objects\Update;

test('create update', function (string $update) {
    $result = Update::from($array = json_decode($update, true));

    expect($result->toArray())->toMatchArray($array);
    expect($result)->toBeInstanceOf(Update::class);
})->with('updates');
