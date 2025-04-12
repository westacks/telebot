<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about a chat that was shared with the bot using a KeyboardButtonRequestChat button.
 * @property-read int $request_id Identifier of the request
 * @property-read int $chat_id Identifier of the shared chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot may not have access to the chat and could be unable to use this identifier, unless the chat is already known to the bot by some other means.
 * @property-read ?string $title Optional. Title of the chat, if the title was requested by the bot.
 * @property-read ?string $username Optional. Username of the chat, if the username was requested by the bot and available.
 * @property-read ?PhotoSize[] $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot
 *
 * @see https://core.telegram.org/bots/api#chatshared
 */
class ChatShared extends TelegramObject
{
    public function __construct(
        public readonly int $request_id,
        public readonly int $chat_id,
        public readonly ?string $title,
        public readonly ?string $username,
        public readonly ?array $photo,
    ) {
    }
}
