<?php

namespace WeStacks\TeleBot\Tests\Unit;

use WeStacks\TeleBot\Bot;
use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotMehtodException;
use WeStacks\TeleBot\Objects\User;

class BotMethodsTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new Bot([
            'token' => getenv('TELEGRAM_BOT_TOKEN'),
            'name'  => getenv('TELEGRAM_BOT_NAME')
        ]);
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
        $this->assertInstanceOf(User::class, $botUser);
    }

    public function testExecuteAsyncMethod()
    {
        $promise = $this->bot->async(true)->getMe();
        $result = $promise->wait();
        $this->assertInstanceOf(User::class, $result);
    }
}