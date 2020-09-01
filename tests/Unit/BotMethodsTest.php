<?php

namespace WeStacks\TeleBot\Tests\Unit;

use GuzzleHttp\Promise\PromiseInterface;
use WeStacks\TeleBot\Bot;
use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotRequestException;
use WeStacks\TeleBot\TelegramObject\InputFile;
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
        $this->assertInstanceOf(User::class, $botUser);
    }

    public function testAsync()
    {
        $promise = $this->bot->async()->getMe();
        $this->assertInstanceOf(PromiseInterface::class, $promise);

        $result = $promise->wait();
        $this->assertInstanceOf(User::class, $result);
    }

    public function testSendMessage()
    {
        $message = $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'Unit test message',
            'reply_markup' => [
                'inline_keyboard' => [[[
                    'text' => 'Google',
                    'url' => 'https://google.com/'
                ]]]
            ]
        ]);
        $this->assertInstanceOf(Message::class, $message);

        $this->expectException(TeleBotRequestException::class);
        $message = $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => '',
        ]);
    }

    public function testSendPhotoFromUrl()
    {
        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => "http://lorempixel.com/1280/720/"
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function testSendPhotoFromFile()
    {
        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => __DIR__.'/../Assets/test-image.jpg'
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }
}