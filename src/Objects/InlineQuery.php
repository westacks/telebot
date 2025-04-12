<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 * @property-read string $id Unique identifier for this query
 * @property-read User $from Sender
 * @property-read string $query Text of the query (up to 256 characters)
 * @property-read string $offset Offset of the results to be returned, can be controlled by the bot
 * @property-read ?string $chat_type Optional. Type of the chat from which the inline query was sent. Can be either “sender” for a private chat with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always known for requests sent from official clients and most third-party clients, unless the request was sent from a secret chat
 * @property-read ?Location $location Optional. Sender location, only for bots that request user location
 *
 * @see https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly User $from,
        public readonly string $query,
        public readonly string $offset,
        public readonly ?string $chat_type,
        public readonly ?Location $location,
    ) {
    }
}
