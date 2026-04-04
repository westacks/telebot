<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about a poll.
 * @property-read string $id Unique poll identifier
 * @property-read string $question Poll question, 1-300 characters
 * @property-read ?MessageEntity[] $question_entities Optional. Special entities that appear in the question. Currently, only custom emoji entities are allowed in poll questions
 * @property-read PollOption[] $options List of poll options
 * @property-read int $total_voter_count Total number of users that voted in the poll
 * @property-read bool $is_closed True, if the poll is closed
 * @property-read bool $is_anonymous True, if the poll is anonymous
 * @property-read string $type Poll type, currently can be “regular” or “quiz”
 * @property-read bool $allows_multiple_answers True, if the poll allows multiple answers
 * @property-read bool $allows_revoting True, if the poll allows to change the chosen answer options
 * @property-read ?int[] $correct_option_ids Optional. Array of 0-based identifiers of the correct answer options. Available only for polls in quiz mode which are closed or were sent (not forwarded) by the bot or to the private chat with the bot.
 * @property-read ?string $explanation Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
 * @property-read ?MessageEntity[] $explanation_entities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
 * @property-read ?int $open_period Optional. Amount of time in seconds the poll will be active after creation
 * @property-read ?int $close_date Optional. Point in time (Unix timestamp) when the poll will be automatically closed
 * @property-read ?string $description Optional. Description of the poll; for polls inside the Message object only
 * @property-read ?MessageEntity[] $description_entities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the description
 *
 * @see https://core.telegram.org/bots/api#poll
 */
class Poll extends TelegramObject
{
    public ?int $correct_option_id;

    public function __construct(
        public readonly string $id,
        public readonly string $question,
        public readonly ?array $question_entities,
        public readonly array $options,
        public readonly int $total_voter_count,
        public readonly bool $is_closed,
        public readonly bool $is_anonymous,
        public readonly string $type,
        public readonly bool $allows_multiple_answers,
        public readonly bool $allows_revoting,
        public readonly ?array $correct_option_ids,
        public readonly ?string $explanation,
        public readonly ?array $explanation_entities,
        public readonly ?int $open_period,
        public readonly ?int $close_date,
        public readonly ?string $description,
        public readonly ?array $description_entities,
    ) {
    }
}
