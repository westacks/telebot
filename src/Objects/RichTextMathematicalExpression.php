<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A mathematical expression.
 * @property-read string $type Type of the rich text, always “mathematical_expression”
 * @property-read string $expression The expression in LaTeX format
 *
 * @see https://core.telegram.org/bots/api#richtextmathematicalexpression
 */
class RichTextMathematicalExpression extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly string $expression,
    ) {
    }
}
