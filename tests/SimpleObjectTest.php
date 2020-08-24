<?php

namespace WeStacks\TeleBot\Tests;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\WebhookInfo;
use WeStacks\TeleBot\Exceptions\TeleBotException;

class SimpleObjectTests extends TestCase
{
    /**
     * @var WebhookInfo
     */
    private $object;

    protected function setUp(): void
    {
        $this->object = new WebhookInfo([
            'url'                       => 'http://google.com/',
            'has_custom_certificate'    => false,
            'pending_update_count'      => 15,
            'last_error_date'           => 1598219528,
            'last_error_message'        => 'Something went wrong!',
            'max_connections'           => 5,
            'allowed_updates'           => [
                'message',
                'edited_message',
                'channel_post',
                'edited_channel_post',
                'inline_query',
                'chosen_inline_result',
                'callback_query',
                'shipping_query',
                'pre_checkout_query',
                'poll',
                'poll_answer'
            ],
            'some_undefined_variable' => 'This should be undefined'
        ]);
    }

    public function testGetByMagicMethod()
    {
        $data = $this->object->get('allowed_updates[0]');
        $this->assertEquals($data, 'message');

        $this->expectException(TeleBotException::class);
        $data = $this->object->get('some.undefined.variable');
    }

    public function testIsBasicPolimorphicObjectCastsCorrect()
    {
        $this->assertIsString($this->object->url);
        $this->assertEquals($this->object->url, 'http://google.com/');

        $this->assertIsArray($this->object->allowed_updates);

        $this->assertIsInt($this->object->pending_update_count);
        $this->assertEquals($this->object->pending_update_count, 15);

        $this->assertIsBool($this->object->has_custom_certificate);
        $this->assertFalse($this->object->has_custom_certificate);

        $this->assertFalse(isset($this->object->some_undefined_variable));
    }

    public function testSetObjectProperties()
    {
        $this->expectException(TeleBotException::class);

        $this->object->some_undefined_variable = 'test';
    }
}