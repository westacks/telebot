<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputStoryContent;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\StoryArea;

/**
 * Posts a story on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns Story on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read InputStoryContent $content Content of the story
 * @property-read int $active_period Period after which the story is moved to the archive, in seconds; must be one of 6 * 3600, 12 * 3600, 86400, or 2 * 86400
 * @property-read ?string $caption Caption of the story, 0-2048 characters after entities parsing
 * @property-read ?string $parse_mode Mode for parsing entities in the story caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?StoryArea[] $areas A JSON-serialized list of clickable areas to be shown on the story
 * @property-read ?bool $post_to_chat_page Pass True to keep the story accessible after it expires
 * @property-read ?bool $protect_content Pass True if the content of the story must be protected from forwarding and screenshotting
 *
 * @see https://core.telegram.org/bots/api#poststory
 */
class PostStoryMethod extends TelegramMethod
{
    protected string $method = 'postStory';
    protected array $expect = ['Story'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly InputStoryContent $content,
        public readonly int $active_period,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?array $areas,
        public readonly ?bool $post_to_chat_page,
        public readonly ?bool $protect_content,
    ) {
    }
}
