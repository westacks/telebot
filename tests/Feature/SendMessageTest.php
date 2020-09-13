<?php

namespace WeStacks\TeleBot\Tests\Feature;

use GuzzleHttp\Promise;
use WeStacks\TeleBot\Bot;
use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Exception\TeleBotRequestException;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\User;

class SendMessageTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new Bot(getenv('TELEGRAM_BOT_TOKEN'));
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

    public function testSomethingRealyWrong()
    {
        $this->expectException(TeleBotObjectException::class);
        $this->bot->sendMessage('test');
    }

    public function testSendMessageAsync()
    {
        $promises = [];

        $promises[] = $this->bot->async(true)->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'Unit test message'
        ]);

        // Should be wrong cos Telegram is not accept empty messages.
        $promises[] = $this->bot->async(true)->exceptions(false)->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => ''
        ]);

        $responses = Promise\unwrap($promises);
        $this->assertInstanceOf(Message::class, $responses[0]);
        $this->assertFalse($responses[1]);

        $this->expectException(TeleBotRequestException::class);
        $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => ''
        ]);
    }

    public function testForwardMessage()
    {
        $message = $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'This message should be forwarded'
        ]);

        $forwarded = $this->bot->forwardMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'from_chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id
        ]);

        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(Message::class, $forwarded);
    }

    public function testSendLocation()
    {
        $message = $this->bot->sendLocation([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'live_period' => 60,
            'latitude' => 50.450157,
            'longitude' => 30.524191
        ]);
        $this->assertInstanceOf(Message::class, $message);

        $message = $this->bot->editMessageLiveLocation([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
            'latitude' => 50.350157,
            'longitude' => 30.424191,
            'reply_markup' => [
                'inline_keyboard' => [[[
                    'text' => 'Google',
                    'url' => 'http://google.com/'
                ]]]
            ]
        ]);
        $this->assertInstanceOf(Message::class, $message);

        $message = $this->bot->stopMessageLiveLocation([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function testSendVenue()
    {
        $message = $this->bot->sendVenue([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'live_period' => 60,
            'latitude' => 50.450157,
            'longitude' => 30.524191,
            'title' => 'Maidan Nezalezhnosti',
            'address' => 'Kyiv'
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function testSendContact()
    {
        $message = $this->bot->sendContact([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'phone_number' => '+1-541-754-3010',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }
}