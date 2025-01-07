<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is a .PNG or .TGV (gzipped subset of SVG with MIME type “application/x-tgwallpattern”) pattern to be combined with the background fill chosen by the user.
 *
 * @property string                                                                    $type        Type of the background, always “pattern”
 * @property Document                                                                  $document    Document with the pattern
 * @property BackgroundFillFreeformGradient|BackgroundFillGradient|BackgroundFillSolid $fill        The background fill that is combined with the pattern
 * @property int                                                                       $intensity   Intensity of the pattern when it is shown above the filled background; 0-100
 * @property bool                                                                      $is_inverted Optional. True, if the background fill must be applied only to the pattern itself. All other pixels are black in this case. For dark themes only
 * @property bool                                                                      $is_moving   Optional. True, if the background moves slightly when the device is tilted
 */
class BackgroundTypePattern extends BackgroundType
{
    protected $attributes = [
        'type' => 'string',
        'document' => 'Document',
        'fill' => 'BackgroundFill',
        'intensity' => 'integer',
        'is_inverted' => 'boolean',
        'is_moving' => 'boolean',
    ];
}
