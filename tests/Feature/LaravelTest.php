<?php

namespace Westacks\Telebot\Tests;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use Orchestra\Testbench\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Laravel\TeleBot;
use WeStacks\TeleBot\Laravel\TeleBotServiceProvider;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\TeleBot as Bot;
use WeStacks\TeleBot\Tests\Helpers\StartCommandHandler;
use WeStacks\TeleBot\Tests\Helpers\TelegramNotification;
use WeStacks\TeleBot\Tests\Helpers\TestNotifiable;

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

    public function testAddExistingBotToBotManager()
    {
        TeleBot::add('test_existing', TeleBot::bot());
        $this->assertEquals(TeleBot::bot(), TeleBot::bot('test_existing'));
        TeleBot::delete('test_existing');
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
        $this->artisan('telebot:commands')->assertExitCode(1);
        $this->artisan('telebot:commands -S -R')->assertExitCode(1);

        $this->artisan('telebot:commands -S -I')->assertExitCode(0);
        $this->artisan('telebot:commands -R')->assertExitCode(0);
    }

    public function testWebhookCommand()
    {
        $this->artisan('telebot:webhook')->assertExitCode(1);
        $this->artisan('telebot:webhook -S -R')->assertExitCode(1);

        Config::set('telebot.bots.bot.webhook.url', 'https://telebot.westacks.com.ua/webhook');
        $this->artisan('telebot:webhook -S -I')->assertExitCode(0);
        $this->artisan('telebot:webhook -R')->assertExitCode(0);
        
        Config::set('telebot.bots.bot.webhook.url', null);
    }

    public function testLongPollCommand()
    {
        $this->artisan('telebot:polling -O -L')->assertExitCode(0);
    }

    public function testNotification()
    {
        $to = new TestNotifiable;
        Notification::send($to, new TelegramNotification);

        Notification::fake();
        Notification::send($to, new TelegramNotification);
        Notification::assertSentTo($to, TelegramNotification::class);
    }

    public function testWebhookRoute()
    {
        $urls = [];

        foreach (config('telebot.bots', []) as $bot => $config) {
            $urls[] = "/telebot/webhook/$bot/".($config['token'] ?? $config ?? '');
        }

        $update = '{"update_id":1234567,"message":{"message_id":2345678,"from":{"id":3456789,"is_bot":false,"first_name":"John","last_name":"Doe"}}}';

        foreach ($urls as $url) {
            $this->post($url, json_decode($update, true))->assertStatus(200);
        }

        $this->post("/telebot/webhook/wrong_bot/123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11")->assertStatus(404);
    }

    protected function getPackageProviders($app)
    {
        return [TeleBotServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'TeleBot' => TeleBot::class
        ];
    }
}
