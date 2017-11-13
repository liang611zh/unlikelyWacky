<?php

/*
 * Model for getting shared plane data in wacky server.
 * 
 * 
*/
class AirplanesWacky extends My_Model {

	protected $allwackyplanecode;
	protected $allwackyplanes;

	/*
	* constructor.
	*
	*/
	public function __construct() {

		 function get_url_contents($url){  
		  if (function_exists('file_get_contents')) {  
		    $result = @file_get_contents($url);  
		 }  
		  if ($result == '') {  
		    $ch = curl_init();  
		    $timeout = 30;  
		    curl_setopt($ch, CURLOPT_URL, $url);  
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
		    $result = curl_exec($ch);  
		    curl_close($ch);  
		  }  
		  return $result;  
		}
		//$response = file_get_contents('https://wacky.jlparry.com/info/airplanes/');
		$url='https://wacky.jlparry.com/info/airplanes/';
		$response = get_url_contents($url);
		
		$this->allwackyplanecode = array();
		$this->allwackyplanes = array();
		$allwackyplanesjs = json_decode($response);
		
		foreach ($allwackyplanesjs as $oj) {
			//var_dump($oj);
			$this->allwackyplanecode[$oj->id] = $oj->id;
			$this->allwackyplanes[$oj->id] = $oj;

		}
		//var_dump($this->allwackyplanecode);


	}

	public function getAllid() {
		return $this->allwackyplanecode;
	}

	/*
	*  Get plane object by passing in the the wacky server's plane id.
	*  
	*   
	*  Return a shared plane object.
	*
	* Example call in controller : var_dump($this->airplanesWacky->getPlaneById("caravan"));
	*  return : 
	*
	* 	object(stdClass)[34]
	*		  public 'id' => string 'caravan' (length=7)
	*		  public 'manufacturer' => string 'Cessna' (length=6)
	*		  public 'model' => string 'Grand Caravan EX' (length=16)
	*		  public 'price' => string '2300' (length=4)
	*		  public 'seats' => string '14' (length=2)
	*		  public 'reach' => string '1689' (length=4)
	*		  public 'cruise' => string '340' (length=3)
	*		  public 'takeoff' => string '660' (length=3)
	*		  public 'hourly' => string '389' (length=3)
	*  
	*/
	public function getPlaneById($id) {
		$oneplane = $this->allwackyplanes[$id];
		return $oneplane;
	}

	public function getPlaneById_Remove_id_key($id) {
		$oneplane = $this->allwackyplanes[$id];

		foreach ($oneplane as $key => $value) {
			if($key == "id") {
				$oneplane->wackyid = $value;

			}
		}


		
		//var_dump($oneplane);
		return $oneplane;
	}

	public function getPlaneTableById($id) {
		$oneplane = $this->allwackyplanes[$id];

		/*table opening*/
        $infotable_open = '<table class="table table-striped table-hover">';

        /*table content ;a row shown as :   propertyName : propertyValue*/
        $infotable_content = "";

        foreach($oneplane as $key => $val) {

            //exclude id row; because it causes confusion
            if($key == 'id') {
                continue;
            }

            $infotable_content .= "<tr>
                                    <th>$key</th>
                                    <td>$val</td>
                                </tr>";
        }

        /*table closing*/
        $infotable_close = '</table>';

        $infotable = $infotable_open .$infotable_content. $infotable_close;
		
		return $infotable;
	}


}

?>