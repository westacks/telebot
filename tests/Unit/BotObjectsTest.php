<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Bot;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\User;

class BotObjectsTest extends TestCase
{
    /**
     * @var Update
     */
    private $object;

    /**
     * Json data
     * @var string
     */
    private $json = '{"update_id":1234567,"message":{"message_id":2345678,"from":{"id":3456789,"is_bot":false,"first_name":"John","last_name":"Doe"}}}';

    /**
     * Data object
     * @var (int|(int|(int|false|string)[])[])[]
     */
    private $data;

    protected function setUp(): void
    {
        $this->data = json_decode($this->json, true);
        $this->object = Update::create($this->data);
    }

    public function testBotWithEmptyConfig()
    {
        $this->expectException(TeleBotObjectException::class);
        new Bot([]);
    }

    public function testBotWithWrongConfig()
    {
        $this->expectException(TeleBotObjectException::class);
        new Bot(123);
    }

    public function testWrongObject()
    {
        $this->expectException(TeleBotObjectException::class);
        new Message([
            'entities' => 'string'
        ]);
    }

    public function testTypes()
    {
        $this->assertInstanceOf(Update::class, $this->object);
        $this->assertInstanceOf(Message::class, $this->object->message);
        $this->assertInstanceOf(User::class, $this->object->message->from);
        $this->assertFalse($this->object->message->from->is_bot);
    }

    public function testDebug()
    {
        $result = print_r($this->object, true);
        $this->assertTrue(str_contains($result, 'WeStacks\TeleBot\Objects\User Object'));
    }

    public function testCastWrogType()
    {
        $this->expectException(TeleBotObjectException::class);
        new Update([
            'update_id' => [1,4,5,1,5,6],
            'message' => 4
        ]);
    }

    public function testHelpersAndMagickMethods()
    {
        $this->assertEquals($this->json, $this->object->toJson());
        $this->assertEquals($this->data, $this->object->toArray());

        ob_start();
        var_dump($this->object);
        $result = ob_get_clean();
        $this->assertStringContainsString("class WeStacks\TeleBot\Objects\Update", $result);
    }

    public function testGetByDotNotation()
    {
        $data = $this->object->get('message.from.id');
        $this->assertEquals(3456789, $data);

        $data = $this->object->get('some.undefined.variable');
        $this->assertNull($data);

        $this->expectException(TeleBotObjectException::class);
        $this->object->get('some.undefined.variable', true);
    }

    public function testDotNotationWrongString()
    {
        $this->expectException(TeleBotObjectException::class);
        $this->object->get('', true);
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

    public function testUnetObjectProperties()
    {
        $this->expectException(TeleBotObjectException::class);
        unset($this->object->message);
    }
}