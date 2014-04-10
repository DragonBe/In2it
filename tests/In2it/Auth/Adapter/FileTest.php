<?php

require_once 'In2it/Auth/Adapter/File.php';
class In2it_Auth_Adapter_FileTest extends PHPUnit_Framework_TestCase
{
    public function goodDataProvider()
    {
        return array (
            array ('test', 'test'),
            array ('abcd', '123hup1234'),
        );
    }
    public function badDataProvider()
    {
        return array (
            array ('test', 'test123'),
            array ('', ''),
        );
    }
    /**
     * @dataProvider goodDataProvider
     */
    public function testAuthenticationIsSuccessful($username, $password)
    {
        $filename = dirname(__FILE__) . '/_files/testusers';
        
        $file = new In2it_Auth_Adapter_File(
            $username,
            $password,
            $filename
        );
        $result = $file->authenticate();
        $this->assertInstanceOf('Zend_Auth_Result', $result);
        $this->assertSame(Zend_Auth_Result::SUCCESS, $result->getCode());
        $this->assertTrue($result->isValid());
    }
    /**
     * @dataProvider badDataProvider
     */
    public function testAuthenticationFails($username, $password)
    {
        $filename = dirname(__FILE__) . '/_files/testusers';
        
        $file = new In2it_Auth_Adapter_File(
            $username,
            $password,
            $filename
        );
        $result = $file->authenticate();
        $this->assertInstanceOf('Zend_Auth_Result', $result);
        $this->assertSame(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, $result->getCode());
        $this->assertFalse($result->isValid());
    }
}