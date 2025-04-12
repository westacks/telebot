<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
 *
 * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
 *
 * @property-read int $user_id User identifier
 * @property-read PassportElementError[] $errors A JSON-serialized array describing the errors
 *
 * @see https://core.telegram.org/bots/api#setpassportdataerrors
 */
class SetPassportDataErrorsMethod extends TelegramMethod
{
    protected string $method = 'setPassportDataErrors';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly array $errors,
    ) {
    }
}
