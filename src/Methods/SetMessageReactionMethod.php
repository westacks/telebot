<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ReactionType;

/**
 * Use this method to change the chosen reactions on a message. Service messages can't be reacted to. Automatically forwarded messages from a channel to its discussion group have the same available reactions as messages in the channel. Bots can't use paid reactions. Returns True on success.
 *
 * @property string         $chat_id    __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int            $message_id __Required: Yes__. Identifier of the target message. If the message belongs to a media group, the reaction is set to the first non-deleted message in the group instead.
 * @property ReactionType[] $reaction   __Required: Optional__. A JSON-serialized list of reaction types to set on the message. Currently, as non-premium users, bots can set up to one reaction per message. A custom emoji reaction can be used if it is either already present on the message or explicitly allowed by chat administrators. Paid reactions can't be used by bots.
 * @property bool           $is_big     __Required: Optional__. Pass True to set the reaction with a big animation
 */
class SetMessageReactionMethod extends TelegramMethod
{
    protected string $method = 'setMessageReaction';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_id' => 'integer',
        'reaction' => 'ReactionType[]',
        'is_big' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
