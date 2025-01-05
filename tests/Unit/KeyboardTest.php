<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;

class KeyboardTest extends TestCase
{
    public function test_inline_keyboard()
    {
        $keyboard = Keyboard::create([
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Google',
                        'url' => 'https://google.com/',
                    ],
                ],
            ],
        ]);
        $this->assertInstanceOf(InlineKeyboardMarkup::class, $keyboard);
    }

    public function test_reply_keyboard()
    {
        $keyboard = Keyboard::create([
            'keyboard' => [
                [
                    [
                        'text' => 'Test Keyboard Buttun',
                    ],
                ],
            ],
        ]);
        $this->assertInstanceOf(ReplyKeyboardMarkup::class, $keyboard);
    }

    public function test_force_reply()
    {
        $keyboard = Keyboard::create([
            'force_reply' => true,
        ]);
        $this->assertInstanceOf(ForceReply::class, $keyboard);
    }

    public function test_remove_keyboard()
    {
        $keyboard = Keyboard::create([
            'remove_keyboard' => true,
        ]);
        $this->assertInstanceOf(ReplyKeyboardRemove::class, $keyboard);
    }

    public function test_wrong_keyboard()
    {
        $this->expectException(TeleBotException::class);
        Keyboard::create([
            'asdflkjdsglskdfjg' => true,
        ]);
    }
}
