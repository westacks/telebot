<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about one answer option in a poll.
 * @property-read string $persistent_id Unique identifier of the option, persistent on option addition and deletion
 * @property-read string $text Option text, 1-100 characters
 * @property-read ?MessageEntity[] $text_entities Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
 * @property-read ?PollMedia $media Optional. Media added to the poll option
 * @property-read int $voter_count Number of users who voted for this option; may be 0 if unknown
 * @property-read ?User $added_by_user Optional. User who added the option; omitted if the option wasn't added by a user after poll creation
 * @property-read ?Chat $added_by_chat Optional. Chat that added the option; omitted if the option wasn't added by a chat after poll creation
 * @property-read ?int $addition_date Optional. Point in time (Unix timestamp) when the option was added; omitted if the option existed in the original poll
 *
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOption extends TelegramObject
{
    public function __construct(
        public readonly string $persistent_id,
        public readonly string $text,
        public readonly ?array $text_entities,
        public readonly ?PollMedia $media,
        public readonly int $voter_count,
        public readonly ?User $added_by_user,
        public readonly ?Chat $added_by_chat,
        public readonly ?int $addition_date,
    ) {
    }
}
