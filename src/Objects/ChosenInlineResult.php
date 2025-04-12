<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 * Note: It is necessary to enable inline feedback via @BotFather in order to receive these objects in updates.
 * @property-read string $result_id The unique identifier for the result that was chosen
 * @property-read User $from The user that chose the result
 * @property-read ?Location $location Optional. Sender location, only for bots that require user location
 * @property-read ?string $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
 * @property-read string $query The query that was used to obtain the result
 *
 * @see https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends TelegramObject
{
    public function __construct(
        public readonly string $result_id,
        public readonly User $from,
        public readonly ?Location $location,
        public readonly ?string $inline_message_id,
        public readonly string $query,
    ) {
    }
}
