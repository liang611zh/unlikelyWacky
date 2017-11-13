<?php

require_once '../application/models/Fleet.php';


if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class FleetTest extends PHPUnit_Framework_TestCase
{
    private $fleet;
    
    public function setUp(){
        $this->fleet = new Fleet();
        $this->fleet->load->library('form_validation');
    }
    
    //-----test id_check-----//
    public function testId_checkBasic(){
        $this->assertEquals(true, $this->fleet->id_check("U1"));
    }
    public function testEmptyString(){
        $this->assertEquals(false, $this->fleet->id_check(""));
    }
    public function testNotStartWithU(){
        $this->assertEquals(false, $this->fleet->id_check("V"));
    }
    public function testLengthGTThree(){
        $this->assertEquals(false, $this->fleet->id_check("U234"));
    }
    public function testIs_wrong(){
        $this->assertEquals(false, $this->fleet->id_check("wrong"));
    }
    
    //-----test recognizedPlane_check-----//
    public function testRecognizedPlane_CheckBasic(){
        $this->assertEquals(true, $this->fleet->recognizedPlane_check("baron"));
    }
    public function testInvalidPlane(){
        $this->assertEquals(false, $this->fleet->recognizedPlane_check("invalid"));
    }
}