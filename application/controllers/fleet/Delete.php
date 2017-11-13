<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//Model for deleting plane.
class Delete extends Application
{

	/**
	 * Index Page for the Fleet controller.
	 *To delete plane.
	 *
	 */
	public function index($id)
	{
        //if it is the admin
        if ($this->session->userdata('userrole') == ROLE_OWNER) {
            //if it exists
            if($this->fleet-> exists($id)){
                $this->fleet->delete($id);
            }
        }

        redirect('/fleet');
	
	}



}
