<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a menu button, which launches a Web App.
 * @property-read string $type Type of the button, must be web_app
 * @property-read string $text Text on the button
 * @property-read WebAppInfo $web_app Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Alternatively, a t.me link to a Web App of the bot can be specified in the object instead of the Web App's URL, in which case the Web App will be opened as if the user pressed the link.
 *
 * @see https://core.telegram.org/bots/api#menubuttonwebapp
 */
class MenuButtonWebApp extends MenuButton
{
    public function __construct(
        public readonly string $type,
        public readonly string $text,
        public readonly WebAppInfo $web_app,
    ) {
    }
}
