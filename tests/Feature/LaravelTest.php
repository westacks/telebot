<?php

namespace Westacks\Telebot\Tests;

use Orchestra\Testbench\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Laravel\TeleBot;
use WeStacks\TeleBot\Laravel\TeleBotServiceProvider;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\TeleBot as Bot;
use WeStacks\TeleBot\Tests\Helpers\StartCommandHandler;

class LaravelTest extends TestCase
{
    public function testFacade()
    {
        $message = TeleBot::sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'Hello from Laravel!',
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function testBotManagerAddAndDelete()
    {
        TeleBot::delete('bot');

        try {
            TeleBot::bot();
        } catch (TeleBotObjectException $e) {
            $this->assertInstanceOf(TeleBotObjectException::class, $e);
        }

        TeleBot::add('bot', getenv('TELEGRAM_BOT_TOKEN'));
        TeleBot::default('bot');

        $this->assertInstanceOf(Bot::class, TeleBot::bot());
    }

    public function testBotManagerBots()
    {
        foreach (TeleBot::bots() as $name) {
            $this->assertInstanceOf(Bot::class, TeleBot::bot($name));
        }
        $this->expectException(TeleBotObjectException::class);
        TeleBot::bot('some_wrong_bot');
    }

    public function testBotMenagerDefaultWrong()
    {
        $this->expectException(TeleBotObjectException::class);
        TeleBot::default('some_wrong_bot');
    }

    public function testCommandsCommand()
    {
        TeleBot::addHandler(StartCommandHandler::class);
        $this->artisan('telebot:commands -S -I')->assertExitCode(0);
        $this->artisan('telebot:commands -R')->assertExitCode(0);
    }

    public function testWebhookCommand()
    {
        $this->artisan('telebot:webhook -S -I')->assertExitCode(0);
        $this->artisan('telebot:webhook -R')->assertExitCode(0);
    }

    public function testLongPollCommand()
    {
        $this->artisan('telebot:polling -O')->assertExitCode(0);
    }

    protected function getPackageProviders($app)
    {
        return [TeleBotServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'TeleBot' => TeleBot::class,
        ];
    }
}
