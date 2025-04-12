<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\LinkPreviewOptions;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send text messages. On success, the sent Message is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read string $text Text of the message to be sent, 1-4096 characters after entities parsing
 * @property-read ?string $parse_mode Mode for parsing entities in the message text. See formatting options for more details.
 * @property-read ?MessageEntity[] $entities A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 * @property-read ?LinkPreviewOptions $link_preview_options Link preview generation options for the message
 * @property-read ?bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent message from forwarding and saving
 * @property-read ?bool $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property-read ?string $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
 * @property-read ?ReplyParameters $reply_parameters Description of the message to reply to
 * @property-read null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 * @see https://core.telegram.org/bots/api#sendmessage
 */
class SendMessageMethod extends TelegramMethod
{
    protected string $method = 'sendMessage';
    protected array $expect = ['Message'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly string $text,
        public readonly ?string $parse_mode,
        public readonly ?array $entities,
        public readonly ?LinkPreviewOptions $link_preview_options,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?string $message_effect_id,
        public readonly ?ReplyParameters $reply_parameters,
        public readonly null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup,
    ) {
    }
}
