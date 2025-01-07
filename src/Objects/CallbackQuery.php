<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents an incoming callback query from a callback button in an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards). If the button that originated the query was attached to a message sent by the bot, the field message will be present. If the button was attached to a message sent via the bot (in [inline mode](https://core.telegram.org/bots/api#inline-mode)), the field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.  __NOTE:__ After the user presses a callback button, Telegram clients will display a progress bar until you call [answerCallbackQuery](https://core.telegram.org/bots/api#answercallbackquery). It is, therefore, necessary to react by calling [answerCallbackQuery](https://core.telegram.org/bots/api#answercallbackquery) even if no notification to the user is needed (e.g., without specifying any of the optional parameters).
 *
 * @property string                      $id                Unique identifier for this query
 * @property User                        $from              Sender
 * @property InaccessibleMessage|Message $message           Optional. Message sent by the bot with the callback button that originated the query
 * @property string                      $inline_message_id Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
 * @property string                      $chat_instance     Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in [games](https://core.telegram.org/bots/api#games).
 * @property string                      $data              Optional. Data associated with the callback button. Be aware that the message originated the query can contain no callback buttons with this data.
 * @property string                      $game_short_name   Optional. Short name of a [Game](https://core.telegram.org/bots/api#games) to be returned, serves as the unique identifier for the game
 */
class CallbackQuery extends TelegramObject
{
    protected $attributes = [
        'id' => 'string',
        'from' => 'User',
        'message' => 'MaybeInaccessibleMessage',
        'inline_message_id' => 'string',
        'chat_instance' => 'string',
        'data' => 'string',
        'game_short_name' => 'string',
    ];
}
