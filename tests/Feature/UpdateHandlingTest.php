<?php

use Tests\Lib\AskNameHandler;
use Tests\Lib\PopupHandler;
use WeStacks\TeleBot\Foundation\TeleBotResponse;
use WeStacks\TeleBot\Objects;
use WeStacks\TeleBot\TeleBot;

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

test('request input handler', function (TeleBot $bot, array $params, array $updates, array $responses) {
    $bot->handler(AskNameHandler::class)
        ->handler(function (TeleBot $bot, Objects\Update $update, callable $next) use ($params) {
            if ($update->message()->text !== '/test' ?? null) {
                return $next();
            }

            $params = array_map(fn ($param) => match ($param) {
                'chat' => $update->chat(),
                'user' => $update->user(),
                'thread' => $update->message()?->message_thread_id,
                default => null,
            }, $params);

            AskNameHandler::request($bot, ...$params);

            return $bot->sendMessage(
                chat_id: $update->chat()->id,
                text: 'Please enter your name.',
            );
        });

    [$initialUpdate, $wrongNameUpdate, $wrongChatUpdate, $correctNameUpdate] = $updates;

    $bot->fake($responses);

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

})->with('bots', [
    'user' => [
        'params' => ['user'],
        'updates' => [
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
        ],
        'responses' => [
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
        ],
    ],
    'chat' => [
        'params' => ['chat'],
        'updates' => [
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
                'update_id' => 2,
                'message' => [
                    'message_id' => 5,
                    'text' => 'Alan',
                    'from' => [
                        'id' => 1,
                        'is_bot' => false,
                        'first_name' => 'Alan',
                    ],
                    'chat' => [
                        'id' => 2,
                        'type' => 'private',
                    ],
                    'date' => 2,
                ]
            ]),
            Objects\Update::from([
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
            ]),
        ],
        'responses' => [
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
        ]
    ],
    'user and chat' => [
        'params' => ['chat', 'user'],
        'updates' => [
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
        ],
        'responses' => [
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
        ],
    ],
    'user, chat and message thread' => [
        'params' => ['chat', 'user', 'thread'],
        'updates' => [
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
            Objects\Update::from([
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
            ]),
        ],
        'responses' => [
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
        ],
    ]
]);
