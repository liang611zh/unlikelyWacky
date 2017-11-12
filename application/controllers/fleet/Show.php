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
        if ($this->session->userdata('userrole') == ROLE_OWNER) {
            redirect('/fleet/edit/' . $key);
        }

		/*data of selected plane.*/
		$plane = $this->fleet->get($key);

		/*set pagetitle to the id of the plane.*/
		$this->data['pagetitle'] = $plane->id;

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

    /**
     * Edit Page for the Fleet controller.
     * To edit detail of the single clicked plane.
     *
     */
    public function edit($id = null)
    {
        if ($id == null) {
            redirect('/fleet');
        }

        if ($this->session->userdata('userrole') != ROLE_OWNER) {
            redirect('/fleet/' . $id);
        }

        /*data of selected plane.*/
        $plane = $this->fleet->get($id);

        /*set pagetitle to the id of the plane.*/
        $this->data['pagetitle'] = $plane->id;

        $this->session->set_userdata('plane', $plane);


        $this->showit();
    }

    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
        $plane = $this->session->userdata('plane');
        $this->data['id'] = $plane->id;

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';

        

        $fields = array(
            'id'  => form_label('id: ') . form_input('id', $plane->id),
            'recognizedPlane' => form_label('recognized plane:').form_dropdown('wackyid',$this->airplanesWacky->getAllid(), $plane->wackyid),
            'fmanufacturer'  => form_label('Manufacturer') . form_input('manufacturer', $plane->manufacturer),
            'fmodel'      => form_label('Model') . form_input(array('name'=>'size','value' => $plane->model, 'readonly'=>'readonly')),
            'fprice'     => form_label('Price') . form_input('price', $plane->price),
            'fseats'     => form_label('Seats') . form_input('seats', $plane->seats),
            'freach'     => form_label('Reach') . form_input('reach', $plane->reach),
            'fcruise'     => form_label('Cruise') . form_input('cruise', $plane->cruise),
            'ftakeoff'     => form_label('Takeoff') . form_input('takeoff', $plane->takeoff),
            'fhourly'     => form_label('Hourly') . form_input('hourly', $plane->hourly),
            'zsubmit'    => form_submit('submit', 'Update the plane'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = '/fleet/planeedit';
        $this->render();
    }

    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->fleet->rules());

        // retrieve & update data transfer buffer
        $plane = (array) $this->session->userdata('plane');
        $plane = array_merge($plane, $this->input->post());
        $plane = (object) $plane;  // convert back to object
        $this->session->set_userdata('plane', (object) $plane);

        // validate away
        if ($this->form_validation->run())
        {
            if (empty($plane->id))
            {
                $plane->id = $this->fleet->highest() + 1;
                $this->fleet->add($plane);
                $this->alert('Plane ' . $plane->id . ' added', 'success');
            } else
            {
                $this->fleet->update($plane);
                $this->alert('Plane ' . $plane->id . ' updated', 'success');
            }
        } else
        {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }

                    // build a suitable error mesage
        private function alert($message) {
            $this->load->helper('html');        
            $this->data['error'] = heading($message,3);
        }

}
