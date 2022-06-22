<?php

namespace WeStacks\TeleBot\Tests\Issue;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class IssueTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = get_bot();
    }

    public function testIssue15() // https://github.com/westacks/telebot/issues/15
    {
        $update = new Update([
            'update_id' => 848141909,
            'message' => [
                'message_id' => 400,
                'from' => [
                    'id' => '123123',
                    'is_bot' => false,
                    'first_name' => 'first_name',
                    'username' => 'username',
                    'language_code' => 'en',
                ],
                'chat' => [
                    'id' => '123123',
                    'first_name' => 'first_name',
                    'username' => 'username',
                    'type' => 'private',
                ],
                'date' => 1619653425,
                'forward_from' => [
                    'id' => '123123',
                    'is_bot' => true,
                    'first_name' => 'first_name',
                    'username' => 'username',
                ],
                'forward_date' => 1619564252,
                'invoice' => [
                    'title' => 'Product',
                    'description' => 'description',
                    'start_parameter' => '',
                    'currency' => 'UAH',
                    'total_amount' => 1810,
                ],
                'reply_markup' => [
                    'inline_keyboard' => [[[
                        'text' => 'Pay 18,10UAH',
                        'pay' => true,
                    ]]],
                ],
            ],
        ]);

        $this->bot->callHandler(function (Update $update, bool $force) {
            // $update->message->text is undefined

            // works because of null coalescing operator
            $variant1 = $update->message->text ?? false;
            $this->assertFalse($variant1);

            // dot-notation is not throwing exception by default
            $variant2 = $update->get('message.text');
            $this->assertNull($variant2);

            // Exception will be thrown:
            try {
                // if you call undefined variable without any checks
                $variant3 = $update->message->text;
                // as we ask get method to throw exception if variable is undefined
                $variant4 = $update->get('message.text', true);
                // nullsafe operator is not works as text property is not null - it's undefined
                $variant5 = $update?->message?->text;
            } catch (\Exception $e) {
                //
            }
        }, $update);

        $this->assertTrue(true);
    }
}
