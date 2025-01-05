<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents one button of an inline keyboard. Exactly one of the optional fields must be used to specify type of the button.
 *
 * @property string                      $text                             Label text on the button
 * @property string                      $url                              Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to mention a user by their identifier without using a username, if this is allowed by their privacy settings.
 * @property string                      $callback_data                    Optional. Data to be sent in a [callback query](https://core.telegram.org/bots/api#callbackquery) to the bot when the button is pressed, 1-64 bytes
 * @property WebAppInfo                  $web_app                          Optional. Description of the [Web App](https://core.telegram.org/bots/webapps) that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method [answerWebAppQuery](https://core.telegram.org/bots/api#answerwebappquery). Available only in private chats between a user and the bot. Not supported for messages sent on behalf of a Telegram Business account.
 * @property LoginUrl                    $login_url                        Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the [Telegram Login Widget](https://core.telegram.org/widgets/login).
 * @property string                      $switch_inline_query              Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted. Not supported for messages sent on behalf of a Telegram Business account.
 * @property string                      $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted.  This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting something from multiple options. Not supported in channels and for messages sent on behalf of a Telegram Business account.
 * @property SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat  Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field. Not supported for messages sent on behalf of a Telegram Business account.
 * @property CopyTextButton              $copy_text                        Optional. Description of the button that copies the specified text to the clipboard.
 * @property CallbackGame                $callback_game                    Optional. Description of the game that will be launched when the user presses the button.  __NOTE:__ This type of button __must__ always be the first button in the first row.
 * @property bool                        $pay                              Optional. Specify True, to send a [Pay button](https://core.telegram.org/bots/api#payments). Substrings “![⭐](https://telegram.org/img/emoji/40/E2AD90.png)” and “XTR” in the buttons's text will be replaced with a Telegram Star icon.  __NOTE:__ This type of button __must__ always be the first button in the first row and can only be used in invoice messages.
 */
class InlineKeyboardButton extends TelegramObject
{
    protected $attributes = [
        'text' => 'string',
        'url' => 'string',
        'callback_data' => 'string',
        'web_app' => 'WebAppInfo',
        'login_url' => 'LoginUrl',
        'switch_inline_query' => 'string',
        'switch_inline_query_current_chat' => 'string',
        'switch_inline_query_chosen_chat' => 'SwitchInlineQueryChosenChat',
        'copy_text' => 'CopyTextButton',
        'callback_game' => 'CallbackGame',
        'pay' => 'boolean',
    ];
}
