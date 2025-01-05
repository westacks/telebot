<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes an inline message to be sent by a user of a Mini App.
 *
 * @property string $id              Unique identifier of the prepared message
 * @property int    $expiration_date Expiration date of the prepared message, in Unix time. Expired prepared messages can no longer be used
 */
class PreparedInlineMessage extends TelegramObject
{
    protected $attributes = [
        'id' => 'string',
        'expiration_date' => 'integer',
    ];
}
