<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Contains information about an inline message sent by a [Web App](https://core.telegram.org/bots/webapps) on behalf of a user.
 *
 * @property string $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message.
 */
class SentWebAppMessage extends TelegramObject
{
    protected $attributes = [
        'inline_message_id' => 'string',
    ];
}
