<?php

namespace WeStacks\TeleBot\Foundation;

interface Identifiable
{
    public static function identify(array $parameters): string;
}
