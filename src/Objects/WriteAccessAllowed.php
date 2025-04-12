<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding it to the attachment menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess.
 * @property-read ?bool $from_request Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method requestWriteAccess
 * @property-read ?string $web_app_name Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
 * @property-read ?bool $from_attachment_menu Optional. True, if the access was granted when the bot was added to the attachment or side menu
 *
 * @see https://core.telegram.org/bots/api#writeaccessallowed
 */
class WriteAccessAllowed extends TelegramObject
{
    public function __construct(
        public readonly ?bool $from_request,
        public readonly ?string $web_app_name,
        public readonly ?bool $from_attachment_menu,
    ) {
    }
}
