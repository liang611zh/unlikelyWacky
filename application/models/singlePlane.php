<?php

/**
 *
 * Model for single plane.
 *
 * @author Kent Huang
 */
class singlePlane extends Entity {

	protected $id;
	protected $manufacturer;
	protected $model;
	protected $price;
	protected $seats;
	protected $reach;
	protected $cruise;
	protected $takeoff;
	protected $hourly;




	public function setId($value) {
		$this->id = $value;
	}

	public function setManufacturer($value) {
		$this->manufacturer = $value;
	}

	public function setModel($value) {
		$this->model = $value;
	}

	public function setPrice($value) {
		$this->price = $value;
	}

	public function setSeats($value) {
		$this->seats = $value;
	}

	public function setReach($value) {
		$this->reach = $value;
	}

	public function setCruise($value) {
		$this->cruise = $value;
	}

	public function setTakeoff($value) {
		$this->takeoff = $value;
	}

	public function setHourly($value) {
		$this->hourly = $value;
	}








}


?>