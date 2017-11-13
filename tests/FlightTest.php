<?php

require_once '../application/models/Flight.php';


if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class FlightTest extends PHPUnit_Framework_TestCase
{
    private $flight;
    
    public function setUp(){
        $this->flight = new Flight();
    }
    
    //----test searchFlights-----//
    public function testSearchFlightsBasic(){
        $this->assertEquals(true, sizeof($this->flight->searchFlights("YPZ", "YPZ")) < 3);
    }
    public function testInvalidCodeSource(){
        $this->assertEquals(true, $this->flight->searchFlights("ABC", "YPZ") == null);
    }
    public function testInvalidCodeDest(){
        $this->assertEquals(true, $this->flight->searchFlights("YPZ", "ABC") == null);
    }
    public function testIncompatAirports(){
        $this->assertEquals(true, $this->flight->searchFlights("YPZ", "XQU") == null);
    }
}