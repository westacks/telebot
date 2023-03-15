<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a menu button, which launches a Web App.
 *
 * @property string     $type    Type of the button, must be _web_app_
 * @property string     $text    Text on the button
 * @property WebAppInfo $web_app Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
 */
class MenuButtonWebApp extends MenuButton
{
    protected $attributes = [
        'type' => 'string',
        'text' => 'string',
        'web_app' => 'WebAppInfo',
    ];
}
