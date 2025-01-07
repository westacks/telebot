<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputPollOption;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send a native poll. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string            $business_connection_id  __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * @property string            $chat_id                 __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int               $message_thread_id       __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string            $question                __Required: Yes__. Poll question, 1-300 characters
 * @property string            $question_parse_mode     __Required: Optional__. Mode for parsing entities in the question. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details. Currently, only custom emoji entities are allowed
 * @property MessageEntity[]   $question_entities       __Required: Optional__. A JSON-serialized list of special entities that appear in the poll question. It can be specified instead of question_parse_mode
 * @property InputPollOption[] $options                 __Required: Yes__. A JSON-serialized list of 2-10 answer options
 * @property bool              $is_anonymous            __Required: Optional__. True, if the poll needs to be anonymous, defaults to True
 * @property string            $type                    __Required: Optional__. Poll type, “quiz” or “regular”, defaults to “regular”
 * @property bool              $allows_multiple_answers __Required: Optional__. True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
 * @property int               $correct_option_id       __Required: Optional__. 0-based identifier of the correct answer option, required for polls in quiz mode
 * @property string            $explanation             __Required: Optional__. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
 * @property string            $explanation_parse_mode  __Required: Optional__. Mode for parsing entities in the explanation. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]   $explanation_entities    __Required: Optional__. A JSON-serialized list of special entities that appear in the poll explanation. It can be specified instead of explanation_parse_mode
 * @property int               $open_period             __Required: Optional__. Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
 * @property int               $close_date              __Required: Optional__. Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
 * @property bool              $is_closed               __Required: Optional__. Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
 * @property bool              $disable_notification    __Required: Optional__. Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool              $protect_content         __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property bool              $allow_paid_broadcast    __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property string            $message_effect_id       __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * @property ReplyParameters   $reply_parameters        __Required: Optional__. Description of the message to reply to
 * @property Keyboard          $reply_markup            __Required: Optional__. Additional interface options. A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards), [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove a reply keyboard or to force a reply from the user
 */
class SendPollMethod extends TelegramMethod
{
    protected string $method = 'sendPoll';

    protected string $expect = 'Message';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'question' => 'string',
        'question_parse_mode' => 'string',
        'question_entities' => 'MessageEntity[]',
        'options' => 'InputPollOption[]',
        'is_anonymous' => 'boolean',
        'type' => 'string',
        'allows_multiple_answers' => 'boolean',
        'correct_option_id' => 'integer',
        'explanation' => 'string',
        'explanation_parse_mode' => 'string',
        'explanation_entities' => 'MessageEntity[]',
        'open_period' => 'integer',
        'close_date' => 'integer',
        'is_closed' => 'boolean',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'allow_paid_broadcast' => 'boolean',
        'message_effect_id' => 'string',
        'reply_parameters' => 'ReplyParameters',
        'reply_markup' => 'Keyboard',
    ];

    public function mock($arguments)
    {
        return new Message([
            'message_id' => rand(1, 100),
            'date' => time(),
            'chat' => [
                'id' => $arguments['chat_id'],
                'type' => 'private',
            ],
            'poll' => [
                'id' => rand(1, 100),
                'question' => $arguments['question'],
                'options' => $arguments['options'],
                'is_anonymous' => $arguments['is_anonymous'] ?? true,
                'type' => $arguments['type'] ?? 'regular',
                'allows_multiple_answers' => $arguments['allows_multiple_answers'] ?? false,
                'correct_option_id' => $arguments['correct_option_id'] ?? null,
                'explanation' => $arguments['explanation'] ?? null,
                'explanation_parse_mode' => $arguments['explanation_parse_mode'] ?? null,
                'explanation_entities' => $arguments['explanation_entities'] ?? null,
                'open_period' => $arguments['open_period'] ?? null,
                'close_date' => $arguments['close_date'] ?? null,
                'is_closed' => $arguments['is_closed'] ?? false,
            ],
            'reply_markup' => $arguments['reply_markup'] ?? null,
        ]);
    }
}
