<?php

namespace WeStacks\TeleBot\Tests\Unit;

use WeStacks\TeleBot\Bot;
use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotRequestException;
use WeStacks\TeleBot\TelegramObject\Keyboard;
use WeStacks\TeleBot\TelegramObject\Message;
use WeStacks\TeleBot\TelegramObject\User;

class BotMethodsTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new Bot(getenv('TELEGRAM_BOT_TOKEN'));
    }

    public function testBotCreated()
    {
        $this->assertInstanceOf(Bot::class, $this->bot);
    }

    public function testCallUndefinedMethod()
    {
        $this->expectException(TeleBotMehtodException::class);
        $this->bot->getYou();
    }

    public function testExecuteMethod()
    {
        $botUser = $this->bot->getMe();
        var_dump($botUser->toArray());
        $this->assertInstanceOf(User::class, $botUser);
    }

    public function testSendMessage()
    {
        $message = $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'Unit test message',
            'reply_markup' => Keyboard::create([
                'inline_keyboard' => [
                    [
                        [
                            'text' => 'Google',
                            'url' => 'https://google.com/'
                        ]
                    ]
                ]
            ])
        ]);

        $this->assertInstanceOf(Message::class, $message);

        $this->expectException(TeleBotRequestException::class);
        $message = $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => '',
        ]);
    }
}