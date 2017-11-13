<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$search = new stdClass();
		$search->departure = $this->input->post('departure');
		$search->destination = $this->input->post('destination');

		$validsearch = $this->flight->searchFlights("", "");
		$searchfields = array();
		$errors = array();
		if($this->input->post('departure')) {
		if(empty($search->departure))
			$errors[] = array('message' => "You have to select the departure Airport");
		if(empty($search->destination))
			$errors[] = array('message' => "You have to select the destination Airport");
		if(!strcmp($search->departure, $search->destination))
			$errors[] = array('message' => "Your departure and destination Airports cannot be the same");
		if(empty($errors))
			$validsearch = $this->flight->searchFlights($search->departure, $search->destination);
			$searchfields[] = array(	'departure' => $search->departure,
									'destination' => $search->destination);
		}
		$booking = array(
			'bookingtitle' => 'Book A Flight',
			'departureairport' => $this->flight->uniqueAirports(),
			'destinationairport' => $this->flight->uniqueAirports(),
			'searchbooking' => $validsearch,
			'error' => $errors,
			'searchfields' => $searchfields
		);
		
		
		$this->data['pagetitle'] = 'Welcome To UW';
		$this->data['pagebody'] = 'welcome_message';
		$this->data['booking'] = $this->parser->parse('booking', $booking, true);
		$this->data['number_flights'] = $this->flight->countFlights();
		$this->data['number_fleet'] = $this->fleet->countFleet();
		$this->data['airport'] = $this->flight->uniqueAirports();
		$this->render(); 
	}

}
