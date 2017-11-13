<?php

require_once '../application/models/Fleet.php';

define("WACKY_API_URL", "https://wacky.jlparry.com/info/airplanes");

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class PlaneServerValidationTest extends PHPUnit_Framework_TestCase
{
    private $planes;
    private $serverPlanes;
    
    public function setUp(){
        $jsonPlanes = json_encode((new Fleet())->all());
        $this->planes = json_decode($jsonPlanes, TRUE);
            
        $json = file_get_contents(WACKY_API_URL);
        $this->serverPlanes = json_decode($json, TRUE);
    }
    
    public function testServerValidity(){
        $this->assertEquals(true, $this->validity());
    }
    public function validity(){
        foreach($this->planes as $p){
            foreach($this->serverPlanes as $q){
                if($p['manufacturer'] == $q['manufacturer'] &&
                   $p['model'] == $q['model'] &&
                   $p['price'] == $q['price'] &&
                   $p['seats'] == $q['seats'] &&
                   $p['reach'] == $q['reach'] &&
                   $p['cruise'] == $q['cruise'] &&
                   $p['takeoff'] == $q['takeoff'] &&
                   $p['hourly'] == $q['hourly']){
                    return true;                
                }
            }
            return false;
        }
    }
    /**
    ** Check object has properly been parsed
    **
    public function testObjects(){
        fwrite(STDERR, print_r($this->planes));
    }
    **/
    
    
}