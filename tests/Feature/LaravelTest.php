<?php

namespace Westacks\Telebot\Tests;

use Orchestra\Testbench\TestCase;
use WeStacks\TeleBot\TeleBot as Bot;
use WeStacks\TeleBot\Laravel\TeleBot;
use WeStacks\TeleBot\Laravel\TeleBotServiceProvider;
use WeStacks\TeleBot\Objects\Message;

class LaravelTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [TeleBotServiceProvider::class];
    }
    
    protected function getPackageAliases($app)
    {
        return [
            'Acme' => 'Acme\Facade'
        ];
    }

    public function testFacade()
    {
        $message = TeleBot::sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'Hello from Laravel!'
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function testBotManager()
    {
        TeleBot::deleteBot('mybot');
        $this->assertNull(TeleBot::bot());

        TeleBot::addBot('mybot', getenv('TELEGRAM_BOT_TOKEN'));
        $this->assertInstanceOf(Bot::class, TeleBot::bot());
    }
}
