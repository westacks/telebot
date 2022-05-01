<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\InputContactMessageContent;
use WeStacks\TeleBot\Objects\InputLocationMessageContent;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\InputTextMessageContent;
use WeStacks\TeleBot\Objects\InputVenueMessageContent;

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
        $this->expectException(TeleBotException::class);
        InputMessageContent::create(['something_wrong' => 'some_wrong_type']);
    }
}
