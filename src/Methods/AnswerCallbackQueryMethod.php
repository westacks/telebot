<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
 *
 * @property-read string $callback_query_id Unique identifier for the query to be answered
 * @property-read ?string $text Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
 * @property-read ?bool $show_alert If True, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to false.
 * @property-read ?string $url URL that will be opened by the user's client. If you have created a Game and accepted the conditions via @BotFather, specify the URL that opens your game - note that this will only work if the query comes from a callback_game button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
 * @property-read ?int $cache_time The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
 *
 * @see https://core.telegram.org/bots/api#answercallbackquery
 */
class AnswerCallbackQueryMethod extends TelegramMethod
{
    protected string $method = 'answerCallbackQuery';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $callback_query_id,
        public readonly ?string $text,
        public readonly ?bool $show_alert,
        public readonly ?string $url,
        public readonly ?int $cache_time,
    ) {
    }
}
