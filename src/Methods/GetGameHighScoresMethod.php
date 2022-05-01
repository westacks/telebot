<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. On success, returns an Array of [GameHighScore](https://core.telegram.org/bots/api#gamehighscore) objects.
 *
 * > This method will currently return scores for the target user, plus two of their closest neighbors on each side. Will also return the top three users if the user and his neighbors are not among them. Please note that this behavior is subject to change.
 *
 * @property int    $user_id           __Required: Yes__. Target user id
 * @property int    $chat_id           __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat
 * @property int    $message_id        __Required: Optional__. Required if inline_message_id is not specified. Identifier of the sent message
 * @property string $inline_message_id __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 */
class GetGameHighScoresMethod extends TelegramMethod
{
    protected string $method = 'getGameHighScores';

    protected string $expect = 'GameHighScore[]';

    protected array $parameters = [
        'user_id' => 'string',
        'chat_id' => 'integer',
        'message_id' => 'integer',
        'inline_message_id' => 'string',
    ];
}
