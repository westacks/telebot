<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use TypeError;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;
use WeStacks\TeleBot\Tests\Helpers\AskNameHandler;
use WeStacks\TeleBot\Tests\Helpers\CustomWrongStorage;

class AskHandlerTest extends TestCase
{
    public function test_ask_handler()
    {
        $bot = new TeleBot(array_merge(get_config(), [
            'handlers' => [
                AskNameHandler::class,
                function ($bot, $update, $next) {
                    if ($update->message()->text !== '/test' ?? null) {
                        return $next();
                    }

                    AskNameHandler::requestInput($bot, $update->user()->id);

                    return $bot->fake()->sendMessage([
                        'chat_id' => $update->chat()->id,
                        'text' => 'Please, type your name.',
                    ]);
                },
            ],
        ]));

        $update = new Update([
            'message' => [
                'from' => [
                    'id' => '-1',
                ],
                'chat' => [
                    'id' => '-1',
                ],
                'text' => '/test',
            ],
        ]);

        $wrongName = new Update([
            'message' => [
                'from' => [
                    'id' => '-1',
                ],
                'chat' => [
                    'id' => '-1',
                ],
                'text' => 'Alan',
            ],
        ]);

        $correctName = new Update([
            'message' => [
                'from' => [
                    'id' => '-1',
                ],
                'chat' => [
                    'id' => '-1',
                ],
                'text' => 'John',
            ],
        ]);

        $res = $bot->handleUpdate($update);
        $this->assertEquals('Please, type your name.', $res->text);

        $res = $bot->handleUpdate($wrongName);
        $this->assertEquals('Sorry, I don\'t know you.', $res->text);

        $res = $bot->handleUpdate($correctName);
        $this->assertEquals('Hello, John!', $res->text);
    }

    public function test_wrong_storage()
    {
        $bot = new TeleBot(array_merge(get_config(), [
            'storage' => CustomWrongStorage::class,
            'handlers' => [
                AskNameHandler::class,
                function ($bot, $update, $next) {
                    if ($update->message()->text !== '/test' ?? null) {
                        return $next();
                    }

                    AskNameHandler::requestInput($bot, $update->user()->id);

                    return $bot->fake()->sendMessage([
                        'chat_id' => $update->chat()->id,
                        'text' => 'Please, type your name.',
                    ]);
                },
            ],
        ]));

        $update = new Update([
            'message' => [
                'from' => [
                    'id' => '-1',
                ],
                'chat' => [
                    'id' => '-1',
                ],
                'text' => '/test',
            ],
        ]);

        $this->expectException(TypeError::class);
        $bot->handleUpdate($update);
    }
}
