<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the current status of a webhook.
 * @property-read string $url Webhook URL, may be empty if webhook is not set up
 * @property-read bool $has_custom_certificate True, if a custom certificate was provided for webhook certificate checks
 * @property-read int $pending_update_count Number of updates awaiting delivery
 * @property-read ?string $ip_address Optional. Currently used webhook IP address
 * @property-read ?int $last_error_date Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
 * @property-read ?string $last_error_message Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
 * @property-read ?int $last_synchronization_error_date Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
 * @property-read ?int $max_connections Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
 * @property-read ?string[] $allowed_updates Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
 *
 * @see https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfo extends TelegramObject
{
    public function __construct(
        public readonly string $url,
        public readonly bool $has_custom_certificate,
        public readonly int $pending_update_count,
        public readonly ?string $ip_address,
        public readonly ?int $last_error_date,
        public readonly ?string $last_error_message,
        public readonly ?int $last_synchronization_error_date,
        public readonly ?int $max_connections,
        public readonly ?array $allowed_updates,
    ) {
    }
}
