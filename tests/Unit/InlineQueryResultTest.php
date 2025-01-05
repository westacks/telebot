<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InlineQueryResultArticle;
use WeStacks\TeleBot\Objects\InlineQueryResultAudio;
use WeStacks\TeleBot\Objects\InlineQueryResultCachedAudio;
use WeStacks\TeleBot\Objects\InlineQueryResultCachedDocument;
use WeStacks\TeleBot\Objects\InlineQueryResultCachedGif;
use WeStacks\TeleBot\Objects\InlineQueryResultCachedMpeg4Gif;
use WeStacks\TeleBot\Objects\InlineQueryResultCachedPhoto;
use WeStacks\TeleBot\Objects\InlineQueryResultCachedSticker;
use WeStacks\TeleBot\Objects\InlineQueryResultCachedVideo;
use WeStacks\TeleBot\Objects\InlineQueryResultCachedVoice;
use WeStacks\TeleBot\Objects\InlineQueryResultContact;
use WeStacks\TeleBot\Objects\InlineQueryResultDocument;
use WeStacks\TeleBot\Objects\InlineQueryResultGame;
use WeStacks\TeleBot\Objects\InlineQueryResultGif;
use WeStacks\TeleBot\Objects\InlineQueryResultLocation;
use WeStacks\TeleBot\Objects\InlineQueryResultMpeg4Gif;
use WeStacks\TeleBot\Objects\InlineQueryResultPhoto;
use WeStacks\TeleBot\Objects\InlineQueryResultVenue;
use WeStacks\TeleBot\Objects\InlineQueryResultVideo;
use WeStacks\TeleBot\Objects\InlineQueryResultVoice;

class InlineQueryResultTest extends TestCase
{
    public function test_inline_query_result_default()
    {
        $object = InlineQueryResult::create(['type' => 'photo']);
        $this->assertInstanceOf(InlineQueryResultPhoto::class, $object);

        $object = InlineQueryResult::create(['type' => 'article']);
        $this->assertInstanceOf(InlineQueryResultArticle::class, $object);

        $object = InlineQueryResult::create(['type' => 'gif']);
        $this->assertInstanceOf(InlineQueryResultGif::class, $object);

        $object = InlineQueryResult::create(['type' => 'mpeg4_gif']);
        $this->assertInstanceOf(InlineQueryResultMpeg4Gif::class, $object);

        $object = InlineQueryResult::create(['type' => 'video']);
        $this->assertInstanceOf(InlineQueryResultVideo::class, $object);

        $object = InlineQueryResult::create(['type' => 'audio']);
        $this->assertInstanceOf(InlineQueryResultAudio::class, $object);

        $object = InlineQueryResult::create(['type' => 'voice']);
        $this->assertInstanceOf(InlineQueryResultVoice::class, $object);

        $object = InlineQueryResult::create(['type' => 'document']);
        $this->assertInstanceOf(InlineQueryResultDocument::class, $object);

        $object = InlineQueryResult::create(['type' => 'location']);
        $this->assertInstanceOf(InlineQueryResultLocation::class, $object);

        $object = InlineQueryResult::create(['type' => 'venue']);
        $this->assertInstanceOf(InlineQueryResultVenue::class, $object);

        $object = InlineQueryResult::create(['type' => 'contact']);
        $this->assertInstanceOf(InlineQueryResultContact::class, $object);

        $object = InlineQueryResult::create(['type' => 'game']);
        $this->assertInstanceOf(InlineQueryResultGame::class, $object);
    }

    public function test_inline_query_result_cached()
    {
        $object = InlineQueryResult::create(['type' => 'photo', 'photo_file_id' => 123123123]);
        $this->assertInstanceOf(InlineQueryResultCachedPhoto::class, $object);

        $object = InlineQueryResult::create(['type' => 'gif', 'gif_file_id' => 123123123]);
        $this->assertInstanceOf(InlineQueryResultCachedGif::class, $object);

        $object = InlineQueryResult::create(['type' => 'mpeg4_gif', 'mpeg4_file_id' => 123123123]);
        $this->assertInstanceOf(InlineQueryResultCachedMpeg4Gif::class, $object);

        $object = InlineQueryResult::create(['type' => 'sticker', 'sticker_file_id' => 123123123]);
        $this->assertInstanceOf(InlineQueryResultCachedSticker::class, $object);

        $object = InlineQueryResult::create(['type' => 'document', 'document_file_id' => 123123123]);
        $this->assertInstanceOf(InlineQueryResultCachedDocument::class, $object);

        $object = InlineQueryResult::create(['type' => 'video', 'video_file_id' => 123123123]);
        $this->assertInstanceOf(InlineQueryResultCachedVideo::class, $object);

        $object = InlineQueryResult::create(['type' => 'voice', 'voice_file_id' => 123123123]);
        $this->assertInstanceOf(InlineQueryResultCachedVoice::class, $object);

        $object = InlineQueryResult::create(['type' => 'audio', 'audio_file_id' => 123123123]);
        $this->assertInstanceOf(InlineQueryResultCachedAudio::class, $object);
    }

    public function test_wrong_inline_query_result()
    {
        $this->expectException(TeleBotException::class);
        InlineQueryResult::create(['type' => 'some_wrong_type']);
    }
}
