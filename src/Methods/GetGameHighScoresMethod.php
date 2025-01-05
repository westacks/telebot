<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\GameHighScore;

/**
 * Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of [GameHighScore](https://core.telegram.org/bots/api#gamehighscore) objects.  This method will currently return scores for the target user, plus two of their closest neighbors on each side. Will also return the top three users if the user and their neighbors are not among them. Please note that this behavior is subject to change.
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
        'user_id' => 'integer',
        'chat_id' => 'integer',
        'message_id' => 'integer',
        'inline_message_id' => 'string',
    ];

    public function mock($arguments)
    {
        return [
            new GameHighScore([
                'user' => [
                    'id' => $arguments['user_id'],
                ],
                'score' => '2000',
                'position' => 1,
            ]),
            new GameHighScore([
                'user' => [
                    'id' => $arguments['user_id'],
                ],
                'score' => '1000',
                'position' => 2,
            ]),
        ];
    }
}
