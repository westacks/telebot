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
        // Check webhook
        $info = $this->bot->getWebhookInfo();
        $this->assertInstanceOf(WebhookInfo::class, $info);
        $this->assertEquals('', $info->url);
    }
}