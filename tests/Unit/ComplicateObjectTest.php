<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\TelegramObject\InputMedia;
use WeStacks\TeleBot\TelegramObject\InputMedia\InputMediaAudio;
use WeStacks\TeleBot\TelegramObject\InputMedia\InputMediaDocument;
use WeStacks\TeleBot\TelegramObject\Message;
use WeStacks\TeleBot\TelegramObject\Update;
use WeStacks\TeleBot\TelegramObject\User;

class ComplicateObjectTest extends TestCase
{
    /**
     * @var Update
     */
    private $object;

    protected function setUp(): void
    {
        $this->object = Update::create([
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
        $this->assertFalse($this->object->message->from->is_bot);
    }

    public function testGetByDotNotation()
    {
        $data = $this->object->get('message.from.id');
        $this->assertEquals(3456789, $data);

        $data = $this->object->get('some.undefined.variable');
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

    public function testInputMedia()
    {
        $data = ['type' => 'document'];
        $object = InputMedia::create($data);
        $this->assertInstanceOf(InputMediaDocument::class, $object);

        $data = ['type' => 'audio'];
        $object = InputMedia::create($data);
        $this->assertInstanceOf(InputMediaAudio::class, $object);
    }
}