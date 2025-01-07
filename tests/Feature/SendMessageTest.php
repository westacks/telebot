<?php

namespace WeStacks\TeleBot\Tests\Feature;

use GuzzleHttp\Promise\Utils;
use PHPUnit\Framework\TestCase;
use TypeError;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageId;
use WeStacks\TeleBot\Objects\Poll;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\TeleBot;

class SendMessageTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = get_bot();
    }

    public function test_call_undefined_method()
    {
        $this->expectException(TeleBotException::class);
        $this->bot->getYou();
    }

    public function test_execute_method()
    {
        $botUser = $this->bot->getMe();
        $this->assertInstanceOf(User::class, $botUser);
    }

    public function test_something_really_wrong()
    {
        $this->expectException(TypeError::class);
        $this->bot->sendMessage('test');
    }

    public function test_send_message_async()
    {
        $promises = [];

        $promises[] = $this->bot->async(true)->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'Unit test message',
        ]);

        // Should be wrong cos Telegram is not accept empty messages.
        $promises[] = $this->bot->async(true)->exceptions(false)->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => '',
        ]);

        $responses = Utils::unwrap($promises);
        $this->assertInstanceOf(Message::class, $responses[0]);
        $this->assertFalse($responses[1]);

        $this->expectException(TeleBotException::class);
        $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => '',
        ]);
    }

    public function test_forward_message()
    {
        $message = $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'This message should be forwarded',
        ]);

        $forwarded = $this->bot->forwardMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'from_chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
        ]);

        $copied = $this->bot->copyMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'from_chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
        ]);

        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(Message::class, $forwarded);
        $this->assertInstanceOf(MessageId::class, $copied);
    }

    public function test_send_location()
    {
        $message = $this->bot->sendLocation([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'live_period' => 60,
            'latitude' => 50.450157,
            'longitude' => 30.524191,
        ]);
        $this->assertInstanceOf(Message::class, $message);

        $message = $this->bot->editMessageLiveLocation([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
            'latitude' => 50.350157,
            'longitude' => 30.424191,
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        [
                            'text' => 'Google',
                            'url' => 'http://google.com/',
                        ],
                    ],
                ],
            ],
        ]);
        $this->assertInstanceOf(Message::class, $message);

        $message = $this->bot->stopMessageLiveLocation([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function test_send_venue()
    {
        $message = $this->bot->sendVenue([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'live_period' => 60,
            'latitude' => 50.450157,
            'longitude' => 30.524191,
            'title' => 'Maidan Nezalezhnosti',
            'address' => 'Kyiv',
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function test_send_contact()
    {
        $message = $this->bot->exceptions(false)->sendContact([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'phone_number' => '+380111111111',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
        $this->assertNotNull($message);
    }

    public function test_send_poll()
    {
        $message = $this->bot->sendPoll([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'question' => 'What is love?',
            'options' => [
                ['text' => 'Baby, don\'t hurt me'],
                ['text' => 'Pain'],
                ['text' => 'Butterflies'],
            ],
        ]);

        $poll = $this->bot->stopPoll([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
        ]);

        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(Poll::class, $poll);
    }

    public function test_send_dice()
    {
        $message = $this->bot->sendDice([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function test_send_chat_action()
    {
        $message = $this->bot->sendChatAction([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'action' => 'typing',
        ]);
        $this->assertTrue($message);
    }
}
