<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 * 
 * @property String            $poll_id         Unique poll identifier
 * @property User              $user            The user, who changed the answer to the poll
 * @property Array<Integer>    $option_ids      0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
 * 
 * @package WeStacks\TeleBot\TelegramObject
 */

class PollAnswer extends TelegramObject
{
    protected function relations()
    {
        return [
            'poll_id'       => 'string',
            'user'          => User::class,
            'option_ids'    => array('integer')
        ];
    }
}