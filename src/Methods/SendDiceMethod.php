<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read ?string $emoji Emoji on which the dice throw animation is based. Currently, must be one of “”, “”, “”, “”, “”, or “”. Dice can have values 1-6 for “”, “” and “”, values 1-5 for “” and “”, and values 1-64 for “”. Defaults to “”
 * @property-read ?bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent message from forwarding
 * @property-read ?bool $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property-read ?string $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
 * @property-read ?ReplyParameters $reply_parameters Description of the message to reply to
 * @property-read null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 * @see https://core.telegram.org/bots/api#senddice
 */
class SendDiceMethod extends TelegramMethod
{
    protected string $method = 'sendDice';
    protected array $expect = ['Message'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly ?string $emoji,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?string $message_effect_id,
        public readonly ?ReplyParameters $reply_parameters,
        public readonly null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup,
    ) {
    }
}
