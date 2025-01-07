<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Helpers\Type;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\Update;

class CasterTest extends TestCase
{
    public function test_cast_multiple_types()
    {
        $false1 = Type::cast(false, Message::class . '|boolean');
        $false2 = Type::cast(false, 'boolean|' . Message::class);

        $message1 = Type::cast(['message_id' => 123456], 'Message|boolean');
        $message2 = Type::cast(['message_id' => 123456], 'boolean|Message');

        $this->assertFalse($false1);
        $this->assertFalse($false2);
        $this->assertInstanceOf(Message::class, $message1);
        $this->assertInstanceOf(Message::class, $message2);
    }

    public function test_cast_wrong_multiple()
    {
        $this->expectException(TeleBotException::class);
        Type::cast(12334242, Message::class . '|' . Update::class);
    }
}
