<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Bot;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Tests\Helpers\StartCommandHandler;

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

    // You should send any message to your bot in order to have at least one update
    public function testHandleUpdates()
    {
        // Using array just to test is it works
        $this->bot->addHandler([function (Update $update) {
            // This should echo update's JSON object
            echo $update;
        }]);

        // Please don't specify offset so I don't need to resend messages to my bot 
        $updates = $this->bot->getUpdates();

        foreach ($updates as $update)
        {
            // We will store our handler JSON output into the output buffer and then validate is it the same update
            ob_start();
            $this->bot->handleUpdate($update);
            $result = new Update(json_decode(ob_get_clean()));

            $this->assertEquals($update->update_id, $result->update_id);
        }
    }

    public function testHandleUpdatesUsingObject()
    {
        // Check telegram output. You should get "Hello, World!" from StartCommandHandler::class
        $this->bot->addHandler(StartCommandHandler::class);

        $updates = $this->bot->getUpdates([]);
        foreach ($updates as $update)
        {
            $this->bot->handleUpdate($update);
        }

        $this->expectException(TeleBotMehtodException::class);
        $this->bot->addHandler(Update::class);
    }

    public function testGetBotCommand()
    {
        $commands = StartCommandHandler::getBotCommand();
        $this->assertContainsOnlyInstancesOf(BotCommand::class, $commands);
        $this->assertCount(2, $commands);
    }
}