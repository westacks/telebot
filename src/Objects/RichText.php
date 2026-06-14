<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a rich formatted text. Currently, it can be either a String for plain text, an Array of RichText, or any of the following types:
 * - [RichTextBold](https://core.telegram.org/bots/api#richtextbold)
 * - [RichTextItalic](https://core.telegram.org/bots/api#richtextitalic)
 * - [RichTextUnderline](https://core.telegram.org/bots/api#richtextunderline)
 * - [RichTextStrikethrough](https://core.telegram.org/bots/api#richtextstrikethrough)
 * - [RichTextSpoiler](https://core.telegram.org/bots/api#richtextspoiler)
 * - [RichTextDateTime](https://core.telegram.org/bots/api#richtextdatetime)
 * - [RichTextTextMention](https://core.telegram.org/bots/api#richtexttextmention)
 * - [RichTextSubscript](https://core.telegram.org/bots/api#richtextsubscript)
 * - [RichTextSuperscript](https://core.telegram.org/bots/api#richtextsuperscript)
 * - [RichTextMarked](https://core.telegram.org/bots/api#richtextmarked)
 * - [RichTextCode](https://core.telegram.org/bots/api#richtextcode)
 * - [RichTextCustomEmoji](https://core.telegram.org/bots/api#richtextcustomemoji)
 * - [RichTextMathematicalExpression](https://core.telegram.org/bots/api#richtextmathematicalexpression)
 * - [RichTextUrl](https://core.telegram.org/bots/api#richtexturl)
 * - [RichTextEmailAddress](https://core.telegram.org/bots/api#richtextemailaddress)
 * - [RichTextPhoneNumber](https://core.telegram.org/bots/api#richtextphonenumber)
 * - [RichTextBankCardNumber](https://core.telegram.org/bots/api#richtextbankcardnumber)
 * - [RichTextMention](https://core.telegram.org/bots/api#richtextmention)
 * - [RichTextHashtag](https://core.telegram.org/bots/api#richtexthashtag)
 * - [RichTextCashtag](https://core.telegram.org/bots/api#richtextcashtag)
 * - [RichTextBotCommand](https://core.telegram.org/bots/api#richtextbotcommand)
 * - [RichTextAnchor](https://core.telegram.org/bots/api#richtextanchor)
 * - [RichTextAnchorLink](https://core.telegram.org/bots/api#richtextanchorlink)
 * - [RichTextReference](https://core.telegram.org/bots/api#richtextreference)
 * - [RichTextReferenceLink](https://core.telegram.org/bots/api#richtextreferencelink)
 *
 * @see https://core.telegram.org/bots/api#richtext
 */
class RichText extends TelegramObject implements Identifiable
{
    /** @var string|RichText[] */
    public array|string $value;

    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'bold' => RichTextBold::class,
            'italic' => RichTextItalic::class,
            'underline' => RichTextUnderline::class,
            'strikethrough' => RichTextStrikethrough::class,
            'spoiler' => RichTextSpoiler::class,
            'date_time' => RichTextDateTime::class,
            'text_mention' => RichTextTextMention::class,
            'subscript' => RichTextSubscript::class,
            'superscript' => RichTextSuperscript::class,
            'marked' => RichTextMarked::class,
            'code' => RichTextCode::class,
            'custom_emoji' => RichTextCustomEmoji::class,
            'mathematical_expression' => RichTextMathematicalExpression::class,
            'url' => RichTextUrl::class,
            'email_address' => RichTextEmailAddress::class,
            'phone_number' => RichTextPhoneNumber::class,
            'bank_card_number' => RichTextBankCardNumber::class,
            'mention' => RichTextMention::class,
            'hashtag' => RichTextHashtag::class,
            'cashtag' => RichTextCashtag::class,
            'bot_command' => RichTextBotCommand::class,
            'anchor' => RichTextAnchor::class,
            'anchor_link' => RichTextAnchorLink::class,
            'reference' => RichTextReference::class,
            'reference_link' => RichTextReferenceLink::class,
            default => throw new \InvalidArgumentException("Unknown RichText: ".$parameters['type']),
        };
    }

    public function __construct(array|string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        if (is_string($this->value)) {
            return $this->value;
        }

        return parent::__toString();
    }

    public function offsetExists(mixed $offset): bool
    {
        if (is_array($this->value)) {
            return array_key_exists($offset, $this->value);
        }

        return parent::offsetExists($offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        if (is_array($this->value)) {
            return $this->value[$offset];
        }

        return parent::offsetGet($offset);
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_array($this->value)) {
            $this->value[$offset] = $value;
            return;
        }

        parent::offsetSet($offset, $value);
    }

    public function offsetUnset(mixed $offset): void
    {
        if (is_array($this->value)) {
            unset($this->value[$offset]);
            return;
        }

        parent::offsetUnset($offset);
    }
}
