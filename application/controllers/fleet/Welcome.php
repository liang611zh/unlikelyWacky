<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	/**
	 * Index Page for the Fleet controller.
	 *To display all the planes.
	 *
	 */
	public function index()
	{

		$role = $this->session->userdata('userrole');
		$this->data['pagetitle'] = 'Fleet ('. $role . ')';

		/*retrieve data of all the planes.*/
		$this->data['planes'] = $this->fleet->all();

		if($role == ROLE_OWNER) {
            $this->data['pagebody'] = 'fleet/fleetindexx';
            $this->data['add'] = $this->parser->parse('fleet/addnav',[], true);
        } else {
            $this->data['pagebody'] = 'fleet/fleetindex';
        }
		$this->render();
	}

}
