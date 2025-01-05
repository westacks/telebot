<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice [privacy mode](https://core.telegram.org/bots/features#privacy-mode). Not supported in channels and for messages sent on behalf of a Telegram Business account.  __Example:__ A [poll bot](https://t.me/PollBot) for groups runs in privacy mode (only receives commands, replies to its messages and mentions). There could be two ways to create a new poll:  - Explain the user how to send a command with parameters (e.g. /newpoll question answer1 answer2). May be appealing for hardcore users but lacks modern day polish. - Guide the user through a step-by-step process. 'Please send me your question', 'Cool, now let's add the first answer option', 'Great. Keep adding answer options, then send /done when you're ready'.  The last option is definitely more attractive. And if you use [ForceReply](https://core.telegram.org/bots/api#forcereply) in your bot's questions, it will receive the user's answers even if it only receives replies, commands and mentions - without any extra work for the user.
 *
 * @property bool   $force_reply             Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
 * @property string $input_field_placeholder Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters
 * @property bool   $selective               Optional. Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in the text of the [Message](https://core.telegram.org/bots/api#message) object; 2) if the bot's message is a reply to a message in the same chat and forum topic, sender of the original message.
 */
class ForceReply extends Keyboard
{
    protected $attributes = [
        'force_reply' => 'boolean',
        'input_field_placeholder' => 'string',
        'selective' => 'boolean',
    ];
}
