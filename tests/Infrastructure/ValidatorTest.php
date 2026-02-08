<?php

namespace QDenka\EasyValidation\Tests\Infrastructure;

use PHPUnit\Framework\TestCase;
use QDenka\EasyValidation\Infrastructure\Factories\Validator;

class ValidatorTest extends TestCase
{
    // --- Email ---

    public function testIsValidEmailValid(): void
    {
        $this->assertTrue(Validator::isValidEmail('test@example.com'));
    }

    public function testIsValidEmailInvalid(): void
    {
        $this->assertFalse(Validator::isValidEmail('invalid_email'));
    }

    // --- Google Mail ---

    public function testIsGoogleMailValid(): void
    {
        $this->assertTrue(Validator::isGoogleMail('user@gmail.com'));
    }

    public function testIsGoogleMailValidGooglemail(): void
    {
        $this->assertTrue(Validator::isGoogleMail('user@googlemail.com'));
    }

    public function testIsGoogleMailInvalidDomain(): void
    {
        $this->assertFalse(Validator::isGoogleMail('user@yahoo.com'));
    }

    public function testIsGoogleMailInvalidFormat(): void
    {
        $this->assertFalse(Validator::isGoogleMail('not-an-email'));
    }

    // --- Disposable Email ---

    public function testIsDisposableEmailDetectsDisposable(): void
    {
        $this->assertTrue(Validator::isDisposableEmail('user@mailinator.com'));
    }

    public function testIsDisposableEmailAllowsNormal(): void
    {
        $this->assertFalse(Validator::isDisposableEmail('user@example.com'));
    }

    // --- URL ---

    public function testIsValidUrlValidHttp(): void
    {
        $this->assertTrue(Validator::isValidUrl('http://www.example.com'));
    }

    public function testIsValidUrlValidHttps(): void
    {
        $this->assertTrue(Validator::isValidUrl('https://example.com/path?q=1'));
    }

    public function testIsValidUrlInvalid(): void
    {
        $this->assertFalse(Validator::isValidUrl('invalid_url'));
    }

    public function testIsValidUrlRejectsFtp(): void
    {
        $this->assertFalse(Validator::isValidUrl('ftp://files.example.com'));
    }

    // --- Number ---

    public function testIsValidNumberInteger(): void
    {
        $this->assertTrue(Validator::isValidNumber('123'));
    }

    public function testIsValidNumberFloat(): void
    {
        $this->assertTrue(Validator::isValidNumber('123.45'));
    }

    public function testIsValidNumberNegative(): void
    {
        $this->assertTrue(Validator::isValidNumber('-42'));
    }

    public function testIsValidNumberInvalid(): void
    {
        $this->assertFalse(Validator::isValidNumber('abc'));
    }

    // --- Date ---

    public function testIsValidDateValid(): void
    {
        $this->assertTrue(Validator::isValidDate('2023-04-23'));
    }

    public function testIsValidDateInvalid(): void
    {
        $this->assertFalse(Validator::isValidDate('invalid_date'));
    }

    public function testIsValidDateRejectsImpossible(): void
    {
        $this->assertFalse(Validator::isValidDate('2023-02-30'));
    }

    // --- IP ---

    public function testIsValidIpV4(): void
    {
        $this->assertTrue(Validator::isValidIp('192.168.1.1'));
    }

    public function testIsValidIpV6(): void
    {
        $this->assertTrue(Validator::isValidIp('2001:db8::1'));
    }

    public function testIsValidIpInvalid(): void
    {
        $this->assertFalse(Validator::isValidIp('999.999.999.999'));
    }

    public function testIsValidIpInvalidString(): void
    {
        $this->assertFalse(Validator::isValidIp('not-an-ip'));
    }

    // --- UUID ---

    public function testIsValidUuidV4(): void
    {
        $this->assertTrue(Validator::isValidUuid('550e8400-e29b-41d4-a716-446655440000'));
    }

    public function testIsValidUuidInvalid(): void
    {
        $this->assertFalse(Validator::isValidUuid('not-a-uuid'));
    }

    public function testIsValidUuidInvalidVersion(): void
    {
        $this->assertFalse(Validator::isValidUuid('550e8400-e29b-61d4-a716-446655440000'));
    }

    // --- JSON ---

    public function testIsValidJsonObject(): void
    {
        $this->assertTrue(Validator::isValidJson('{"foo":1}'));
    }

    public function testIsValidJsonArray(): void
    {
        $this->assertTrue(Validator::isValidJson('[1,2,3]'));
    }

    public function testIsValidJsonInvalid(): void
    {
        $this->assertFalse(Validator::isValidJson('{invalid}'));
    }

    // --- Base64 ---

    public function testIsValidBase64Valid(): void
    {
        $this->assertTrue(Validator::isValidBase64(base64_encode('hello world')));
    }

    public function testIsValidBase64Invalid(): void
    {
        $this->assertFalse(Validator::isValidBase64('not base64!!!'));
    }

    // --- Phone ---

    public function testIsValidPhoneValid(): void
    {
        $this->assertTrue(Validator::isValidPhone('+1234567890'));
    }

    public function testIsValidPhoneValidLong(): void
    {
        $this->assertTrue(Validator::isValidPhone('+442071234567'));
    }

    public function testIsValidPhoneInvalidNoPlus(): void
    {
        $this->assertFalse(Validator::isValidPhone('1234567890'));
    }

    public function testIsValidPhoneInvalidTooShort(): void
    {
        $this->assertFalse(Validator::isValidPhone('+123'));
    }

    // --- Factory ---

    public function testCreateReturnsNullForUnknownType(): void
    {
        $this->assertNull(Validator::create('invalid_type'));
    }

    public function testCreateReturnsValidatorForKnownType(): void
    {
        $validator = Validator::create('email');
        $this->assertNotNull($validator);
        $this->assertTrue($validator->validate('test@example.com'));
    }
}
