<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Message;

/**
 * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
 *
 * @property int    $user_id              __Required: Yes__. User identifier
 * @property int    $score                __Required: Yes__. New score, must be non-negative
 * @property bool   $force                __Required: Optional__. Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters
 * @property bool   $disable_edit_message __Required: Optional__. Pass True if the game message should not be automatically edited to include the current scoreboard
 * @property int    $chat_id              __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat
 * @property int    $message_id           __Required: Optional__. Required if inline_message_id is not specified. Identifier of the sent message
 * @property string $inline_message_id    __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 */
class SetGameScoreMethod extends TelegramMethod
{
    protected string $method = 'setGameScore';

    protected string $expect = 'Message|boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'score' => 'integer',
        'force' => 'boolean',
        'disable_edit_message' => 'boolean',
        'chat_id' => 'integer',
        'message_id' => 'integer',
        'inline_message_id' => 'string',
    ];

    public function mock($arguments)
    {
        if (isset($arguments['inline_message_id'])) {
            return true;
        }

        return new Message([
            'message_id' => rand(1, 100),
            'chat' => [
                'id' => rand(1, 100),
                'type' => 'private',
            ],
        ]);
    }
}
