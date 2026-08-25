<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a block in a rich formatted message. Currently, it can be any of the following types:
 * - [RichBlockParagraph](https://core.telegram.org/bots/api#richblockparagraph)
 * - [RichBlockSectionHeading](https://core.telegram.org/bots/api#richblocksectionheading)
 * - [RichBlockPreformatted](https://core.telegram.org/bots/api#richblockpreformatted)
 * - [RichBlockFooter](https://core.telegram.org/bots/api#richblockfooter)
 * - [RichBlockDivider](https://core.telegram.org/bots/api#richblockdivider)
 * - [RichBlockMathematicalExpression](https://core.telegram.org/bots/api#richblockmathematicalexpression)
 * - [RichBlockAnchor](https://core.telegram.org/bots/api#richblockanchor)
 * - [RichBlockList](https://core.telegram.org/bots/api#richblocklist)
 * - [RichBlockBlockQuotation](https://core.telegram.org/bots/api#richblockblockquotation)
 * - [RichBlockExpandableBlockQuotation](https://core.telegram.org/bots/api#richblockexpandableblockquotation)
 * - [RichBlockPullQuotation](https://core.telegram.org/bots/api#richblockpullquotation)
 * - [RichBlockCollage](https://core.telegram.org/bots/api#richblockcollage)
 * - [RichBlockSlideshow](https://core.telegram.org/bots/api#richblockslideshow)
 * - [RichBlockTable](https://core.telegram.org/bots/api#richblocktable)
 * - [RichBlockDetails](https://core.telegram.org/bots/api#richblockdetails)
 * - [RichBlockMap](https://core.telegram.org/bots/api#richblockmap)
 * - [RichBlockButtons](https://core.telegram.org/bots/api#richblockbuttons)
 * - [RichBlockAnimation](https://core.telegram.org/bots/api#richblockanimation)
 * - [RichBlockAudio](https://core.telegram.org/bots/api#richblockaudio)
 * - [RichBlockDocument](https://core.telegram.org/bots/api#richblockdocument)
 * - [RichBlockPhoto](https://core.telegram.org/bots/api#richblockphoto)
 * - [RichBlockVideo](https://core.telegram.org/bots/api#richblockvideo)
 * - [RichBlockVoiceNote](https://core.telegram.org/bots/api#richblockvoicenote)
 * - [RichBlockThinking](https://core.telegram.org/bots/api#richblockthinking)
 *
 * @see https://core.telegram.org/bots/api#richblock
 */
abstract class RichBlock extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'paragraph' => RichBlockParagraph::class,
            'heading' => RichBlockSectionHeading::class,
            'pre' => RichBlockPreformatted::class,
            'footer' => RichBlockFooter::class,
            'divider' => RichBlockDivider::class,
            'mathematical_expression' => RichBlockMathematicalExpression::class,
            'anchor' => RichBlockAnchor::class,
            'list' => RichBlockList::class,
            'blockquote' => RichBlockBlockQuotation::class,
            'expandable_blockquote' => RichBlockExpandableBlockQuotation::class,
            'pullquote' => RichBlockPullQuotation::class,
            'collage' => RichBlockCollage::class,
            'slideshow' => RichBlockSlideshow::class,
            'table' => RichBlockTable::class,
            'details' => RichBlockDetails::class,
            'map' => RichBlockMap::class,
            'buttons' => RichBlockButtons::class,
            'animation' => RichBlockAnimation::class,
            'audio' => RichBlockAudio::class,
            'document' => RichBlockDocument::class,
            'photo' => RichBlockPhoto::class,
            'video' => RichBlockVideo::class,
            'voice_note' => RichBlockVoiceNote::class,
            'thinking' => RichBlockThinking::class,
            default => throw new \InvalidArgumentException("Unknown RichBlock: ".$parameters['type']),
        };
    }
}
