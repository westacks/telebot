<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\TeleBot;

class SendPhotoTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new TeleBot(getenv('TELEGRAM_BOT_TOKEN'));
    }

    public function testSendPhotoFromUrl()
    {
        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => 'https://picsum.photos/640',
            'reply_markup' => [
                'inline_keyboard' => [[[
                    'text' => 'Google',
                    'url' => 'https://google.com/',
                ]]],
            ],
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function testSendPhotoFromContents()
    {
        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => [
                'file' => fopen('https://picsum.photos/640', 'r'),
                'filename' => 'test-image.jpg',
            ],
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function testSendPhotoFromFile()
    {
        file_put_contents(__DIR__.'/test-image.jpg', fopen('https://picsum.photos/640', 'r'));

        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => __DIR__.'/test-image.jpg',
        ]);
        $this->assertInstanceOf(Message::class, $message);

        unlink(__DIR__.'/test-image.jpg');
    }

    public function testSendPhotoNull()
    {
        $this->expectException(TeleBotException::class);
        $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => null,
        ]);
    }
}
