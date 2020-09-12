<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Bot;
use WeStacks\TeleBot\Exception\TeleBotFileException;
use WeStacks\TeleBot\Objects\Message;

class SendAudioTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new Bot(getenv('TELEGRAM_BOT_TOKEN'));
    }

    public function testSendAudioFromUrl()
    {
        $message = $this->bot->sendAudio([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'audio' => "https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3"
        ]);
        $this->assertInstanceOf(Message::class, $message);
    }
}