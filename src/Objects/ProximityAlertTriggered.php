<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 * @property-read User $traveler User that triggered the alert
 * @property-read User $watcher User that set the alert
 * @property-read int $distance The distance between the users
 *
 * @see https://core.telegram.org/bots/api#proximityalerttriggered
 */
class ProximityAlertTriggered extends TelegramObject
{
    public function __construct(
        public readonly User $traveler,
        public readonly User $watcher,
        public readonly int $distance,
    ) {
    }
}
