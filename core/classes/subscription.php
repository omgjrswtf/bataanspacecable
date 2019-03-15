<?php 

class Subscription {
	
	public $subcriptionid;
	public $userid;
	public $username;
	public $usercontact;
	public $dueyear;
	public $duedate;
	public $xcoor;
	public $ycoor;
	public $types;
	public $status;
	public $active;
	public $create_at;
	public $update_at;

	public function __construct($data = null)
    {
        //echo 'The class "', __CLASS__, '" was created.<br />';
    }

    public function __destruct()	
    {
        //echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }

    public function getDateFromDay() {
    	$dateofyear = $this->duedate;
    	$year 		= $this->dueyear; 
   		$newDate = DateTime::createFromFormat('z Y', $dateofyear . ' ' . $year);
		$newDate = $newDate->format('d - m - Y'); // for example
  		return $newDate;
	}

	public function getStatus(){
		$status = $this->status;

		switch ($status) {
			case '1':
				$var = "Pending";
			break;
			case '2':
				$var = "Verified";
			break;
			case '3':
				$var = "On-going";
			break;
			case '4':
				$var = "Installed";
			break;
			case '5':
				$var = "Monthly Due";
			break;
			case '6':
				$var = "Uninstalled";
			break;

			default:
				$var = "undefined";
			break;
		}
			return $var;

	}

}

?>