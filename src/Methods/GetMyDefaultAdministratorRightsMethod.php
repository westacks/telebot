<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatAdministratorRights;

/**
 * Use this method to get the current default administrator rights of the bot. Returns [ChatAdministratorRights](https://core.telegram.org/bots/api#chatadministratorrights) on success.
 *
 * @property bool $for_channels __Required: Optional__. Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
 */
class GetMyDefaultAdministratorRightsMethod extends TelegramMethod
{
    protected string $method = 'getMyDefaultAdministratorRights';

    protected string $expect = 'ChatAdministratorRights';

    protected array $parameters = [
        'for_channels' => 'boolean',
    ];

    public function mock($arguments)
    {
        return new ChatAdministratorRights([
            'can_change_info' => true,
            'can_post_messages' => true,
            'can_edit_messages' => true,
            'can_delete_messages' => true,
            'can_invite_users' => true,
            'can_restrict_members' => true,
            'can_pin_messages' => true,
            'can_promote_members' => true,
            'can_send_messages' => true,
            'can_send_media_messages' => true,
            'can_send_other_messages' => true,
            'can_add_web_page_previews' => true,
        ]);
    }
}
