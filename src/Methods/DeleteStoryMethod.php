<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Deletes a story previously posted by the bot on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read int $story_id Unique identifier of the story to delete
 *
 * @see https://core.telegram.org/bots/api#deletestory
 */
class DeleteStoryMethod extends TelegramMethod
{
    protected string $method = 'deleteStory';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly int $story_id,
    ) {
    }
}
