<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\WebhookInfo;
use WeStacks\TeleBot\TeleBot;

class WebhookTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        global $bot;
        $this->bot = $bot;
    }

    public function testWebhook()
    {
        $webhook_set = $this->bot->setWebhook([
            'url' => 'https://telebot.westacks.com.ua/webhook',
        ]);
        $this->assertTrue($webhook_set);

        $info = $this->bot->getWebhookInfo();
        $this->assertInstanceOf(WebhookInfo::class, $info);

        $webhook_deleted = $this->bot->deleteWebhook();
        $this->assertTrue($webhook_deleted);
    }
}
