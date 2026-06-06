<?php

use WeStacks\TeleBot\Methods\SendMessageMethod;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\User;

use function WeStacks\TeleBot\synthesize;

test('synthesize handles nullable types with null data', function () {
    $result = synthesize(null, '?string');

    expect($result)->toBeNull();
});

test('synthesize handles nullable types with non-null data', function () {
    $result = synthesize('hello', '?string');

    expect($result)->toBe('hello');
});

test('synthesize handles array types', function () {
    $result = synthesize([1, 2, 3], 'int[]');

    expect($result)->toBe([1, 2, 3]);
});

test('synthesize throws TypeError for non-array data on array type', function () {
    synthesize('not_an_array', 'int[]');
})->throws(\TypeError::class);

test('synthesize handles scalar types', function () {
    expect(synthesize('42', 'int'))->toBe(42);
    expect(synthesize(1, 'bool'))->toBeTrue();
    expect(synthesize(true, 'true'))->toBeTrue();
    expect(synthesize(false, 'false'))->toBeFalse();
    expect(synthesize(3.14, 'float'))->toBe(3.14);
    expect(synthesize(42, 'string'))->toBe('42');
});

test('synthesize throws TypeError for non-scalar non-class type', function () {
    synthesize([], 'SomeRandomType');
})->throws(\TypeError::class);

test('synthesize throws TypeError for non-existent class', function () {
    synthesize([], 'NonExistentClassName');
})->throws(\TypeError::class);

test('synthesize creates Telegram object from array', function () {
    $user = synthesize([
        'id' => 123,
        'is_bot' => false,
        'first_name' => 'John',
    ], User::class);

    expect($user)->toBeInstanceOf(User::class);
    expect($user->id)->toBe(123);
    expect($user->is_bot)->toBeFalse();
    expect($user->first_name)->toBe('John');
});

test('synthesize returns same instance if already correct type', function () {
    $user = new User(
        id: 1,
        is_bot: false,
        first_name: 'John',
        last_name: null,
        username: null,
        language_code: null,
        is_premium: null,
        added_to_attachment_menu: null,
        can_join_groups: null,
        can_read_all_group_messages: null,
        supports_guest_queries: null,
        supports_inline_queries: null,
        can_connect_to_business: null,
        has_main_web_app: null,
        has_topics_enabled: null,
        allows_users_to_create_topics: null,
        can_manage_bots: null,
    );

    $result = synthesize($user, User::class);

    expect($result)->toBe($user);
});

test('synthesize handles Update creation from JSON string', function () {
    $json = json_encode([
        'update_id' => 1001,
        'message' => [
            'message_id' => 101,
            'from' => ['id' => 1, 'is_bot' => false, 'first_name' => 'Test'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'date' => 1610000000,
            'text' => 'Hello',
        ],
    ]);

    $update = Update::from($json);

    expect($update)->toBeInstanceOf(Update::class);
    expect($update->update_id)->toBe(1001);
    expect($update->message()->text)->toBe('Hello');
});

test('synthesize for method with complex nested keyboard', function () {
    $method = synthesize([
        'chat_id' => 1,
        'text' => 'test',
        'reply_markup' => [
            'inline_keyboard' => [
                [
                    ['text' => 'Button 1', 'callback_data' => 'data_1'],
                    ['text' => 'Button 2', 'callback_data' => 'data_2'],
                ],
                [
                    ['text' => 'Button 3', 'callback_data' => 'data_3'],
                ],
            ],
        ],
    ], SendMessageMethod::class);

    expect($method->reply_markup)->toBeInstanceOf(
        WeStacks\TeleBot\Objects\InlineKeyboardMarkup::class
    );
    expect($method->reply_markup->inline_keyboard)->toHaveCount(2);
    expect($method->reply_markup->inline_keyboard[0])->toHaveCount(2);
    expect($method->reply_markup->inline_keyboard[1])->toHaveCount(1);
});
