<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends Application
{

	/**
	 * Index Page for the Fleet controller.
	 *To display all the planes.
	 *
	 */
	public function index()
	{

		if ($this->session->userdata('userrole') != ROLE_OWNER) {
            redirect('/fleet/');
        }

        $this->data['pagetitle']= "Add plane"; 
		$this->showit();
	}

	 private function showit()
    {
        $this->load->helper('form');

        $plane = (array)$this->fleet->create();
        $wplane = (array)$this-> airplanesWacky->getPlaneById_Remove_id_key("avanti");


      	 $plane = (object) array_merge($plane, $wplane);

      	//empty id input field
        $plane-> id = '';

        // var_dump($plane);
        // return;

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'id'  => form_label('id: ') . form_input('id', $plane->id,['class' => 'form-control']),
            'recognizedPlane' => form_label('recognized plane:').form_dropdown('wackyid',$this->airplanesWacky->getAllid(), $plane->wackyid, 'id="wackyselect"',['class' => 'form-control']),
             'zsubmit'    => form_submit('submit', 'Add the plane',['class' => 'btn btn-success']),
        );
        $this->data = array_merge($this->data, $fields);


        /*the table to display in the  view*/
        $this->data['infoPlaneTable'] = $this-> airplanesWacky->getPlaneTableById($plane->wackyid);



        $this->data['pagebody'] = '/fleet/planeadd';
        $this->render();
    }


    function submit() {

		$this->data['pagetitle']= "Add plane"; 


        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->fleet->addrules());

        //not valid
        if(!$this->form_validation->run()) {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
            $this->showit();
            return;
        }

        //get csv row template object
        $plane = (array) $this->fleet->create();
        //the seledted wacky plane
        $postedwackyid = $this->input->post()['wackyid'];
        $selecedwackyplane = (array) $this-> airplanesWacky->getPlaneById_Remove_id_key($postedwackyid);

        //the posted intended row
        $selecedwackyplane = array_merge($plane, $selecedwackyplane);
        $selecedwackyplane["id"] = $this->input->post()['id'];

        // add the csv
		$this->fleet->add($selecedwackyplane);



		$this->alert('Plane ' . $selecedwackyplane['id'] . ' updated', 'success');
        $this->data['pagetitle'] = $selecedwackyplane['id'];

		redirect('/fleet');

    }

                    // build a suitable error mesage
    private function alert($message) {
        $this->load->helper('html');  
        $this->data['pagetitle'] = "Error";       
        $this->data['error'] = heading($message,3);
    }


    function cancel() {
        $this->session->unset_userdata('plane');
        redirect('/fleet');
    }



}
