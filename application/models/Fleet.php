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

}
