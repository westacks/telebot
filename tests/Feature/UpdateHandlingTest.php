<?php

use Tests\Lib\AskNameHandler;
use Tests\Lib\PopupHandler;
use WeStacks\TeleBot\Foundation\TeleBotResponse;
use WeStacks\TeleBot\Objects;
use WeStacks\TeleBot\TeleBot;

test('request input handler by user', function (TeleBot $bot) {
    $bot->handler(AskNameHandler::class)
        ->handler(function (TeleBot $bot, Objects\Update $update, callable $next) {
            if ($update->message()->text !== '/test' ?? null) {
                return $next();
            }

            AskNameHandler::request($bot, $update->user());

            return $bot->sendMessage(
                chat_id: $update->chat()->id,
                text: 'Please enter your name.',
            );
        });

    $initialUpdate = Objects\Update::from([
        'update_id' => 1,
        'message' => [
            'message_id' => 1,
            'text' => '/test',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'date' => 1,
            'entities' => [
                [
                    'type' => 'bot_command',
                    'offset' => 0,
                    'length' => 5
                ]
            ]
        ],
    ]);

    $wrongNameUpdate = Objects\Update::from([
        'update_id' => 2,
        'message' => [
            'message_id' => 3,
            'text' => 'Alan',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'date' => 2,
        ]
    ]);

    $wrongUserUpdate = Objects\Update::from([
        'update_id' => 2,
        'message' => [
            'message_id' => 5,
            'text' => 'Alan',
            'from' => [
                'id' => 2,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'date' => 2,
        ]
    ]);

    $correctNameUpdate = Objects\Update::from([
        'update_id' => 3,
        'message' => [
            'message_id' => 6,
            'text' => 'John',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'date' => 4,
        ]
    ]);

    $bot->fake([
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 2,
            'date' => 1,
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'text' => 'Please enter your name.',
        ])),
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 4,
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'text' => 'Sorry, I don\'t know you.',
        ])),
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 6,
            'date' => 4,
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'text' => 'Hello, John!',
        ])),
    ]);

    $res = $bot->handle($initialUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Please enter your name.');

    $res = $bot->handle($wrongNameUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Sorry, I don\'t know you.');

    $res = $bot->handle($wrongUserUpdate);
    expect($res)->toBeNull();

    $res = $bot->handle($correctNameUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Hello, John!');
})->with('bots');

test('request input handler by chat', function (TeleBot $bot) {
    $bot->handler(AskNameHandler::class)
        ->handler(function (TeleBot $bot, Objects\Update $update, callable $next) {
            if ($update->message()->text !== '/test' ?? null) {
                return $next();
            }

            AskNameHandler::request($bot, $update->chat());

            return $bot->sendMessage(
                chat_id: $update->chat()->id,
                text: 'Please enter your name.',
            );
        });

    $initialUpdate = Objects\Update::from([
        'update_id' => 1,
        'message' => [
            'message_id' => 1,
            'text' => '/test',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'date' => 1,
            'entities' => [
                [
                    'type' => 'bot_command',
                    'offset' => 0,
                    'length' => 5
                ]
            ]
        ],
    ]);

    $wrongNameUpdate = Objects\Update::from([
        'update_id' => 2,
        'message' => [
            'message_id' => 3,
            'text' => 'Alan',
            'from' => [
                'id' => 2,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'date' => 2,
        ]
    ]);

    $correctNameUpdate = Objects\Update::from([
        'update_id' => 3,
        'message' => [
            'message_id' => 5,
            'text' => 'John',
            'from' => [
                'id' => 3,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'date' => 4,
        ]
    ]);

    $bot->fake([
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 2,
            'date' => 1,
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'text' => 'Please enter your name.',
        ])),
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 4,
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'text' => 'Sorry, I don\'t know you.',
        ])),
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 6,
            'date' => 4,
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'text' => 'Hello, John!',
        ])),
    ]);

    $res = $bot->handle($initialUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Please enter your name.');

    $res = $bot->handle($wrongNameUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Sorry, I don\'t know you.');

    $res = $bot->handle($correctNameUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Hello, John!');
})->with('bots');

