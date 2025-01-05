<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\PassportElementError;

/**
 * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
 *
 * @property int                    $user_id __Required: Yes__. User identifier
 * @property PassportElementError[] $errors  __Required: Yes__. A JSON-serialized array describing the errors
 */
class SetPassportDataErrorsMethod extends TelegramMethod
{
    protected string $method = 'setPassportDataErrors';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'errors' => 'PassportElementError[]',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
