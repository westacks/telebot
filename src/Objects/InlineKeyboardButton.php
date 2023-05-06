<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 *
 * @property string                      $text                             Label text on the button
 * @property string                      $url                              Optional. HTTP or tg:// url to be opened when the button is pressed. Links tg://user?id= can be used to mention a user by their ID without using a username, if this is allowed by their privacy settings.
 * @property LoginUrl                    $login_url                        Optional. An HTTP URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
 * @property string                      $callback_data                    Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
 * @property WebAppInfo                  $web_app                          Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot.
 * @property string                      $switch_inline_query              Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. Can be empty, in which case just the bot's username will be inserted.Note: This offers an easy way for users to start using your bot in inline mode when they are currently in a private chat with it. Especially useful when combined with switch_pm… actions – in this case the user will be automatically returned to the chat they switched from, skipping the chat selection screen.
 * @property string                      $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. Can be empty, in which case only the bot's username will be inserted.This offers a quick way for the user to open your bot in inline mode in the same chat – good for selecting something from multiple options.
 * @property SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat  Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
 * @property CallbackGame                $callback_game                    Optional. Description of the game that will be launched when the user presses the button.NOTE: This type of button must always be the first button in the first row.
 * @property bool                        $pay                              Optional. Specify True, to send a Pay button.NOTE: This type of button must always be the first button in the first row and can only be used in invoice messages.
 */
class InlineKeyboardButton extends TelegramObject
{
    protected $attributes = [
        'text' => 'string',
        'url' => 'string',
        'login_url' => 'LoginUrl',
        'callback_data' => 'string',
        'web_app' => 'WebAppInfo',
        'switch_inline_query' => 'string',
        'switch_inline_query_current_chat' => 'string',
        'switch_inline_query_chosen_chat' => 'SwitchInlineQueryChosenChat',
        'callback_game' => 'CallbackGame',
        'pay' => 'boolean',
    ];
}
