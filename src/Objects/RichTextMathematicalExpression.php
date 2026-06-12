<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A mathematical expression.
 * @property-read string $type Type of the rich text, always “mathematical_expression”
 * @property-read string $expression The expression in LaTeX format
 *
 * @see https://core.telegram.org/bots/api#richtextmathematicalexpression
 */
class RichTextMathematicalExpression extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly string $expression,
    ) {
    }
}
