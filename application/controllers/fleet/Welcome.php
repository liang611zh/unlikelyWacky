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

		$this->data['pagetitle'] = 'Fleet';

		/*retrieve data of all the planes.*/
		$this->data['planes'] = $this->fleet->all();

		$this->data['pagebody'] = 'fleet/fleetindex';
		$this->render(); 
	}

}
