<?php

use WeStacks\TeleBot\Methods\SendDocumentMethod;

use function WeStacks\TeleBot\multipart;
use function WeStacks\TeleBot\synthesize;

test('multipart data', function () {
    $method = synthesize([
        'chat_id' => 1,
        'document' => __DIR__.'/../Lib/test-document.txt',
        'caption' => 'test',
        'reply_markup' => $kb = [
            'inline_keyboard' => [
                [
                    ['text' => 'test', 'url' => 'https://google.com'],
                ],
            ],
        ],
    ], SendDocumentMethod::class);

    $result = multipart(array_filter(get_object_vars($method), fn ($value) => $value !== null));

    expect($result[0])->toBe(['name' => 'chat_id', 'contents' => '1']);
    expect($result[1])->toBe(['name' => 'document', 'contents' => 'attach://file_0']);
    expect($result[2])->toBe(['name' => 'caption', 'contents' => 'test']);
    expect($result[3])->toBe(['name' => 'reply_markup', 'contents' => json_encode($kb)]);
    expect($result[4])->toMatchArray(['name' => 'file_0', 'filename' => 'test-document.txt']);
});
