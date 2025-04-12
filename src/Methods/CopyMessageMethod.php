<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read int|string $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * @property-read int $message_id Message identifier in the chat specified in from_chat_id
 * @property-read ?int $video_start_timestamp New start timestamp for the copied video in the message
 * @property-read ?string $caption New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept
 * @property-read ?string $parse_mode Mode for parsing entities in the new caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Pass True, if the caption must be shown above the message media. Ignored if a new caption isn't specified.
 * @property-read ?bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent message from forwarding and saving
 * @property-read ?bool $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property-read ?ReplyParameters $reply_parameters Description of the message to reply to
 * @property-read null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 * @see https://core.telegram.org/bots/api#copymessage
 */
class CopyMessageMethod extends TelegramMethod
{
    protected string $method = 'copyMessage';
    protected array $expect = ['MessageId'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly int|string $from_chat_id,
        public readonly int $message_id,
        public readonly ?int $video_start_timestamp,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?ReplyParameters $reply_parameters,
        public readonly null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup,
    ) {
    }
}
