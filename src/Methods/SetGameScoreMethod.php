<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the Message is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
 *
 * @property-read int $user_id User identifier
 * @property-read int $score New score, must be non-negative
 * @property-read ?bool $force Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters
 * @property-read ?bool $disable_edit_message Pass True if the game message should not be automatically edited to include the current scoreboard
 * @property-read ?int $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat
 * @property-read ?int $message_id Required if inline_message_id is not specified. Identifier of the sent message
 * @property-read ?string $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
 *
 * @see https://core.telegram.org/bots/api#setgamescore
 */
class SetGameScoreMethod extends TelegramMethod
{
    protected string $method = 'setGameScore';
    protected array $expect = ['Message', 'true'];

    public function __construct(
        public readonly int $user_id,
        public readonly int $score,
        public readonly ?bool $force,
        public readonly ?bool $disable_edit_message,
        public readonly ?int $chat_id,
        public readonly ?int $message_id,
        public readonly ?string $inline_message_id,
    ) {
    }
}
