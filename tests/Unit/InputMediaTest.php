<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\InputMediaAnimation;
use WeStacks\TeleBot\Objects\InputMediaAudio;
use WeStacks\TeleBot\Objects\InputMediaDocument;
use WeStacks\TeleBot\Objects\InputMediaPhoto;
use WeStacks\TeleBot\Objects\InputMediaVideo;

class InputMediaTest extends TestCase
{
    public function test_input_media()
    {
        $object = InputMedia::create(['type' => 'document']);
        $this->assertInstanceOf(InputMediaDocument::class, $object);

        $object = InputMedia::create(['type' => 'audio']);
        $this->assertInstanceOf(InputMediaAudio::class, $object);

        $object = InputMedia::create(['type' => 'animation']);
        $this->assertInstanceOf(InputMediaAnimation::class, $object);

        $object = InputMedia::create(['type' => 'photo']);
        $this->assertInstanceOf(InputMediaPhoto::class, $object);

        $object = InputMedia::create(['type' => 'video']);
        $this->assertInstanceOf(InputMediaVideo::class, $object);
    }

    public function test_wrong_input_media()
    {
        $this->expectException(TeleBotException::class);
        InputMedia::create(['type' => 'some_wrong_type']);
    }
}
