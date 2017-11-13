<?php

/**
 * This is a CSV model for fleet.
 * Data are from models/fleet.csv
 * @author Kent Huang
 */
class Fleet extends CSV_Model
{

	// Constructor
	//load fleet.csv
	public function __construct()
	{
		parent::__construct(APPPATH . '../data/fleet.csv', 'id');
	}

	public function countFleet()
	{
		return count($this->all());
	}

    // provide form validation rules
    public function rules()
    {
        $config = array(
            ['field' => 'id', 'label' => 'Plane id', 'rules' => 'alpha_numeric_spaces|max_length[4]|required'],
            // ['field' => 'manufacturer', 'label' => 'Manufacturer', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            // ['field' => 'model', 'label' => 'Model', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            // ['field' => 'price', 'label' => 'Price', 'rules' => 'numeric|greater_than[0]'],
            // ['field' => 'seats', 'label' => 'Number of seats', 'rules' => 'integer|greater_than[0]'],
            // ['field' => 'reach', 'label' => 'Reach', 'rules' => 'integer|greater_than[0]'],
            // ['field' => 'cruise', 'label' => 'Cruise', 'rules' => 'integer|greater_than[0]'],
            // ['field' => 'takeoff', 'label' => 'Takeoff', 'rules' => 'integer|greater_than[0]'],
            // ['field' => 'hourly', 'label' => 'Hourly', 'rules' => 'integer|greater_than[0]'],
        );
        return $config;
    }
}
