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

		$response = file_get_contents('https://wacky.jlparry.com/info/airplanes/');

		$this->allwackyplanecode = array();
		$this->allwackyplanes = array();
		$allwackyplanesjs = json_decode($response);
		
		foreach ($allwackyplanesjs as $oj) {
			//var_dump($oj);
			$this->allwackyplanecode[] = $oj->id;
			$this->allwackyplanes[$oj->id] = $oj;

		}
		//var_dump($allwackyplanes);




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


}

?>