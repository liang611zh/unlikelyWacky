<?php

/**
 *
 * Model for single flight.
 *
 * @author Kent Huang
 */
class singleFlight extends Entity {

	protected $id;
	protected $planeId;
	protected $departureAirport;
	protected $departureTime;
	protected $arrivalAirport;
	protected $arrivalTime;
	protected $key;


	public function setId($value) {
		$this->id = $value;
	}

	public function setPlaneId($value) {
		$this->planeId = $value;
	}

	public function setDepartureAirport($value) {
		$this->departureAirport = $value;
	}

	public function setDepartureTime($value) {
		$this->departureTime = $value;
	}

	public function setArrivalAirport($value) {
		$this->arrivalAirport = $value;
	}

	public function setArrivalTime($value) {
		$this->arrivalTime = $value;
	}

	public function setKey($value) {
		$this->key = $value;
	}






}


?>