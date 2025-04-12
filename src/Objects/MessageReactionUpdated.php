<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a change of a reaction on a message performed by a user.
 * @property-read Chat $chat The chat containing the message the user reacted to
 * @property-read int $message_id Unique identifier of the message inside the chat
 * @property-read ?User $user Optional. The user that changed the reaction, if the user isn't anonymous
 * @property-read ?Chat $actor_chat Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
 * @property-read int $date Date of the change in Unix time
 * @property-read ReactionType[] $old_reaction Previous list of reaction types that were set by the user
 * @property-read ReactionType[] $new_reaction New list of reaction types that have been set by the user
 *
 * @see https://core.telegram.org/bots/api#messagereactionupdated
 */
class MessageReactionUpdated extends TelegramObject
{
    public function __construct(
        public readonly Chat $chat,
        public readonly int $message_id,
        public readonly ?User $user,
        public readonly ?Chat $actor_chat,
        public readonly int $date,
        public readonly array $old_reaction,
        public readonly array $new_reaction,
    ) {
    }
}
