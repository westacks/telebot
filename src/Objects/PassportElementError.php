<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an error in the Telegram Passport element which was submitted that should be resolved by the user. It should be one of:
 * - [PassportElementErrorDataField](https://core.telegram.org/bots/api#passportelementerrordatafield)
 * - [PassportElementErrorFrontSide](https://core.telegram.org/bots/api#passportelementerrorfrontside)
 * - [PassportElementErrorReverseSide](https://core.telegram.org/bots/api#passportelementerrorreverseside)
 * - [PassportElementErrorSelfie](https://core.telegram.org/bots/api#passportelementerrorselfie)
 * - [PassportElementErrorFile](https://core.telegram.org/bots/api#passportelementerrorfile)
 * - [PassportElementErrorFiles](https://core.telegram.org/bots/api#passportelementerrorfiles)
 * - [PassportElementErrorTranslationFile](https://core.telegram.org/bots/api#passportelementerrortranslationfile)
 * - [PassportElementErrorTranslationFiles](https://core.telegram.org/bots/api#passportelementerrortranslationfiles)
 * - [PassportElementErrorUnspecified](https://core.telegram.org/bots/api#passportelementerrorunspecified)
 *
 * @see https://core.telegram.org/bots/api#passportelementerror
 */
abstract class PassportElementError extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'address' => PassportElementErrorDataField::class,
            'internal_passport' => PassportElementErrorFrontSide::class,
            'identity_card' => PassportElementErrorReverseSide::class,
            'internal_passport' => PassportElementErrorSelfie::class,
            'temporary_registration' => PassportElementErrorFile::class,
            'temporary_registration' => PassportElementErrorFiles::class,
            'temporary_registration' => PassportElementErrorTranslationFile::class,
            'temporary_registration' => PassportElementErrorTranslationFiles::class,
            'issue' => PassportElementErrorUnspecified::class,
            default => throw new \InvalidArgumentException("Unknown PassportElementError: ".$parameters['type']),
        };
    }
}
