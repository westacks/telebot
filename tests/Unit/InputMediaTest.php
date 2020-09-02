<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaAnimation;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaAudio;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaDocument;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaPhoto;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaVideo;

class InputMediaTest extends TestCase
{
    public function testInputMedia()
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

    public function testWrongInputMedia()
    {
        $this->expectException(TeleBotObjectException::class);
        InputMedia::create(['type' => 'some_wrong_type']);
    }
}