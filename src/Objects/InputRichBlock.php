<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a block in a rich formatted message to be sent. Currently, it can be any of the following types:
 * - [InputRichBlockParagraph](https://core.telegram.org/bots/api#inputrichblockparagraph)
 * - [InputRichBlockSectionHeading](https://core.telegram.org/bots/api#inputrichblocksectionheading)
 * - [InputRichBlockPreformatted](https://core.telegram.org/bots/api#inputrichblockpreformatted)
 * - [InputRichBlockFooter](https://core.telegram.org/bots/api#inputrichblockfooter)
 * - [InputRichBlockDivider](https://core.telegram.org/bots/api#inputrichblockdivider)
 * - [InputRichBlockMathematicalExpression](https://core.telegram.org/bots/api#inputrichblockmathematicalexpression)
 * - [InputRichBlockAnchor](https://core.telegram.org/bots/api#inputrichblockanchor)
 * - [InputRichBlockList](https://core.telegram.org/bots/api#inputrichblocklist)
 * - [InputRichBlockBlockQuotation](https://core.telegram.org/bots/api#inputrichblockblockquotation)
 * - [InputRichBlockPullQuotation](https://core.telegram.org/bots/api#inputrichblockpullquotation)
 * - [InputRichBlockCollage](https://core.telegram.org/bots/api#inputrichblockcollage)
 * - [InputRichBlockSlideshow](https://core.telegram.org/bots/api#inputrichblockslideshow)
 * - [InputRichBlockTable](https://core.telegram.org/bots/api#inputrichblocktable)
 * - [InputRichBlockDetails](https://core.telegram.org/bots/api#inputrichblockdetails)
 * - [InputRichBlockMap](https://core.telegram.org/bots/api#inputrichblockmap)
 * - [InputRichBlockAnimation](https://core.telegram.org/bots/api#inputrichblockanimation)
 * - [InputRichBlockAudio](https://core.telegram.org/bots/api#inputrichblockaudio)
 * - [InputRichBlockPhoto](https://core.telegram.org/bots/api#inputrichblockphoto)
 * - [InputRichBlockVideo](https://core.telegram.org/bots/api#inputrichblockvideo)
 * - [InputRichBlockVoiceNote](https://core.telegram.org/bots/api#inputrichblockvoicenote)
 * - [InputRichBlockThinking](https://core.telegram.org/bots/api#inputrichblockthinking)
 *
 * @see https://core.telegram.org/bots/api#inputrichblock
 */
abstract class InputRichBlock extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'paragraph' => InputRichBlockParagraph::class,
            'heading' => InputRichBlockSectionHeading::class,
            'pre' => InputRichBlockPreformatted::class,
            'footer' => InputRichBlockFooter::class,
            'divider' => InputRichBlockDivider::class,
            'mathematical_expression' => InputRichBlockMathematicalExpression::class,
            'anchor' => InputRichBlockAnchor::class,
            'list' => InputRichBlockList::class,
            'blockquote' => InputRichBlockBlockQuotation::class,
            'pullquote' => InputRichBlockPullQuotation::class,
            'collage' => InputRichBlockCollage::class,
            'slideshow' => InputRichBlockSlideshow::class,
            'table' => InputRichBlockTable::class,
            'details' => InputRichBlockDetails::class,
            'map' => InputRichBlockMap::class,
            'animation' => InputRichBlockAnimation::class,
            'audio' => InputRichBlockAudio::class,
            'photo' => InputRichBlockPhoto::class,
            'video' => InputRichBlockVideo::class,
            'voice_note' => InputRichBlockVoiceNote::class,
            'thinking' => InputRichBlockThinking::class,
            default => throw new \InvalidArgumentException("Unknown InputRichBlock: ".$parameters['type']),
        };
    }
}
