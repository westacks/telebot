<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Verifies a chat on behalf of the organization which is represented by the bot. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target bot, supergroup, or channel in the format @username. Channel direct messages chats can't be verified.
 * @property-read ?string $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization isn't allowed to provide a custom verification description.
 * @property-read ?string $custom_description_parse_mode Mode for parsing entities in the custom description. See formatting options for more details. Only “text_link” entities are supported.
 * @property-read ?MessageEntity[] $custom_description_entities A JSON-serialized list of special entities that appear in the custom description, which can be specified instead of custom_description_parse_mode. Only “text_link” entities are supported.
 *
 * @see https://core.telegram.org/bots/api#verifychat
 */
class VerifyChatMethod extends TelegramMethod
{
    protected string $method = 'verifyChat';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?string $custom_description,
        public readonly ?string $custom_description_parse_mode,
        public readonly ?array $custom_description_entities,
    ) {
    }
}
