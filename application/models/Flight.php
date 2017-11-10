<?php

/**
 * This is a "CMS" model for flights, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Kent Huang
 */
class Flight extends CSV_Model
{

	// Constructor
	//load flights.csv
	public function __construct()
	{
		parent::__construct(APPPATH . '../data/flights.csv', 'id');

		
	}

	// Retrieve the number of Flights
	//Example call in controller:	$this->flights->countFlights();
	public function countFlights()
	{
		return count($this->all());
	}
	
	// Retrieve the all the unique Destinations airplanes fly to base on flight data
	// Data references departureAiports and assumes base is included in departureAiports
	//Example call in controller: $this->flights->unique Airports
	public function uniqueAirports()
	{
		$airports = array_values(array_unique(array_column($this->all(), 'departureAirport'), 0));
		// need to rename the keys
		$unique = array();
		foreach($airports as $key=>$value) {
			array_push($unique,
				array(
					"uniqueAirports" => $value)
			);
		}
		return $unique;
	}
}
