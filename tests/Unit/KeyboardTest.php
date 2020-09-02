<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Keyboard\ForceReply;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Keyboard\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\Keyboard\ReplyKeyboardRemove;

class KeyboardTest extends TestCase
{
    

    public function testInlineKeyboard()
    {
        $keyboard = Keyboard::create([
            'inline_keyboard' => [[[
                'text' => 'Google',
                'url' => 'https://google.com/'
            ]]]
        ]);
        $this->assertInstanceOf(InlineKeyboardMarkup::class, $keyboard);
    }

    public function testReplyKeyboard()
    {
        $keyboard = Keyboard::create([
            'keyboard' => [[[
                'text' => 'Test Keyboard Buttun'
            ]]],
        ]);
        $this->assertInstanceOf(ReplyKeyboardMarkup::class, $keyboard);
    }

    public function testForceReply()
    {
        $keyboard = Keyboard::create([
            'force_reply' => true
        ]);
        $this->assertInstanceOf(ForceReply::class, $keyboard);
    }

    public function testRemoveKeyboard()
    {
        $keyboard = Keyboard::create([
            'remove_keyboard' => true
        ]);
        $this->assertInstanceOf(ReplyKeyboardRemove::class, $keyboard);
    }

    public function testWrongKeyboard()
    {
        $this->expectException(TeleBotObjectException::class);
        Keyboard::create([
            'asdflkjdsglskdfjg' => true
        ]);
    }
}