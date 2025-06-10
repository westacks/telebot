<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\InputPollOption;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send a native poll. On success, the sent Message is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read string $question Poll question, 1-300 characters
 * @property-read ?string $question_parse_mode Mode for parsing entities in the question. See formatting options for more details. Currently, only custom emoji entities are allowed
 * @property-read ?MessageEntity[] $question_entities A JSON-serialized list of special entities that appear in the poll question. It can be specified instead of question_parse_mode
 * @property-read InputPollOption[] $options A JSON-serialized list of 2-10 answer options
 * @property-read ?bool $is_anonymous True, if the poll needs to be anonymous, defaults to True
 * @property-read ?string $type Poll type, “quiz” or “regular”, defaults to “regular”
 * @property-read ?bool $allows_multiple_answers True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
 * @property-read ?int $correct_option_id 0-based identifier of the correct answer option, required for polls in quiz mode
 * @property-read ?string $explanation Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
 * @property-read ?string $explanation_parse_mode Mode for parsing entities in the explanation. See formatting options for more details.
 * @property-read ?MessageEntity[] $explanation_entities A JSON-serialized list of special entities that appear in the poll explanation. It can be specified instead of explanation_parse_mode
 * @property-read ?int $open_period Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
 * @property-read ?int $close_date Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
 * @property-read ?bool $is_closed Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
 * @property-read ?bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent message from forwarding and saving
 * @property-read ?bool $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property-read ?string $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
 * @property-read ?ReplyParameters $reply_parameters Description of the message to reply to
 * @property-read null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 * @see https://core.telegram.org/bots/api#sendpoll
 */
class SendPollMethod extends TelegramMethod
{
    protected string $method = 'sendPoll';
    protected array $expect = ['Message'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly string $question,
        public readonly ?string $question_parse_mode,
        public readonly ?array $question_entities,
        public readonly array $options,
        public readonly ?bool $is_anonymous,
        public readonly ?string $type,
        public readonly ?bool $allows_multiple_answers,
        public readonly ?int $correct_option_id,
        public readonly ?string $explanation,
        public readonly ?string $explanation_parse_mode,
        public readonly ?array $explanation_entities,
        public readonly ?int $open_period,
        public readonly ?int $close_date,
        public readonly ?bool $is_closed,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?string $message_effect_id,
        public readonly ?ReplyParameters $reply_parameters,
        public readonly null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup,
    ) {
    }
}
