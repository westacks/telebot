<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Represents an invite link for a chat.
 *
 * @property string $invite_link                The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”.
 * @property User   $creator                    Creator of the link
 * @property bool   $creates_join_request       True, if users joining the chat via the link need to be approved by chat administrators
 * @property bool   $is_primary                 True, if the link is primary
 * @property bool   $is_revoked                 True, if the link is revoked
 * @property string $name                       Optional. Invite link name
 * @property int    $expire_date                Optional. Point in time (Unix timestamp) when the link will expire or has been expired
 * @property int    $member_limit               Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * @property int    $pending_join_request_count Optional. Number of pending join requests created using this link
 * @property int    $subscription_period        Optional. The number of seconds the subscription will be active for before the next payment
 * @property int    $subscription_price         Optional. The amount of Telegram Stars a user must pay initially and after each subsequent subscription period to be a member of the chat using the link
 */
class ChatInviteLink extends TelegramObject
{
    protected $attributes = [
        'invite_link' => 'string',
        'creator' => 'User',
        'creates_join_request' => 'boolean',
        'is_primary' => 'boolean',
        'is_revoked' => 'boolean',
        'name' => 'string',
        'expire_date' => 'integer',
        'member_limit' => 'integer',
        'pending_join_request_count' => 'integer',
        'subscription_period' => 'integer',
        'subscription_price' => 'integer',
    ];
}
