<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\Update;

class CasterTest extends TestCase
{
    public function testCastMultipleTypes() {
        $false1 = TypeCaster::cast(false, Message::class."|boolean");
        $false2 = TypeCaster::cast(false, "boolean|".Message::class);

        $message1 = TypeCaster::cast(['message_id' => 123456], Message::class."|boolean");
        $message2 = TypeCaster::cast(['message_id' => 123456], "boolean|".Message::class);

        $this->assertFalse($false1);
        $this->assertFalse($false2);
        $this->assertInstanceOf(Message::class, $message1);
        $this->assertInstanceOf(Message::class, $message2);
    }

    public function testCastWrongMultiple() {
        $this->expectException(TeleBotObjectException::class);
        TypeCaster::cast(12334242, Message::class.'|'.Update::class);
    }
}