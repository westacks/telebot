<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an incoming callback query from a callback button in an inline keyboard. If the button that originated the query was attached to a message sent by the bot, the field message will be present. If the button was attached to a message sent via the bot (in inline mode), the field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.
 * @property-read string $id Unique identifier for this query
 * @property-read User $from Sender
 * @property-read ?MaybeInaccessibleMessage $message Optional. Message sent by the bot with the callback button that originated the query
 * @property-read ?string $inline_message_id Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
 * @property-read string $chat_instance Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in games.
 * @property-read ?string $data Optional. Data associated with the callback button. Be aware that the message originated the query can contain no callback buttons with this data.
 * @property-read ?string $game_short_name Optional. Short name of a Game to be returned, serves as the unique identifier for the game
 *
 * @see https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQuery extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly User $from,
        public readonly ?MaybeInaccessibleMessage $message,
        public readonly ?string $inline_message_id,
        public readonly string $chat_instance,
        public readonly ?string $data,
        public readonly ?string $game_short_name,
    ) {
    }
}
