<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Flights extends Application {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$role = $this->session->userdata('userrole');

       	$this->data['flights'] = $this->flight->all();
		$this->data['pagetitle'] = 'Scheduled Flights ('. $role . ')';
		$this->data['pagebody'] = 'flights';
        if ($role == ROLE_OWNER){
       		$this->data['pagination'] = $this->parser->parse('itemadd',[], true);
			$this->data['pagebody'] = 'flightadmin';
    	}elseif($role == ROLE_GUEST){
       		$this->data['pagination'] = $this->parser->parse('emptydiv',[], true);
			$this->data['pagebody'] = 'flights';
    	}
		$this->render();
	}

	public function add()
	{
		$role = $this->session->userdata('userrole');

		$this->data['pagetitle'] = 'Add New Schedule ('. $role . ')';
		$this->showit();
	}

	public function edit()
	{
		$role = $this->session->userdata('userrole');

		$this->data['pagetitle'] = 'Add New Schedule ('. $role . ')';
		$this->data['pagebody'] = 'addflights';
    	$this->render();
	}

public function submit()
    {
        // setup for validation
        // retrieve & update data transfer buffer
        $pa = (array) $this->session->userdata('pa');
        $pa = array_merge($pa, $this->input->post());
        $pa = (object) $pa;  // convert back to object
        $this->session->set_userdata('pa', (object) $pa);

        $pa->id = $this->flight->highest() + 1;
        $this->flight->add($pa);
        $this->index();
    }

private function showit()
    {
        $this->load->helper('form');
        $pa = $this->session->userdata('flight');
        $this->data['id'] = $pa->id;

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'id'  => form_label('id: ') . form_input('planeId', $pa->planeId,['class' => 'form-control']),
            'fdepartureAirport'  => form_label('Departure Airport') . form_input('departureAirport', $pa->departureAirport,['class' => 'form-control']),
			'fdepartureTime'  => form_label('Departure Time') . form_input('departureTime', $pa->departureTime,['class' => 'form-control']),
            'farrivalAirport'  => form_label('Arrival Airport') . form_input('arrivalAirport', $pa->arrivalAirport,['class' => 'form-control']),
			'farrivalTime'  => form_label('Arrival Time') . form_input('arrivalTime', $pa->arrivalTime,['class' => 'form-control']),
            'fsubmit'    => form_submit('submit', 'Submit',['class' => 'btn btn-primary btn-lg btn-block'])
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'addflights';
        $this->render();
    }

	public function delete() 
    {
		// retrieve & update data transfer buffer
        $plane = (array) $this->session->userdata('flight');
        $plane = array_merge($plane, $this->input->post());
        $plane = (object) $plane;  // convert back to object
        $this->session->set_userdata('flight', (object) $plane);
       if (empty($plane->id))
        	$this->flight->delete($plane);
    	else
    		 $this->flight->delete($plane);
    }

	function cancel() {
    	$this->session->unset_userdata('flight');
    	redirect('/flights');
	}

}