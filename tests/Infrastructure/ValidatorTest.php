<?php

namespace QDenka\EasyValidation\Tests\Infrastructure;

use PHPUnit\Framework\TestCase;
use QDenka\EasyValidation\Application\Validators\ValidatorFactoryInterface;
use QDenka\EasyValidation\Infrastructure\Factories\Validator;

class ValidatorTest extends TestCase
{
    public function testIsValidEmailValid()
    {
        $this->assertTrue(Validator::isValidEmail('test@example.com'));
    }

    public function testIsValidEmailInvalid()
    {
        $this->assertFalse(Validator::isValidEmail('invalid_email'));
    }

    public function testIsValidUrlValid()
    {
        $this->assertTrue(Validator::isValidUrl('http://www.example.com'));
    }

    public function testIsValidUrlInvalid()
    {
        $this->assertFalse(Validator::isValidUrl('invalid_url'));
    }

    public function testIsValidNumberValid()
    {
        $this->assertTrue(Validator::isValidNumber('123'));
    }

    public function testIsValidNumberInvalid()
    {
        $this->assertFalse(Validator::isValidNumber('invalid_number'));
    }

    public function testIsValidDateValid()
    {
        $this->assertTrue(Validator::isValidDate('2023-04-23'));
    }

    public function testIsValidDateInvalid()
    {
        $this->assertFalse(Validator::isValidDate('invalid_date'));
    }

    public function testCreateInvalidValidator()
    {
        $this->assertNull(Validator::create('invalid_type'));
    }
}
