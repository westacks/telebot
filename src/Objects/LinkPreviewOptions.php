<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes the options used for link preview generation.
 *
 * @property bool   $is_disabled        Optional. True, if the link preview is disabled
 * @property string $url                Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
 * @property bool   $prefer_small_media Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
 * @property bool   $prefer_large_media Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
 * @property bool   $show_above_text    Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be shown below the message text
 */
class LinkPreviewOptions extends TelegramObject
{
    protected $attributes = [
        'is_disabled' => 'boolean',
        'url' => 'string',
        'prefer_small_media' => 'boolean',
        'prefer_large_media' => 'boolean',
        'show_above_text' => 'boolean',
    ];
}
