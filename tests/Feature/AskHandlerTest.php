<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;
use WeStacks\TeleBot\Tests\Helpers\AskNameHandler;

class AskHandlerTest extends TestCase
{
    public function testAskHandler()
    {
        $bot = new TeleBot([
            'token' => getenv('TELEGRAM_BOT_TOKEN'),
            'handlers' => [
                AskNameHandler::class,
                function ($bot, $update, $next) {
                    if ('/test' !== $update->message()->text ?? null) {
                        return $next();
                    }

                    AskNameHandler::requestInput($bot, $update);

                    return $bot->fake()->sendMessage([
                        'chat_id' => $update->chat()->id,
                        'text' => 'Please, type your name.',
                    ]);
                },
            ],
        ]);

        $update = new Update([
            'message' => [
                'chat' => [
                    'id' => '-1',
                ],
                'text' => '/test',
            ],
        ]);

        $wrongName = new Update([
            'message' => [
                'chat' => [
                    'id' => '-1',
                ],
                'text' => 'Alan',
            ],
        ]);

        $correctName = new Update([
            'message' => [
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
}
