<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding the bot to the attachment menu or launching a Web App from a link.
 *
 * @property boolean $from_request Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method `requestWriteAccess`
 * @property string $web_app_name Optional. Name of the Web App which was launched from a link
 * @property boolean $from_attachment_menu Optional. True, if the access was granted when the bot was added to the attachment or side menu
 */
class WriteAccessAllowed extends TelegramObject
{
    protected $attributes = [
        'from_request' => 'boolean',
        'web_app_name' => 'string',
        'from_attachment_menu' => 'boolean',
    ];
}
