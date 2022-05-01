<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Contains information about a [Web App](https://core.telegram.org/bots/webapps).
 *
 * @property string $url An HTTPS URL of a Web App to be opened with additional data as specified in [Initializing Web Apps](https://core.telegram.org/bots/webapps#initializing-web-apps)
 */
class WebAppInfo extends TelegramObject
{
    protected $attributes = [
        'url' => 'string',
    ];
}
