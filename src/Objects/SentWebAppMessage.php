<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes an inline message sent by a [Web App](https://core.telegram.org/bots/webapps) on behalf of a user.
 *
 * @property string $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an [inline keyboard](https://core.telegram.org/bots/api#inlinekeyboardmarkup) attached to the message.
 */
class SentWebAppMessage extends TelegramObject
{
    protected $attributes = [
        'inline_message_id' => 'string',
    ];
}
