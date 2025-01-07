<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\StickerSet;
use WeStacks\TeleBot\TeleBot;

class StickersTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = get_bot();
    }

    public function test_get_sticker_set()
    {
        $set = $this->bot->getStickerSet([
            'name' => 'pappy_fox',
        ]);

        $this->assertInstanceOf(StickerSet::class, $set);
    }
}
