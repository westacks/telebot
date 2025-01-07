<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @property string $poll_id    Unique poll identifier
 * @property Chat   $voter_chat Optional. The chat that changed the answer to the poll, if the voter is anonymous
 * @property User   $user       Optional. The user that changed the answer to the poll, if the voter isn't anonymous
 * @property int[]  $option_ids 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
 */
class PollAnswer extends TelegramObject
{
    protected $attributes = [
        'poll_id' => 'string',
        'voter_chat' => 'Chat',
        'user' => 'User',
        'option_ids' => 'integer[]',
    ];
}
