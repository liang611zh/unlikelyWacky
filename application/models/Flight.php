<?php

/**
 * This is a CSV model for flights.
 * Data are from models/flights.csv
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
	
	public function searchFlights($departure, $destination) {
		
		$searching = $this->all();
		$searchresult = array();
		$firstlegs = array();
		
		foreach($searching as $firstleg) {
			if(!strcmp($firstleg->departureAirport, $departure)) {
				if(!strcmp($firstleg->arrivalAirport, $destination)) {
					$leg = array(
					'leg' => array(json_decode(json_encode($firstleg))));
					array_push($searchresult, $leg);
				} else {
					array_push($firstlegs, $firstleg);
				}
			}
		}
		
		foreach($firstlegs as $firstleg) {
			foreach($searching as $secondleg) {
				if(!strcmp($firstleg->arrivalAirport, $secondleg->departureAirport) &&
					(strtotime("tomorrow " . $secondleg->departureTime) - strtotime("tomorrow " . $firstleg->arrivalTime)) >= 1800 ) {
					if(!strcmp($secondleg->arrivalAirport, $destination)) {
						$leg = array();
						/*
						$leg['firstleg'] = array(json_decode(json_encode($firstleg), True));
						$leg['secondleg'] = array(json_decode(json_encode($secondleg), True));
						
						array_push($leg, json_decode(json_encode($firstleg), True));
						array_push($leg, json_decode(json_encode($secondleg), True));
						*/
						$leg = array(
							'leg' => array(
							json_decode(json_encode($firstleg)),
							json_decode(json_encode($secondleg))
							)
						);
						array_push($searchresult, $leg);
					} else {
						foreach($searching as $thirdleg) {
							
							if(!strcmp($secondleg->arrivalAirport, $thirdleg->departureAirport) &&
								(strtotime("tomorrow " . $thirdleg->departureTime) - strtotime("tomorrow " . $secondleg->arrivalTime)) >= 1800 &&
								!strcmp($thirdleg->arrivalAirport, $destination)) {
									$leg = array();
									/*
									$leg['firstleg'] = array(json_decode(json_encode($firstleg), True));
									$leg['secondleg'] = array(json_decode(json_encode($secondleg), True));
									$leg['thirdleg'] = array(json_decode(json_encode($thirdleg), True));
									
									array_push($leg, json_decode(json_encode($firstleg), True));
									array_push($leg, json_decode(json_encode($secondleg), True));
									array_push($leg, json_decode(json_encode($thirdleg), True));
									*/
									$leg = array(
										'leg' => array(
										json_decode(json_encode($firstleg)),
										json_decode(json_encode($secondleg)),
										json_decode(json_encode($thirdleg))
										)
									);
									array_push($searchresult, $leg);
							}
						}
					}
				}
			}
		}
		return $searchresult;
	}
}
