<?php

namespace WeStacks\TeleBot\Tests;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotObjectException;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\User;

class ComplicateObjectTest extends TestCase
{
    /**
     * @var Update
     */
    private $object;

    protected function setUp(): void
    {
        $this->object = new Update([
            'update_id' => 1234567,
            'message' => [
                'message_id' => 2345678,
                'from' => [
                    'id' => 3456789,
                    'is_bot' => false,
                    'first_name' => 'John',
                    'last_name' => 'Doe'
                ]
            ]
        ]);
    }

    public function testTypes()
    {
        $this->assertInstanceOf(Update::class, $this->object);
        $this->assertInstanceOf(Message::class, $this->object->message);
        $this->assertInstanceOf(User::class, $this->object->message->from);
    }

    public function testGetByDotNotation()
    {
        $data = $this->object->get('message.from.id');
        $this->assertEquals($data, 3456789);

        $data = $this->object->get('message.from[0].id.unaccessible');
        $this->assertNull($data);

        $this->expectException(TeleBotObjectException::class);
        $data = $this->object->get('some.undefined.variable', true);
    }

    public function testNullCoalescing()
    {
        $data = $this->object->message ?? null;
        $this->assertInstanceOf(Message::class, $data);

        $data = $this->object->message->unaccessible->another->unaccessible ?? null;
        $this->assertNull($data);
    }

    public function testSetObjectProperties()
    {
        $this->expectException(TeleBotObjectException::class);
        $this->object->some_undefined_variable = 'test';
    }
}