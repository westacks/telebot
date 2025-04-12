<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 *
 * @see https://core.telegram.org/bots/api#exportchatinvitelink
 */
class ExportChatInviteLinkMethod extends TelegramMethod
{
    protected string $method = 'exportChatInviteLink';
    protected array $expect = ['string'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
