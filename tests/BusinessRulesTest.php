<?php

require_once '../application/models/Fleet.php';
require_once '../application/models/Flight.php';

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class BusinessRulesTest extends PHPUnit_Framework_TestCase
{
    private $planes;
    private $flights;
    
    public function setUp(){
        $jsonPlanes = json_encode((new Fleet())->all());
        $this->planes = json_decode($jsonPlanes, TRUE);
        
        $jsonFlights = json_encode((new Flight())->all());
        $this->flights = json_decode($jsonFlights, TRUE);
    }
    
    public function testUnder10Million(){
        $amt = 0;
        foreach($this->planes as $p){
            $amt += $p['price'];
        }
        
        $this->assertEquals(true, $amt < 10000);
    }
}