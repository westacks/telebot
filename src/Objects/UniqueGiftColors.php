<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about the color scheme for a user's name, message replies and link previews based on a unique gift.
 * @property-read string $model_custom_emoji_id Custom emoji identifier of the unique gift's model
 * @property-read string $symbol_custom_emoji_id Custom emoji identifier of the unique gift's symbol
 * @property-read int $light_theme_main_color Main color used in light themes; RGB format
 * @property-read int[] $light_theme_other_colors List of 1-3 additional colors used in light themes; RGB format
 * @property-read int $dark_theme_main_color Main color used in dark themes; RGB format
 * @property-read int[] $dark_theme_other_colors List of 1-3 additional colors used in dark themes; RGB format
 *
 * @see https://core.telegram.org/bots/api#uniquegiftcolors
 */
class UniqueGiftColors extends TelegramObject
{
    public function __construct(
        public readonly string $model_custom_emoji_id,
        public readonly string $symbol_custom_emoji_id,
        public readonly int $light_theme_main_color,
        public readonly array $light_theme_other_colors,
        public readonly int $dark_theme_main_color,
        public readonly array $dark_theme_other_colors,
    ) {
    }
}
