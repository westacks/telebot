<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\InputMessageContent\InputContactMessageContent;
use WeStacks\TeleBot\Objects\InputMessageContent\InputLocationMessageContent;
use WeStacks\TeleBot\Objects\InputMessageContent\InputTextMessageContent;
use WeStacks\TeleBot\Objects\InputMessageContent\InputVenueMessageContent;

class InputMessageContentTest extends TestCase
{
    public function testInputMessageContent()
    {
        $object = InputMessageContent::create(['message_text' => 'Test']);
        $this->assertInstanceOf(InputTextMessageContent::class, $object);

        $object = InputMessageContent::create([
            'address' => 'Test',
            'latitude' => 23.043235,
        ]);
        $this->assertInstanceOf(InputVenueMessageContent::class, $object);

        $object = InputMessageContent::create([
            'latitude' => 23.043235,
        ]);
        $this->assertInstanceOf(InputLocationMessageContent::class, $object);

        $object = InputMessageContent::create([
            'phone_number' => '+380111111111',
        ]);
        $this->assertInstanceOf(InputContactMessageContent::class, $object);
    }

    public function testWrongInputMessageContent()
    {
        $this->expectException(TeleBotObjectException::class);
        InputMessageContent::create(['something_wrong' => 'some_wrong_type']);
    }
}
