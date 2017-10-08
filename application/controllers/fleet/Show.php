<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends Application
{

	/**
	 * Show Page for the Fleet controller.
	 * To display detail of the single clicked plane.
	 *
	 */
	public function index($key)
	{

		
		/*data of selected plane.*/
		$plane = $this->fleet->get($key);

		/*set pagetitle to the id of the plane.*/
		$this->data['pagetitle'] = $plane['id'];

		$this->data['pagebody'] = 'fleet/plane';

		/*table opening*/
		$table_open = '<table class="table table-striped table-hover">';

		/*table content ;a row shown as :   propertyName : propertyValue*/
		$table_content = "";

		foreach($plane as $key => $val) {
			$table_content .= "<tr>
          							<th>$key</th>
          							<td>$val</td>
        						</tr>";
		}

		/*table closing*/
		$table_close = '</table>'; 


		/*the table to display in the fleet/plane view*/
		$this->data['singlePlaneTable'] = $table_open .$table_content. $table_close;



		$this->render(); 
	}

}
