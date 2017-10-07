<?php

/**
 * This is a "CMS" model for flights, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Kent Huang
 */
class Flights extends CI_Model
{

	//this airplanes we own
	var $data = array(
		'U001'	 => array('id'	 => 'U001', 
						'planeId'	 => 'U1',
						'departureAirport'	 => 'YYD', 
						'departureTime' => '8:30',
						'arrivalAirport' => 'YPZ',
						'arrivalTime' => '9:00'),

		'U002'	 => array('id'	 => 'U002', 
						'planeId'	 => 'U1',
						'departureAirport'	 => 'YPZ', 
						'departureTime' => '9:40',
						'arrivalAirport' => 'YDL',
						'arrivalTime' => '11:15'),

		'U003'	 => array('id'	 => 'U003', 
						'planeId'	 => 'U1',
						'departureAirport'	 => 'YDL', 
						'departureTime' => '12:00',
						'arrivalAirport' => 'YYD',
						'arrivalTime' => '13:25'),

		'U004'	 => array('id'	 => 'U004', 
						'planeId'	 => 'U3',
						'departureAirport'	 => 'YYD', 
						'departureTime' => '9:00',
						'arrivalAirport' => 'ZST',
						'arrivalTime' => '9:30'),
		'U005'	 => array('id'	 => 'U005', 
						'planeId'	 => 'U3',
						'departureAirport'	 => 'ZST', 
						'departureTime' => '10:00',
						'arrivalAirport' => 'YYD',
						'arrivalTime' => '10:30'),

		'U006'	 => array('id'	 => 'U006', 
						'planeId'	 => 'U2',
						'departureAirport'	 => 'YYD', 
						'departureTime' => '12:00',
						'arrivalAirport' => 'YPZ',
						'arrivalTime' => '12:30'),

		'U007'	 => array('id'	 => 'U007', 
						'planeId'	 => 'U2',
						'departureAirport'	 => 'YPZ', 
						'departureTime' => '13:00',
						'arrivalAirport' => 'YDL',
						'arrivalTime' => '14:45'),
		
		'U008'	 => array('id'	 => 'U008', 
						'planeId'	 => 'U2',
						'departureAirport'	 => 'YDL', 
						'departureTime' => '15:15',
						'arrivalAirport' => 'ZST',
						'arrivalTime' => '16:05'),

		'U009'	 => array('id'	 => 'U009', 
						'planeId'	 => 'U2',
						'departureAirport'	 => 'ZST', 
						'departureTime' => '16:45',
						'arrivalAirport' => 'YYD',
						'arrivalTime' => '17:35'),

	);

	// Constructor
	public function __construct()
	{
		parent::__construct();

		// inject each "record" key into the record itself, for ease of presentation
		foreach ($this->data as $key => $record)
		{
			$record['key'] = $key;
			$this->data[$key] = $record;
		}
	}

	// retrieve a single flight by passing in the id, null if not found
	//example call in controller :  $this->flights->get('U001');
	//
	//the return-value printed by print_r() is shown below:
	//
	//Array ( [id] => U001 [planeId] => U1 [departureAirport] => YYD [departureTime] => 8:30 [arrivalAirport] => YPZ [arrivalTime] => 9:00 [key] => U001 ) 1
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}

	// retrieve all of the flights
	//example call in controller :  $this->flights->all();
	public function all()
	{
		return $this->data;
	}

}