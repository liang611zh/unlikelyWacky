<?php

/**
 *
 * Model for single flight.
 *
 * @author Kent Huang
 */
require_once '../application/core/Entity.php';
    
class SingleFlight extends Entity {

	protected $id;
	protected $planeId;
	protected $departureAirport;
	protected $departureTime;
	protected $arrivalAirport;
	protected $arrivalTime;


	public function setId($value) {
        if((preg_match('/^^(U|u)([a-z A-Z0-9])*$/', $value) === 1) &&
            (strlen($value) == 4)){
            $this->id = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setPlaneId($value) {
        if((preg_match('/^(U|u)([a-z A-Z0-9])*$/', $value) === 1) &&
            (strlen($value) < 5)){        
            $this->planeId = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setDepartureAirport($value) {
        if((preg_match('/^[a-zA-Z0-9]+$/', $value) === 1) &&
            (strlen($value) == 3)){ 
            $this->departureAirport = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setDepartureTime($value) {
        $hour = explode(":", $value)[0];
        if((preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/', $value) === 1) &&
          $hour > 7) {
            $this->departureTime = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setArrivalAirport($value) {
        if((preg_match('/^[a-zA-Z0-9]+$/', $value) === 1) &&
            (strlen($value) == 3)){
            $this->arrivalAirport = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setArrivalTime($value) {
        $hour = explode(":", $value)[0];
        if((preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/', $value) === 1) &&
           $hour < 10) {
            $this->arrivalTime = $value;
            return true;
        } else {
            return false;
        }
	}

}


?>