<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a mathematical expression in LaTeX format, corresponding to the custom HTML tag <tg-math-block>.
 * @property-read string $type Type of the block, always “mathematical_expression”
 * @property-read string $expression The mathematical expression in LaTeX format
 *
 * @see https://core.telegram.org/bots/api#richblockmathematicalexpression
 */
class RichBlockMathematicalExpression extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly string $expression,
    ) {
    }
}
