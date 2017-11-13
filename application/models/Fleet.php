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

//get all fleets id
    public function allid()
    {

        $this->allfleetcode = array();
        $allfleets = $this->all();

        foreach ($allfleets as $oj) {
            //var_dump($oj);
            $this->allfleetcode[$oj->id] = $oj->id;}

        return $this->allfleetcode;
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
        //var_dump($id[0]);
        //check U and set size

        if(empty($id)) {
            $this->form_validation->set_message('id', 'The {field} field is required.');
                return FALSE;
        }
        if ($id[0] != 'U' || strlen($id) <= 1 || strlen($id) > 3)
        {
                $this->form_validation->set_message('id', 'The {field} field should start with U and end with a number.The max length is 3');
                return FALSE;
        }
        else
        {
            //check ends with a number
            $numafterU = (substr($id, 1));

            for ($i=0; $i<strlen($numafterU); $i++) {  

                if( ! is_numeric($numafterU[$i]) ) {
                    $this->form_validation->set_message('id', 'The {field} field should start with U and end with a number.The max length is 3');
                    return FALSE;
                } 
            }  

                //echo "checking";
                return TRUE;
        }
    }



    //here to check the wacky id
    public function recognizedPlane_check($wackyid) {

        $allid = $this->airplanesWacky->getAllid();

        foreach ($allid as $value) {
            if($wackyid == $value) {
                return TRUE;
            }
        }
       $this->form_validation->set_message('wackyselect', 'The {field} field is not valid');
                
        return FALSE;
    }

    //rules for add action
    public function addrules()
    {
        $config = array(
            ['field' => 'id', 'label' => 'id', 'rules' => array(
                'required', 
                //here specify the custom rule
                //second field tells where to find the validation funcs
                array('id', array($this->fleet, 'id_add_check'))
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

    //here to check the plane id; in the add action
    public function id_add_check($id) {


        if($this->fleet->id_check($id) == FALSE) {
            $this->form_validation->set_message('id', 'The {field} field should start with U.');
            return FALSE;
        }


        $bool = $this->fleet->exists($id)? FALSE : TRUE;
        if ($bool == FALSE)
        {
            $this->form_validation->set_message('id', 'The {field} field exists.');
            return FALSE;  
        }
        else
        {
                //echo "checking";
                return TRUE;
        }
    }

}
