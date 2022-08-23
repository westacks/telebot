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
    public function testInlineKeyboard()
    {
        $keyboard = Keyboard::create([
            'inline_keyboard' => [[[
                'text' => 'Google',
                'url'  => 'https://google.com/',
            ]]],
        ]);
        $this->assertInstanceOf(InlineKeyboardMarkup::class, $keyboard);
    }

    public function testReplyKeyboard()
    {
        $keyboard = Keyboard::create([
            'keyboard' => [[[
                'text' => 'Test Keyboard Buttun',
            ]]],
        ]);
        $this->assertInstanceOf(ReplyKeyboardMarkup::class, $keyboard);
    }

    public function testForceReply()
    {
        $keyboard = Keyboard::create([
            'force_reply' => true,
        ]);
        $this->assertInstanceOf(ForceReply::class, $keyboard);
    }

    public function testRemoveKeyboard()
    {
        $keyboard = Keyboard::create([
            'remove_keyboard' => true,
        ]);
        $this->assertInstanceOf(ReplyKeyboardRemove::class, $keyboard);
    }

    public function testWrongKeyboard()
    {
        $this->expectException(TeleBotException::class);
        Keyboard::create([
            'asdflkjdsglskdfjg' => true,
        ]);
    }
}
