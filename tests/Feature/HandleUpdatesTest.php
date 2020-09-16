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

    /**
     * @var Array<Update>
     */
    private $updates;

    protected function setUp(): void
    {
        global $bot;
        $this->bot = $bot;
        $this->updates = $this->bot->getUpdates([]);
    }

    // You should send any message to your bot in order to have at least one update
    public function testHandleUpdates()
    {
        $this->bot->clearHandlers();
        $this->bot->addHandler([function (Update $update) {
            echo $update;
        }]);

        foreach ($this->updates as $update)
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
        $this->bot->clearHandlers();
        $this->bot->addHandler(StartCommandHandler::class);

        $commands = $this->bot->getInstaneCommands();
        $commands_set = $this->bot->setMyCommands(['commands' => $commands]);
        $this->assertTrue($commands_set);

        foreach ($this->updates as $update)
        {
            $this->bot->handleUpdate($update);
        }

        $commands_api = $this->bot->getMyCommands();
        $commands_set = $this->bot->setMyCommands(['commands' => $commands]);
        
        $this->assertTrue($commands_set);
        $this->assertContainsOnlyInstancesOf(BotCommand::class, $commands_api);
        $this->bot->setMyCommands(['commands' => []]);

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