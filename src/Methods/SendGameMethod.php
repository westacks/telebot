<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send a game. On success, the sent Message is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
 * @property-read int $chat_id Unique identifier for the target chat. Games can't be sent to channel direct messages chats and channel chats.
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read string $game_short_name Short name of the game, serves as the unique identifier for the game. Set up your games via @BotFather.
 * @property-read ?bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent message from forwarding and saving
 * @property-read ?bool $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property-read ?string $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
 * @property-read ?ReplyParameters $reply_parameters Description of the message to reply to
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown. If not empty, the first button must launch the game.
 *
 * @see https://core.telegram.org/bots/api#sendgame
 */
class SendGameMethod extends TelegramMethod
{
    protected string $method = 'sendGame';
    protected array $expect = ['Message'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int $chat_id,
        public readonly ?int $message_thread_id,
        public readonly string $game_short_name,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?string $message_effect_id,
        public readonly ?ReplyParameters $reply_parameters,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
