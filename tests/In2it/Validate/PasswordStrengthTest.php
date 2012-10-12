<?php

require_once 'In2it/Validate/PasswordStrength.php';
class In2it_Validate_PasswordStrengthTest extends PHPUnit_Framework_TestCase
{
    public function testPasswordIsWeak()
    {
        $password = 'god';
        $passwordStrength = new In2it_Validate_PasswordStrength(
            In2it_Validate_PasswordStrength::PASSWD_WEAK);
        $this->assertTrue($passwordStrength->isValid($password));
    }
    public function testPasswordIsNotWeak()
    {
        $password = '';
        $passwordStrength = new In2it_Validate_PasswordStrength(
            In2it_Validate_PasswordStrength::PASSWD_WEAK);
        $this->assertFalse($passwordStrength->isValid($password));
    }
    public function testPasswordIsMedium()
    {
        $this->markTestSkipped('Problem validating medium level passwords');
        $password = 'abcd1234';
        $passwordStrength = new In2it_Validate_PasswordStrength(
            In2it_Validate_PasswordStrength::PASSWD_MEDIUM);
        $this->assertTrue($passwordStrength->isValid($password));
    }
    public function testPasswordIsNotMedium()
    {
        $this->markTestSkipped('Problem validating medium level passwords');
        $password = 'god';
        $passwordStrength = new In2it_Validate_PasswordStrength(
            In2it_Validate_PasswordStrength::PASSWD_MEDIUM);
        $this->assertFalse($passwordStrength->isValid($password));
    }
    public function testPasswordIsStrong()
    {
        $password = 'I am number 1 in the world!';
        $passwordStrength = new In2it_Validate_PasswordStrength(
            In2it_Validate_PasswordStrength::PASSWD_STRONG);
        $this->assertTrue($passwordStrength->isValid($password));
    }
    
    public function testPasswordIsNotStrong()
    {
        $password = 'god';
        $passwordStrength = new In2it_Validate_PasswordStrength(
            In2it_Validate_PasswordStrength::PASSWD_STRONG);
        $this->assertFalse($passwordStrength->isValid($password));
    }
}