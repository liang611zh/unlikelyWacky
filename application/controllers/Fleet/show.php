<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends Application
{

	/**
	 * Show Page for the Fleet controller.
	 * To display detail of the clicked plane.
	 *
	 */
	public function index($key)
	{

		
		/*data of selected plane.*/
		$this->data['plane'] = $this->fleet->get($key);

		/*set pagetitle to the id of the plane.*/
		$this->data['pagetitle'] = $this->data['plane']['id'];

		$this->data['pagebody'] = 'fleet/plane';

		$this->render(); 
	}

}
