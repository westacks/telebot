<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Bot;
use WeStacks\TeleBot\Objects\Update;

class HandleUpdatesTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new Bot(getenv('TELEGRAM_BOT_TOKEN'));
    }

    public function testHandleUpdates()
    {
        $this->bot->addHandler([function (Update $update) {
            echo $update;
        }]);

        $updates = $this->bot->getUpdates();

        foreach ($updates as $update)
        {
            // We will store out handler JSON output into the buffer and then validate is it the same update
            ob_start();
            $this->bot->handleUpdate($update);
            $result = new Update(json_decode(ob_get_clean()));

            $this->assertEquals($update->update_id, $result->update_id);
        }
    }
}