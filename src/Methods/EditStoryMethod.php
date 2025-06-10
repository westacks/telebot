<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputStoryContent;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\StoryArea;

/**
 * Edits a story previously posted by the bot on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns Story on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read int $story_id Unique identifier of the story to edit
 * @property-read InputStoryContent $content Content of the story
 * @property-read ?string $caption Caption of the story, 0-2048 characters after entities parsing
 * @property-read ?string $parse_mode Mode for parsing entities in the story caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?StoryArea[] $areas A JSON-serialized list of clickable areas to be shown on the story
 *
 * @see https://core.telegram.org/bots/api#editstory
 */
class EditStoryMethod extends TelegramMethod
{
    protected string $method = 'editStory';
    protected array $expect = ['Story'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly int $story_id,
        public readonly InputStoryContent $content,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?array $areas,
    ) {
    }
}
