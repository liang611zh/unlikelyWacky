<?php

/**
 * This is a CSV model for fleet.
 * Data are from models/fleet.csv
 * @author Kent Huang
 */
class Fleet extends CSV_Model
{

	// Constructor
	//load fleet.csv
	public function __construct()
	{
		parent::__construct(APPPATH . '../data/fleet.csv', 'id');
	}

	public function countFleet()
	{
		return count($this->all());
	}

    // provide form validation rules

    public function rules()
    {
        $config = array(
            ['field' => 'id', 'label' => 'id', 'rules' => array(
                'required', 
                //here specify the custom rule
                //second field tells where to find the validation funcs
                array('id', array($this->fleet, 'id_check'))
                )
             ],
             ['field' => 'wackyid', 'label' => 'recognizedPlane', 'rules' => array( 
                //here specify the custom rule
                //second field tells where to find the validation funcs
                array('wackyselect', array($this->fleet, 'recognizedPlane_check'))
                )
             ],
        );
        return $config;
    }


    //here to check the plane id
    public function id_check($id) {
        if ($id == 'wrong')
        {
                $this->form_validation->set_message('id', 'The {field} field should start with U and must be unique.');
                return FALSE;
        }
        else
        {
                //echo "checking";
                return TRUE;
        }
    }



    //here to check the wacky id
    public function recognizedPlane_check($wackyid) {

        $allid = $this->airplanesWacky->getAllid();
        var_dump($wackyid);
        var_dump($allid);

        foreach ($allid as $value) {
            if($wackyid == $value) {
                return TRUE;
            }
        }
       $this->form_validation->set_message('wackyselect', 'The {field} field is not valid');
                
        return FALSE;
    }
}
