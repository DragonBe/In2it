<?php

require_once 'In2it/Validate/Mwop.php';
class In2it_Validate_MwopTest extends PHPUnit_Framework_TestCase
{
    public function goodDataProvider()
    {
        return array (
            array ("Matthew Weier O'Phinney"),
            array ("Dr. Keith Casey, Jr."),
            array ("Jan-Willem Jannsens"),
            array ("Helgi Þormar Þorbjörnsson"),
            array ("Павел Митьковский"),
            array ("戴明"),
        );
    }
    public function badDataProvider()
    {
        return array (
            array ("Robert'); DROP TABLE Students;--"),
            array ("chris' /*"),
            array ("shiflett' OR username = username"),
        );
    }

    /**
     * @dataProvider goodDataProvider
     */
    public function testValidatorValidatesCorrectNames($name)
    {
        $mwop = new In2it_Validate_Mwop();
        $this->assertTrue($mwop->isValid($name));
    }
    /**
     * @dataProvider badDataProvider
     */
    public function testValidatorRejectsBadNames($name)
    {
        $mwop = new In2it_Validate_Mwop();
        $this->assertFalse($mwop->isValid($name));
    }
}
