<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of GameHighScore objects.
 *
 * @property-read int $user_id Target user id
 * @property-read ?int $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat
 * @property-read ?int $message_id Required if inline_message_id is not specified. Identifier of the sent message
 * @property-read ?string $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
 *
 * @see https://core.telegram.org/bots/api#getgamehighscores
 */
class GetGameHighScoresMethod extends TelegramMethod
{
    protected string $method = 'getGameHighScores';
    protected array $expect = ['GameHighScore[]'];

    public function __construct(
        public readonly int $user_id,
        public readonly ?int $chat_id,
        public readonly ?int $message_id,
        public readonly ?string $inline_message_id,
    ) {
    }
}
