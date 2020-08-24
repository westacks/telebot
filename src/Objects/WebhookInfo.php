<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Contains information about the current status of a webhook.
 * 
 * @property String	            $url                        Webhook URL, may be empty if webhook is not set up
 * @property Boolean	        $has_custom_certificate     True, if a custom certificate was provided for webhook certificate checks
 * @property Integer	        $pending_update_count       Number of updates awaiting delivery
 * @property Integer	        $last_error_date            `Optional` Unix time for the most recent error that happened when trying to deliver an update via webhook
 * @property String	            $last_error_message         `Optional` Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
 * @property Integer            $max_connections            `Optional` Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
 * @property Array<String>	    $allowed_updates            `Optional` A list of update types the bot is subscribed to. Defaults to all update types
 * @package WeStacks\TeleBot\Objects
 */
class WebhookInfo extends TelegramObject
{
    protected function propertiesMap() {
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