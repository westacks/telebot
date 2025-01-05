<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding it to the attachment menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method [requestWriteAccess](https://core.telegram.org/bots/webapps#initializing-mini-apps).
 *
 * @property bool   $from_request         Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method [requestWriteAccess](https://core.telegram.org/bots/webapps#initializing-mini-apps)
 * @property string $web_app_name         Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
 * @property bool   $from_attachment_menu Optional. True, if the access was granted when the bot was added to the attachment or side menu
 */
class WriteAccessAllowed extends TelegramObject
{
    protected $attributes = [
        'from_request' => 'boolean',
        'web_app_name' => 'string',
        'from_attachment_menu' => 'boolean',
    ];
}
