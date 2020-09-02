<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * Contains information about the current status of a webhook.
 * 
 * @property String             $url                        Webhook URL, may be empty if webhook is not set up
 * @property Boolean            $has_custom_certificate     True, if a custom certificate was provided for webhook certificate checks
 * @property Integer            $pending_update_count       Number of updates awaiting delivery
 * @property Integer            $last_error_date            _Optional_. Unix time for the most recent error that happened when trying to deliver an update via webhook
 * @property String             $last_error_message         _Optional_. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
 * @property Integer            $max_connections            _Optional_. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
 * @property Array<String>      $allowed_updates            _Optional_. A list of update types the bot is subscribed to. Defaults to all update types
 * 
 * @package WeStacks\TeleBot\Objects
 */

class WebhookInfo extends TelegramObject
{
    protected function relations() {
        return [
            'url'                       => 'string',
            'has_custom_certificate'    => 'boolean',
            'pending_update_count'      => 'integer',
            'last_error_date'           => 'integer',
            'last_error_message'        => 'string',
            'max_connections'           => 'integer',
            'allowed_updates'           => array('string')
        ];
    }
}