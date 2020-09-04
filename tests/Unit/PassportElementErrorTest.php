<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\Passport\PassportElementError;
use WeStacks\TeleBot\Objects\Passport\PassportElementError\PassportElementErrorDataField;

class PassportElementErrorTest extends TestCase
{
    public function testPassportElementError()
    {
        $object = PassportElementError::create(['source' => 'data']);
        $this->assertInstanceOf(PassportElementErrorDataField::class, $object);
    }

    public function testWrongPassportElementError()
    {
        $this->expectException(TeleBotObjectException::class);
        PassportElementError::create(['source' => 'some_wrong_type']);
    }
}