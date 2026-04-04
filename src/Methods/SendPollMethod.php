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
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername). Polls can't be sent to channel direct messages chats.
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of a forum; for forum supergroups and private chats of bots with forum topic mode enabled only
 * @property-read string $question Poll question, 1-300 characters
 * @property-read ?string $question_parse_mode Mode for parsing entities in the question. See formatting options for more details. Currently, only custom emoji entities are allowed
 * @property-read ?MessageEntity[] $question_entities A JSON-serialized list of special entities that appear in the poll question. It can be specified instead of question_parse_mode
 * @property-read InputPollOption[] $options A JSON-serialized list of 2-12 answer options
 * @property-read ?bool $is_anonymous True, if the poll needs to be anonymous, defaults to True
 * @property-read ?string $type Poll type, “quiz” or “regular”, defaults to “regular”
 * @property-read ?bool $allows_multiple_answers Pass True, if the poll allows multiple answers, defaults to False
 * @property-read ?bool $allows_revoting Pass True, if the poll allows to change chosen answer options, defaults to False for quizzes and to True for regular polls
 * @property-read ?bool $shuffle_options Pass True, if the poll options must be shown in random order
 * @property-read ?bool $allow_adding_options Pass True, if answer options can be added to the poll after creation; not supported for anonymous polls and quizzes
 * @property-read ?bool $hide_results_until_closes Pass True, if poll results must be shown only after the poll closes
 * @property-read ?int[] $correct_option_ids A JSON-serialized list of monotonically increasing 0-based identifiers of the correct answer options, required for polls in quiz mode
 * @property-read ?string $explanation Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
 * @property-read ?string $explanation_parse_mode Mode for parsing entities in the explanation. See formatting options for more details.
 * @property-read ?MessageEntity[] $explanation_entities A JSON-serialized list of special entities that appear in the poll explanation. It can be specified instead of explanation_parse_mode
 * @property-read ?int $open_period Amount of time in seconds the poll will be active after creation, 5-2628000. Can't be used together with close_date.
 * @property-read ?int $close_date Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 2628000 seconds in the future. Can't be used together with open_period.
 * @property-read ?bool $is_closed Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
 * @property-read ?string $description Description of the poll to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $description_parse_mode Mode for parsing entities in the poll description. See formatting options for more details.
 * @property-read ?MessageEntity[] $description_entities A JSON-serialized list of special entities that appear in the poll description, which can be specified instead of description_parse_mode
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
        public readonly ?bool $allows_revoting,
        public readonly ?bool $shuffle_options,
        public readonly ?bool $allow_adding_options,
        public readonly ?bool $hide_results_until_closes,
        public readonly ?array $correct_option_ids,
        public readonly ?string $explanation,
        public readonly ?string $explanation_parse_mode,
        public readonly ?array $explanation_entities,
        public readonly ?int $open_period,
        public readonly ?int $close_date,
        public readonly ?bool $is_closed,
        public readonly ?string $description,
        public readonly ?string $description_parse_mode,
        public readonly ?array $description_entities,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?string $message_effect_id,
        public readonly ?ReplyParameters $reply_parameters,
        public readonly null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup,
    ) {
    }
}
