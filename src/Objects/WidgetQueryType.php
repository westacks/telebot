<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the type of a query from a widget. Currently, it can be one of
 * - [WidgetQueryTypeData](https://core.telegram.org/bots/api#widgetquerytypedata)
 * - [WidgetQueryTypeSignData](https://core.telegram.org/bots/api#widgetquerytypesigndata)
 * - [WidgetQueryTypeSentTransaction](https://core.telegram.org/bots/api#widgetquerytypesenttransaction)
 *
 * @see https://core.telegram.org/bots/api#widgetquerytype
 */
abstract class WidgetQueryType extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'data' => WidgetQueryTypeData::class,
            'sign_data' => WidgetQueryTypeSignData::class,
            'sent_transaction' => WidgetQueryTypeSentTransaction::class,
            default => throw new \InvalidArgumentException("Unknown WidgetQueryType: ".$parameters['type']),
        };
    }
}
