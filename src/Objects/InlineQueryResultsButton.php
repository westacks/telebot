<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents a button to be shown above inline query results. You __must__ use exactly one of the optional fields.
 *
 * @property string     $text            Label text on the button
 * @property WebAppInfo $web_app         Optional. Description of the [Web App](https://core.telegram.org/bots/webapps) that will be launched when the user presses the button. The Web App will be able to switch back to the inline mode using the method [switchInlineQuery](https://core.telegram.org/bots/webapps#initializing-mini-apps) inside the Web App.
 * @property string     $start_parameter Optional. [Deep-linking](https://core.telegram.org/bots/features#deep-linking) parameter for the /start message sent to the bot when a user presses the button. 1-64 characters, only A-Z, a-z, 0-9, _ and - are allowed.  Example: An inline bot that sends YouTube videos can ask the user to connect the bot to their YouTube account to adapt search results accordingly. To do this, it displays a 'Connect your YouTube account' button above the results, or even before showing any. The user presses the button, switches to a private chat with the bot and, in doing so, passes a start parameter that instructs the bot to return an OAuth link. Once done, the bot can offer a [switch_inline](https://core.telegram.org/bots/api#inlinekeyboardmarkup) button so that the user can easily return to the chat where they wanted to use the bot's inline capabilities.
 */
class InlineQueryResultsButton extends InlineQueryResult
{
    protected $attributes = [
        'text' => 'string',
        'web_app' => 'WebAppInfo',
        'start_parameter' => 'string',
    ];
}