test('request input handler by user and chat', function (TeleBot $bot) {
    $bot->handler(AskNameHandler::class)
        ->handler(function (TeleBot $bot, Objects\Update $update, callable $next) {
            if ($update->message()->text !== '/test' ?? null) {
                return $next();
            }

            AskNameHandler::request($bot, $update->chat(), $update->user());

            return $bot->sendMessage(
                chat_id: $update->chat()->id,
                text: 'Please enter your name.',
            );
        });

    $initialUpdate = Objects\Update::from([
        'update_id' => 1,
        'message' => [
            'message_id' => 1,
            'text' => '/test',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'date' => 1,
            'entities' => [
                [
                    'type' => 'bot_command',
                    'offset' => 0,
                    'length' => 5
                ]
            ]
        ],
    ]);

    $wrongNameUpdate = Objects\Update::from([
        'update_id' => 2,
        'message' => [
            'message_id' => 3,
            'text' => 'Alan',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'date' => 2,
        ]
    ]);

    $wrongChatUpdate = Objects\Update::from([
        'update_id' => 3,
        'message' => [
            'message_id' => 4,
            'text' => 'Alan',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 2,
                'type' => 'group',
            ],
            'date' => 3,
        ]
    ]);

    $correctNameUpdate = Objects\Update::from([
        'update_id' => 4,
        'message' => [
            'message_id' => 5,
            'text' => 'John',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'date' => 4,
        ]
    ]);

    $bot->fake([
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 2,
            'date' => 1,
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'text' => 'Please enter your name.',
        ])),
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 4,
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'text' => 'Sorry, I don\'t know you.',
        ])),
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 6,
            'date' => 4,
            'chat' => [
                'id' => 1,
                'type' => 'group',
            ],
            'text' => 'Hello, John!',
        ])),
    ]);

    $res = $bot->handle($initialUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Please enter your name.');

    $res = $bot->handle($wrongNameUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Sorry, I don\'t know you.');

    $res = $bot->handle($wrongChatUpdate);
    expect($res)->toBeNull();

    $res = $bot->handle($correctNameUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Hello, John!');
})->with('bots');

test('request input handler by message thread', function (TeleBot $bot) {
    $bot->handler(AskNameHandler::class)
        ->handler(function (TeleBot $bot, Objects\Update $update, callable $next) {
            if ($update->message()->text !== '/test' ?? null) {
                return $next();
            }

            AskNameHandler::request($bot, $update->user(), message_thread_id: $update->message->message_thread_id);

            return $bot->sendMessage(
                chat_id: $update->chat()->id,
                text: 'Please enter your name.',
            );
        });

    $initialUpdate = Objects\Update::from([
        'update_id' => 1,
        'message' => [
            'message_id' => 1,
            'message_thread_id' => 1,
            'text' => '/test',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'supergroup',
            ],
            'date' => 1,
            'entities' => [
                [
                    'type' => 'bot_command',
                    'offset' => 0,
                    'length' => 5
                ]
            ]
        ],
    ]);

    $wrongNameUpdate = Objects\Update::from([
        'update_id' => 2,
        'message' => [
            'message_id' => 3,
            'message_thread_id' => 1,
            'text' => 'Alan',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'supergroup',
            ],
            'date' => 2,
        ]
    ]);

    $wrongChatUpdate = Objects\Update::from([
        'update_id' => 3,
        'message' => [
            'message_id' => 3,
            'message_thread_id' => 2,
            'text' => 'Alan',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'supergroup',
            ],
            'date' => 2,
        ]
    ]);

    $correctNameUpdate = Objects\Update::from([
        'update_id' => 4,
        'message' => [
            'message_id' => 5,
            'message_thread_id' => 1,
            'text' => 'John',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'supergroup',
            ],
            'date' => 4,
        ]
    ]);

    $bot->fake([
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 2,
            'message_thread_id' => 1,
            'date' => 1,
            'chat' => [
                'id' => 1,
                'type' => 'supergroup',
            ],
            'text' => 'Please enter your name.',
        ])),
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 4,
            'message_thread_id' => 1,
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'supergroup',
            ],
            'text' => 'Sorry, I don\'t know you.',
        ])),
        TeleBotResponse::make(Objects\Message::from([
            'message_id' => 6,
            'message_thread_id' => 1,
            'date' => 4,
            'chat' => [
                'id' => 1,
                'type' => 'supergroup',
            ],
            'text' => 'Hello, John!',
        ])),
    ]);

    $res = $bot->handle($initialUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Please enter your name.');

    $res = $bot->handle($wrongNameUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Sorry, I don\'t know you.');

    $res = $bot->handle($wrongChatUpdate);
    expect($res)->toBeNull();

    $res = $bot->handle($correctNameUpdate);
    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Hello, John!');
})->with('bots');

test('callback handler', function (TeleBot $bot) {
    $bot->handler(PopupHandler::class);

    $update = Objects\Update::from([
        'update_id' => 1,
        'callback_query' => [
            'id' => 1,
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alan',
            ],
            'message' => [
                'message_id' => 1,
                'from' => [
                    'id' => 1,
                    'is_bot' => false,
                    'first_name' => 'Alan',
                ],
                'chat' => [
                    'id' => 1,
                    'type' => 'private',
                ],
                'date' => 1,
            ],
            'chat_instance' => 'unique_chat_instance_id',
            'data' => 'popup:Hello',
        ],
    ]);

    $bot->fake([
        TeleBotResponse::make([
            'message_id' => 2,
            'date' => 1,
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
            'text' => 'Hello',
        ]),
    ]);

    $res = $bot->handle($update);

    expect($res)->toBeInstanceOf(Objects\Message::class);
    expect($res->text)->toBe('Hello');
})->with('bots');
