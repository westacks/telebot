<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding the bot to the attachment menu or launching a Web App from a link.
 *
 * @property string $web_app_name Optional. Name of the Web App which was launched from a link
 */
class WriteAccessAllowed extends TelegramObject
{
    protected $attributes = [
        'web_app_name' => 'string',
    ];
}
