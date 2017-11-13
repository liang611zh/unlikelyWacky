<?php




if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

define("STRING_64", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
define("STRING_65", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

class SinglePlaneTest extends PHPUnit_Framework_TestCase
{
    private $singlePlane;
    
    
    public function setUp(){
        $this->singlePlane = new singlePlane();
    }
    
    //-----test setId-----//
   public function testSetIdBasic(){
        $this->assertEquals(true, $this->singlePlane->setId("U1"));
    }
    
    public function testSymbolsId(){
        $this->assertEquals(false, $this->singlePlane->setId("@!#$"));
    }
    public function testIdStartsWithU(){
        $this->assertEquals(true, $this->singlePlane->setId("UUUU"));
    }
    public function testIdNotStartsWithU(){
        $this->assertEquals(false, $this->singlePlane->setId("VVVV"));
    }
    public function testLengthLT4(){
        $this->assertEquals(true, $this->singlePlane->setId("u12"));
    }
    public function testLengthGT4(){
        $this->assertEquals(false, $this->singlePlane->setId("u2345"));
    }
    
    //-----test setManufacturer-----//
    public function testSetManufacturerBasic(){
        $this->assertEquals(true, $this->singlePlane->setManufacturer("Beechcraft"));
    }
    public function testSetManufacturerSymbols(){
        $this->assertEquals(false, $this->singlePlane->setManufacturer("Beechcraft##"));
    }
    public function testsetManufacturerLength64(){
        $this->assertEquals(true, $this->singlePlane->setManufacturer(STRING_64));
    }
    public function testsetManufacturerLength65(){
         $this->assertEquals(false, $this->singlePlane->setManufacturer(STRING_65));
    }
    
    //-----test setModel-----//
    public function testSetModelBasic(){
        $this->assertEquals(true, $this->singlePlane->setModel("Baron"));
    }
    public function testSetModelSymbols(){
        $this->assertEquals(false, $this->singlePlane->setModel("Baron##"));
    }
    public function testSetModelLength64(){
        $this->assertEquals(true, $this->singlePlane->setModel(STRING_64));
    }
    public function testSetModelLength65(){
         $this->assertEquals(false, $this->singlePlane->setModel(STRING_65));
    }
    
    //-----set setPrice-----//
    public function testSetPriceBasic(){
        $this->assertEquals(true, $this->singlePlane->setPrice(1350));
    }
    public function testSetPriceValidIntString(){
        $this->assertEquals(true, $this->singlePlane->setPrice("1350"));
    }
    public function testSetPriceInvalidIntString(){
        $this->assertEquals(false, $this->singlePlane->setPrice("1350a"));
    }
    public function testSetPriceGTZero(){
        $this->assertEquals(true, $this->singlePlane->setPrice(1));
    }
    public function testSetPriceLTZero(){
        $this->assertEquals(false, $this->singlePlane->setPrice(-1));
    }
    
    //-----set setSeats-----//
    public function testSetSeatsBasic(){
        $this->assertEquals(true, $this->singlePlane->setSeats(4));
    }
    public function testSetSeatsValidIntString(){
        $this->assertEquals(true, $this->singlePlane->setSeats("1350"));
    }
    public function testSetSeatsInvalidIntString(){
        $this->assertEquals(false, $this->singlePlane->setSeats("1350a"));
    }
    public function testSetSeatsGTZero(){
        $this->assertEquals(true, $this->singlePlane->setSeats(1));
    }
    public function testSetSeatsLTZero(){
        $this->assertEquals(false, $this->singlePlane->setSeats(-1));
    }
    
    //-----set setReach-----//
    public function testSetReachBasic(){
        $this->assertEquals(true, $this->singlePlane->setReach(1948));
    }
    public function testSetReachValidIntString(){
        $this->assertEquals(true, $this->singlePlane->setReach("1350"));
    }
    public function testSetReachInvalidIntString(){
        $this->assertEquals(false, $this->singlePlane->setReach("1350a"));
    }
    public function testSetReachGTZero(){
        $this->assertEquals(true, $this->singlePlane->setReach(1));
    }
    public function testSetReachLTZero(){
        $this->assertEquals(false, $this->singlePlane->setReach(-1));
    }
    
    //-----set setCruise-----//
    public function testSetCruiseBasic(){
        $this->assertEquals(true, $this->singlePlane->setCruise(373));
    }
    public function testSetCruiseValidIntString(){
        $this->assertEquals(true, $this->singlePlane->setCruise("1350"));
    }
    public function testSetCruiseInvalidIntString(){
        $this->assertEquals(false, $this->singlePlane->setCruise("1350a"));
    }
    public function testSetCruiseGTZero(){
        $this->assertEquals(true, $this->singlePlane->setCruise(1));
    }
    public function testSetCruiseLTZero(){
        $this->assertEquals(false, $this->singlePlane->setCruise(-1));
    }
    
    //-----set setTakeoff-----//
    public function testSetTakeoffBasic(){
        $this->assertEquals(true, $this->singlePlane->setTakeoff(701));
    }
    public function testSetTakeoffValidIntString(){
        $this->assertEquals(true, $this->singlePlane->setTakeoff("1350"));
    }
    public function testSetTakeoffInvalidIntString(){
        $this->assertEquals(false, $this->singlePlane->setTakeoff("1350a"));
    }
    public function testSetTakeoffGTZero(){
        $this->assertEquals(true, $this->singlePlane->setTakeoff(1));
    }
    public function testSetTakeoffLTZero(){
        $this->assertEquals(false, $this->singlePlane->setTakeoff(-1));
    }
    
    //-----set setHourly-----//
    public function testSetHourlyBasic(){
        $this->assertEquals(true, $this->singlePlane->setHourly(340));
    }
    public function testSetHourlyValidIntString(){
        $this->assertEquals(true, $this->singlePlane->setHourly("1350"));
    }
    public function testSetHourlyInvalidIntString(){
        $this->assertEquals(false, $this->singlePlane->setHourly("1350a"));
    }
    public function testSetHourlyGTZero(){
        $this->assertEquals(true, $this->singlePlane->setHourly(1));
    }
    public function testSetHourlyLTZero(){
        $this->assertEquals(false, $this->singlePlane->setHourly(-1));
    }
}