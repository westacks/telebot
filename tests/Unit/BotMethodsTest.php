<?php

namespace WeStacks\TeleBot\Tests\Unit;

use WeStacks\TeleBot\TeleBot;
use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\TelegramObject\User;

class BotMethodsTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new TeleBot([
            'token' => getenv('TELEGRAM_BOT_TOKEN'),
            'name'  => getenv('TELEGRAM_BOT_NAME')
        ]);
    }

    public function testBotCreated()
    {
        $this->assertInstanceOf(TeleBot::class, $this->bot);
    }

    public function testCallUndefinedMethod()
    {
        $this->expectException(TeleBotMehtodException::class);
        $this->bot->getYou();
    }

    public function testExecuteMethod()
    {
        $botUser = $this->bot->getMe();
        $this->assertInstanceOf(User::class, $botUser);
    }

    public function testExecuteAsyncMethod()
    {
        $promise = $this->bot->async(true)->getMe();
        $result = $promise->wait();
        $this->assertInstanceOf(User::class, $result);
    }
}