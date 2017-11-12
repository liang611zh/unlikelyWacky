<?php

/**
 *
 * Model for single plane.
 *
 * @author Kent Huang
 */
require_once '../application/core/Entity.php';

class SinglePlane extends Entity {

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
        if((preg_match('/^(U|u)([a-z A-Z0-9])*$/', $value) === 1)     &&
            (strlen($value) < 5)){  
            $this->id = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setManufacturer($value) {
        if((preg_match('/^[a-z A-Z0-9]+$/', $value) === 1) &&
            (strlen($value) < 65)){
            $this->manufacturer = $value;
            return true;
        } else {
            return false;   
        }
        
	}

	public function setModel($value) {
        if((preg_match('/^[a-z A-Z0-9]+$/', $value) === 1) &&
            (strlen($value) < 65)){
            $this->model = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setPrice($value) {
        if(is_numeric($value) && $value > 0){
            $this->price = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setSeats($value) {
        if(is_numeric($value) && $value > 0){
            $this->seats = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setReach($value) {
        if(is_numeric($value) && $value > 0){
            $this->reach = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setCruise($value) {
        if(is_numeric($value) && $value > 0){
            $this->cruise = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setTakeoff($value) {
        if(is_numeric($value) && $value > 0){
            $this->takeoff = $value;
            return true;
        } else {
            return false;
        }
	}

	public function setHourly($value) {
        if(is_numeric($value) && $value > 0){
            $this->hourly = $value;
            return true;
        } else {
            return false;
        }
	}








}


?>