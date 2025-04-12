<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the options used for link preview generation.
 * @property-read ?bool $is_disabled Optional. True, if the link preview is disabled
 * @property-read ?string $url Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
 * @property-read ?bool $prefer_small_media Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
 * @property-read ?bool $prefer_large_media Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
 * @property-read ?bool $show_above_text Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be shown below the message text
 *
 * @see https://core.telegram.org/bots/api#linkpreviewoptions
 */
class LinkPreviewOptions extends TelegramObject
{
    public function __construct(
        public readonly ?bool $is_disabled,
        public readonly ?string $url,
        public readonly ?bool $prefer_small_media,
        public readonly ?bool $prefer_large_media,
        public readonly ?bool $show_above_text,
    ) {
    }
}
