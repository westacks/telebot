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
        $webhook_set = $this->bot->setWebhook([
            'url' => 'https://example.com/'
        ]);
        $this->assertTrue($webhook_set);

        $info = $this->bot->getWebhookInfo();
        $this->assertInstanceOf(WebhookInfo::class, $info);

        $webhook_deleted = $this->bot->deleteWebhook();
        $this->assertTrue($webhook_deleted);
    }
}