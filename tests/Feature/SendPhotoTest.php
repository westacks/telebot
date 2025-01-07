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
        $this->bot = get_bot();
    }

    public function test_send_photo_from_url()
    {
        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => 'https://placehold.co/640x640.jpg',
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        [
                            'text' => 'Google',
                            'url' => 'https://google.com/',
                        ],
                    ],
                ],
            ],
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function test_send_photo_from_contents()
    {
        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => [
                'file' => fopen('https://placehold.co/640x640.jpg', 'r'),
                'filename' => 'test-image.jpg',
            ],
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function test_send_photo_from_file()
    {
        file_put_contents(__DIR__ . '/test-image.jpg', fopen('https://placehold.co/640x640.jpg', 'r'));

        $message = $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => __DIR__ . '/test-image.jpg',
        ]);
        $this->assertInstanceOf(Message::class, $message);

        unlink(__DIR__ . '/test-image.jpg');
    }

    public function test_send_photo_null()
    {
        $this->expectException(TeleBotException::class);
        $this->bot->sendPhoto([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'photo' => null,
        ]);
    }
}
