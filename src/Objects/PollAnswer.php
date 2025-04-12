<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 * @property-read string $poll_id Unique poll identifier
 * @property-read ?Chat $voter_chat Optional. The chat that changed the answer to the poll, if the voter is anonymous
 * @property-read ?User $user Optional. The user that changed the answer to the poll, if the voter isn't anonymous
 * @property-read int[] $option_ids 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
 *
 * @see https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswer extends TelegramObject
{
    public function __construct(
        public readonly string $poll_id,
        public readonly ?Chat $voter_chat,
        public readonly ?User $user,
        public readonly array $option_ids,
    ) {
    }
}
