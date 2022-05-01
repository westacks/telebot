<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;
use WeStacks\TeleBot\Tests\Helpers\StartCommandHandler;

class HandleUpdatesTest extends TestCase
{
    /**
     * @var array<Update>
     */
    private $updates;

    protected function setUp(): void
    {
        $from = [
            'id' => getenv('TELEGRAM_USER_ID'),
            'is_bot' => false,
            'first_name' => 'Test',
            'last_name' => 'Test',
            'username' => 'Test',
            'language_code' => 'en',
        ];

        $chat = [
            'id' => getenv('TELEGRAM_USER_ID'),
            'first_name' => 'Test',
            'last_name' => 'Test',
            'username' => 'Test',
            'type' => 'private',
        ];

        $this->updates = [
            new Update([
                'update_id' => 1,
                'message' => [
                    'message_id' => 1,
                    'from' => $from,
                    'chat' => $chat,
                    'date' => now()->seconds(-5)->timestamp,
                    'text' => '/start',
                    'entities' => [
                        [
                            'offset' => 0,
                            'length' => 6,
                            'type' => 'bot_command',
                        ],
                    ],
                ],
            ]),
            new Update([
                'update_id' => 2,
                'message' => [
                    'message_id' => 2,
                    'from' => $from,
                    'chat' => $chat,
                    'date' => now()->seconds(-4)->timestamp,
                    'text' => '/test',
                    'entities' => [
                        [
                            'offset' => 0,
                            'length' => 5,
                            'type' => 'bot_command',
                        ],
                    ],
                ],
            ]),
            new Update([
                'update_id' => 3,
                'message' => [
                    'message_id' => 3,
                    'from' => $from,
                    'chat' => $chat,
                    'date' => now()->seconds(-3)->timestamp,
                    'text' => 'help',
                ],
            ]),
            new Update([
                'update_id' => 4,
                'message' => [
                    'message_id' => 4,
                    'from' => $from,
                    'chat' => $chat,
                    'date' => now()->seconds(-2)->timestamp,
                    'text' => '#help',
                    'entities' => [
                        [
                            'offset' => 0,
                            'length' => 5,
                            'type' => 'hashtag',
                        ],
                    ],
                ],
            ]),
        ];
    }

    // You should send any message to your bot in order to have at least one update
    public function testHandleUpdatesSimple()
    {
        $bot = new TeleBot([
            'token' => getenv('TELEGRAM_BOT_TOKEN'),
            'handlers' => [
                function (TeleBot $bot, Update $update, $next) {
                    echo $update;

                    return $next();
                },
            ],
        ]);

        foreach ($this->updates as $update) {
            // We will store our handler JSON output into the output buffer and then validate is it the same update
            ob_start();
            $bot->handleUpdate($update);
            $result = new Update(json_decode(ob_get_clean(), true));

            $this->assertEquals($update->update_id, $result->update_id);
        }
    }

    public function testUpdateType()
    {
        $type = $this->updates[0]->is('message');
        $this->assertIsBool($type);

        $type = $this->updates[0]->type();
        $this->assertIsString($type);
    }

    public function testHandleUpdatesUsingObject()
    {
        $bot = new TeleBot([
            'token' => getenv('TELEGRAM_BOT_TOKEN'),
            'handlers' => [
                StartCommandHandler::class,
            ],
        ]);

        $commands_set = $bot->setLocalCommands();
        $this->assertTrue($commands_set);

        $current_commands = $bot->getMyCommands();
        $this->assertContainsOnlyInstancesOf(BotCommand::class, $current_commands);

        $commands_removed = $bot->deleteMyCommands();
        $this->assertTrue($commands_removed);

        foreach ($this->updates as $update) {
            $bot->handleUpdate($update);
        }
    }

    public function testGetBotCommand()
    {
        $commands = StartCommandHandler::getBotCommand();
        $this->assertContainsOnlyInstancesOf(BotCommand::class, $commands);
        $this->assertCount(2, $commands);
    }

    public function testGetConfig()
    {
        $bot = new TeleBot(getenv('TELEGRAM_BOT_TOKEN'));
        $this->assertEquals(getenv('TELEGRAM_BOT_TOKEN'), $bot->config('token'));
    }
}
