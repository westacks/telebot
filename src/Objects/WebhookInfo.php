<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes the current status of a webhook.
 *
 * @property string   $url                             Webhook URL, may be empty if webhook is not set up
 * @property bool     $has_custom_certificate          True, if a custom certificate was provided for webhook certificate checks
 * @property int      $pending_update_count            Number of updates awaiting delivery
 * @property string   $ip_address                      Optional. Currently used webhook IP address
 * @property int      $last_error_date                 Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
 * @property string   $last_error_message              Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
 * @property int      $last_synchronization_error_date Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
 * @property int      $max_connections                 Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
 * @property string[] $allowed_updates                 Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
 */
class WebhookInfo extends TelegramObject
{
    protected $attributes = [
        'url' => 'string',
        'has_custom_certificate' => 'boolean',
        'pending_update_count' => 'integer',
        'ip_address' => 'string',
        'last_error_date' => 'integer',
        'last_error_message' => 'string',
        'last_synchronization_error_date' => 'integer',
        'max_connections' => 'integer',
        'allowed_updates' => 'string[]',
    ];
}
