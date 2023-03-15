<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\TeleBot;

class UpdateMessageTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = get_bot();
    }

    public function testUpdateMessage()
    {
        $message = $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'Update message test',
        ]);

        $message = $this->bot->editMessageText([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
            'text' => 'Message text updated!',
        ]);

        $this->assertInstanceOf(Message::class, $message);
    }

    public function testUpdateMediaMessage()
    {
        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => 'https://api.lorem.space/image?w=640&h=640',
            'caption' => 'Update message test',
            'reply_markup' => [
                'inline_keyboard' => [[[
                    'text' => 'Google',
                    'url' => 'https://google.com/',
                ]]],
            ],
        ]);

        $message = $this->bot->editMessageCaption([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
            'caption' => 'Message caption updated!',
        ]);

        $message = $this->bot->editMessageMedia([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
            'media' => [
                'type' => 'photo',
                'media' => 'https://api.lorem.space/image?w=640&h=640',
            ],
        ]);

        $message = $this->bot->editMessageReplyMarkup([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
            'reply_markup' => [
                'inline_keyboard' => [[[
                    'text' => 'Yahoo',
                    'url' => 'https://yahoo.com/',
                ]]],
            ],
        ]);

        $deleted = $this->bot->deleteMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'message_id' => $message->message_id,
        ]);

        $this->assertInstanceOf(Message::class, $message);
        $this->assertTrue($deleted);
    }
}
