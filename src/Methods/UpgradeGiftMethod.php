<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Upgrades a given regular gift to a unique gift. Requires the can_transfer_and_upgrade_gifts business bot right. Additionally requires the can_transfer_stars business bot right if the upgrade is paid. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read string $owned_gift_id Unique identifier of the regular gift that should be upgraded to a unique one
 * @property-read ?bool $keep_original_details Pass True to keep the original gift text, sender and receiver in the upgraded gift
 * @property-read ?int $star_count The amount of Telegram Stars that will be paid for the upgrade from the business account balance. If gift.prepaid_upgrade_star_count > 0, then pass 0, otherwise, the can_transfer_stars business bot right is required and gift.upgrade_star_count must be passed.
 *
 * @see https://core.telegram.org/bots/api#upgradegift
 */
class UpgradeGiftMethod extends TelegramMethod
{
    protected string $method = 'upgradeGift';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly string $owned_gift_id,
        public readonly ?bool $keep_original_details,
        public readonly ?int $star_count,
    ) {
    }
}
