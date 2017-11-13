<?php




if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class SingleFlightTest extends PHPUnit_Framework_TestCase
{
    private $singleFlight;

    public function setUp()
    {
        $this->singleFlight = new singleFlight();
    }

    //-----test setId-----//
    public function testSetIdBasic(){
        $this->assertEquals(true, $this->singleFlight->setId("U001"));
    }
    public function testSymbolsId(){
        $this->assertEquals(false, $this->singleFlight->setId("@@@@"));
    }
    public function testStartsWithU(){
        $this->assertEquals(true, $this->singleFlight->setId("UUUU"));
    }
    public function testNotStartWithU(){
        $this->assertEquals(false, $this->singleFlight->setId("VVVV"));
    }
    public function testLengthIsFour(){
        $this->assertEquals(true, $this->singleFlight->setId("U234"));
    }
    public function testLengthNotFour(){
        $this->assertEquals(false, $this->singleFlight->setId("U23"));
    }
    
    //-----test setPlaneId-----//
    public function testSetPlaneIdBasic(){
        $this->assertEquals(true, $this->singleFlight->setPlaneId("U1"));
    }
    
    public function testSymbolsPlaneId(){
        $this->assertEquals(false, $this->singleFlight->setPlaneId("@!#$"));
    }
    public function testPlaneIdStartsWithU(){
        $this->assertEquals(true, $this->singleFlight->setPlaneId("UUUU"));
    }
    public function testPlaneIdNotStartsWithU(){
        $this->assertEquals(false, $this->singleFlight->setPlaneId("VVVV"));
    }
    public function testLengthLT4(){
        $this->assertEquals(true, $this->singleFlight->setPlaneId("u12"));
    }
    public function testLengthGT4(){
        $this->assertEquals(false, $this->singleFlight->setPlaneId("u2345"));
    }
    
    //-----test setDepartureAirport-----//
    public function testSetDepartureAirportBasic(){
        $this->assertEquals(true, $this->singleFlight->setDepartureAirport("YYD"));
    }
    public function testDepartureSymbols(){
        $this->assertEquals(false, $this->singleFlight->setDepartureAirport("!@#"));
    }
    public function testDepartureLengthIsThree(){
        $this->assertEquals(true, $this->singleFlight->setDepartureAirport("123"));
    }
    public function testDepartureLengthIsNotThree(){
        $this->assertEquals(false, $this->singleFlight->setDepartureAirport("1234"));
    }
    
    //-----test SetDepartureTime-----//
    public function testSetDepartureTimeBasic(){
        $this->assertEquals(true, $this->singleFlight->setDepartureTime("8:30"));
    }
    public function testDepartureTimeInvalidChars(){
        $this->assertEquals(false, $this->singleFlight->setDepartureTime("a8_:30"));
    }
    public function testDepartureTimeInvalidTime(){
        $this->assertEquals(false, $this->singleFlight->setDepartureTime("99:99"));
    }
    public function testDepartureBeforeEight(){
        $this->assertEquals(false, $this->singleFlight->setDepartureTime("7:59"));
    }
    
    //-----test setArrivalAirport-----//
    public function testsetArrivalAirportBasic(){
        $this->assertEquals(true, $this->singleFlight->setArrivalAirport("YPZ"));
    }
    public function testArrivalSymbols(){
        $this->assertEquals(false, $this->singleFlight->setArrivalAirport("!@#"));
    }
    public function testArrivalLengthIsThree(){
        $this->assertEquals(true, $this->singleFlight->setArrivalAirport("123"));
    }
    public function testArrivalLengthIsNotThree(){
        $this->assertEquals(false, $this->singleFlight->setArrivalAirport("1234"));
    }
    
    //-----test setArrivalTime-----//
    public function testsetArrivalTimeBasic(){
        $this->assertEquals(true, $this->singleFlight->setArrivalTime("8:30"));
    }
    public function testArrivalTimeInvalidChars(){
        $this->assertEquals(false, $this->singleFlight->setArrivalTime("a8_:30"));
    }
    public function testArrivalTimeInvalidTime(){
        $this->assertEquals(false, $this->singleFlight->setArrivalTime("99:99"));
    }
    public function testArrivalAfterTen(){
        $this->assertEquals(false, $this->singleFlight->setArrivalTime("10:00"));
    }
}