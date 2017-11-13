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
    }
    
    //-----test id_check-----//
    public function testId_checkBasic(){
        $this->assertEquals(true, $this->fleet->id_check("U1"));
    }
    public function testNotWrong(){
        $this->assertEquals(true, $this->fleet->id_check(" "));
    }
    public function testIs_wrong(){
        $this->assertEquals(false, $this->fleet->id_check("wrong"));
    }
    
}