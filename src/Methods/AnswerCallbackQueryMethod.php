<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to send answers to callback queries sent from [inline keyboards](https://core.telegram.org/bots/features#inline-keyboards). The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.  Alternatively, the user can be redirected to the specified Game URL. For this option to work, you must first create a game for your bot via [@BotFather](https://t.me/botfather) and accept the terms. Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
 *
 * @property string $callback_query_id __Required: Yes__. Unique identifier for the query to be answered
 * @property string $text              __Required: Optional__. Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
 * @property bool   $show_alert        __Required: Optional__. If True, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to false.
 * @property string $url               __Required: Optional__. URL that will be opened by the user's client. If you have created a [Game](https://core.telegram.org/bots/api#game) and accepted the conditions via [@BotFather](https://t.me/botfather), specify the URL that opens your game - note that this will only work if the query comes from a [callback_game](https://core.telegram.org/bots/api#inlinekeyboardbutton) button.  Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
 * @property int    $cache_time        __Required: Optional__. The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
 */
class AnswerCallbackQueryMethod extends TelegramMethod
{
    protected string $method = 'answerCallbackQuery';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'callback_query_id' => 'string',
        'text' => 'string',
        'show_alert' => 'boolean',
        'url' => 'string',
        'cache_time' => 'integer',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
