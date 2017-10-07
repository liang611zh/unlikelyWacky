<?php

/**
 * This is a "CMS" model for fleet, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Kent Huang
 */
class Fleet extends CI_Model
{

	//this airplanes we own
	//
	var $data = array(
		'U1'	 => array('id'	 => 'U1', 'manufacturer'	 => 'Beechcraft',
			'model'	 => 'Baron'),
		'U2'	 => array('id'	 => 'U2', 'manufacturer'	 => 'Cessna',
			'model'	 => 'Grand Caravan EX'),
		'U3'	 => array('id'	 => 'U3', 'manufacturer'	 => 'Cessna',
			'model'	 => 'Citation M2')
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

	// retrieve a single plane by passing in the id, null if not found
	//example call in controller :  $this->fleet->get('U2');
	//
	//the return-value printed by print_r() is shown below:
	//
	//Array ( [id] => U2 [manufacturer] => Cessna [model] => Grand Caravan EX [key] => U2 ) 1
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}

	// retrieve all of the planes
	//example call in controller :  $this->fleet->all();
	public function all()
	{
		return $this->data;
	}

}
