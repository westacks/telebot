<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Bot;
use WeStacks\TeleBot\Objects\WebhookInfo;

class WebhookTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new Bot(getenv('TELEGRAM_BOT_TOKEN'));
    }

    public function testWebhook()
    {
        // Check empty webhook
        $info = $this->bot->getWebhookInfo();
        $this->assertInstanceOf(WebhookInfo::class, $info);
        $this->assertEquals('', $info->url);

        // Set webhook
        $res = $this->bot->setWebhook([ 'url' => 'https://www.example.com/telegram_webhook' ]);
        $this->assertTrue($res);

        // Check set webhook
        $info = $this->bot->getWebhookInfo();
        $this->assertInstanceOf(WebhookInfo::class, $info);
        $this->assertEquals('https://www.example.com/telegram_webhook', $info->url);

        // Remove webhook
        $res = $this->bot->deleteWebhook();
        $this->assertTrue($res);
    }
}