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
		$plane = $this->fleet->get($key);

		/*set pagetitle to the id of the plane.*/
		$this->data['pagetitle'] = $plane['id'];

		$this->data['pagebody'] = 'fleet/plane';

		$table_open = '<table class="table table-striped table-hover">';

		$table_content = "";

		foreach($plane as $key => $val) {
			$table_content .= "<tr>
          							<th>$key</th>
          							<td>$val</td>
        						</tr>";
		}

		$table_close = '</table>'; 

		$this->data['singlePlaneTable'] = $table_open .$table_content. $table_close;



		$this->render(); 
	}

}
