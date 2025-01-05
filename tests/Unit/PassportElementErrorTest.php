<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\PassportElementError;
use WeStacks\TeleBot\Objects\PassportElementErrorDataField;
use WeStacks\TeleBot\Objects\PassportElementErrorFile;
use WeStacks\TeleBot\Objects\PassportElementErrorFiles;
use WeStacks\TeleBot\Objects\PassportElementErrorFrontSide;
use WeStacks\TeleBot\Objects\PassportElementErrorReverseSide;
use WeStacks\TeleBot\Objects\PassportElementErrorSelfie;
use WeStacks\TeleBot\Objects\PassportElementErrorTranslationFile;
use WeStacks\TeleBot\Objects\PassportElementErrorTranslationFiles;
use WeStacks\TeleBot\Objects\PassportElementErrorUnspecified;

class PassportElementErrorTest extends TestCase
{
    public function test_passport_element_error()
    {
        $object = PassportElementError::create(['source' => 'data']);
        $this->assertInstanceOf(PassportElementErrorDataField::class, $object);

        $object = PassportElementError::create(['source' => 'front_side']);
        $this->assertInstanceOf(PassportElementErrorFrontSide::class, $object);

        $object = PassportElementError::create(['source' => 'reverse_side']);
        $this->assertInstanceOf(PassportElementErrorReverseSide::class, $object);

        $object = PassportElementError::create(['source' => 'selfie']);
        $this->assertInstanceOf(PassportElementErrorSelfie::class, $object);

        $object = PassportElementError::create(['source' => 'file']);
        $this->assertInstanceOf(PassportElementErrorFile::class, $object);

        $object = PassportElementError::create(['source' => 'files']);
        $this->assertInstanceOf(PassportElementErrorFiles::class, $object);

        $object = PassportElementError::create(['source' => 'translation_file']);
        $this->assertInstanceOf(PassportElementErrorTranslationFile::class, $object);

        $object = PassportElementError::create(['source' => 'translation_files']);
        $this->assertInstanceOf(PassportElementErrorTranslationFiles::class, $object);

        $object = PassportElementError::create(['source' => 'unspecified']);
        $this->assertInstanceOf(PassportElementErrorUnspecified::class, $object);
    }

    public function test_wrong_passport_element_error()
    {
        $this->expectException(TeleBotException::class);
        PassportElementError::create(['source' => 'some_wrong_type']);
    }
}
