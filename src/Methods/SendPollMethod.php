<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Use this method to send a native poll. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string          $chat_id                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string          $question                    __Required: Yes__. Poll question, 1-300 characters
 * @property string[]        $options                     __Required: Yes__. A JSON-serialized list of answer options, 2-10 strings 1-100 characters each
 * @property bool            $is_anonymous                __Required: Optional__. True, if the poll needs to be anonymous, defaults to True
 * @property string          $type                        __Required: Optional__. Poll type, “quiz” or “regular”, defaults to “regular”
 * @property bool            $allows_multiple_answers     __Required: Optional__. True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
 * @property int             $correct_option_id           __Required: Optional__. 0-based identifier of the correct answer option, required for polls in quiz mode
 * @property string          $explanation                 __Required: Optional__. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
 * @property string          $explanation_parse_mode      __Required: Optional__. Mode for parsing entities in the explanation. See formatting options for more details.
 * @property MessageEntity[] $explanation_entities        __Required: Optional__. A JSON-serialized list of special entities that appear in the poll explanation, which can be specified instead of parse_mode
 * @property int             $open_period                 __Required: Optional__. Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
 * @property int             $close_date                  __Required: Optional__. Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
 * @property bool            $is_closed                   __Required: Optional__. Pass True, if the poll needs to be immediately closed. This can be useful for poll preview.
 * @property bool            $disable_notification        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool            $protect_content             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property int             $reply_to_message_id         __Required: Optional__. If the message is a reply, ID of the original message
 * @property bool            $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property Keyboard        $reply_markup                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendPollMethod extends TelegramMethod
{
    protected string $method = 'sendPoll';

    protected string $expect = 'Message';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'question' => 'string',
        'options' => 'string[]',
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
        'reply_to_message_id' => 'integer',
        'allow_sending_without_reply' => 'boolean',
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
