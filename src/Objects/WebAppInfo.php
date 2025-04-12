<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a Web App.
 * @property-read string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
 *
 * @see https://core.telegram.org/bots/api#webappinfo
 */
class WebAppInfo extends TelegramObject
{
    public function __construct(
        public readonly string $url,
    ) {
    }
}
