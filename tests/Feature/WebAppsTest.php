<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\TeleBot;

class WebAppsTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new TeleBot(getenv('TELEGRAM_BOT_TOKEN'));
    }

    public function testWebApp()
    {
        $this->bot->setChatMenuButton([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'menu_button' => [
                'type' => 'web_app',
                'text' => 'My App',
                'web_app' => [
                    'url' => 'https://westacks.com.ua'
                ]
            ]
        ]);
    }
}
