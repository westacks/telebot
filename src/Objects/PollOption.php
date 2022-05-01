<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains information about one answer option in a poll.
 *
 * @property string $text        Option text, 1-100 characters
 * @property int    $voter_count Number of users that voted for this option
 */
class PollOption extends TelegramObject
{
    protected $attributes = [
        'text' => 'string',
        'voter_count' => 'integer',
    ];
}
