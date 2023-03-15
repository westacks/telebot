<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice [privacy mode](/bots#privacy-mode).
 *
 * @property bool   $force_reply             Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
 * @property string $input_field_placeholder Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters
 * @property bool   $selective               Optional. Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
 */
class ForceReply extends Keyboard
{
    protected $attributes = [
        'force_reply' => 'boolean',
        'input_field_placeholder' => 'string',
        'selective' => 'boolean',
    ];
}
