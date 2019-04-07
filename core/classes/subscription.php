<?php 

class Subscription {
	
	public $subcriptionid;
	public $userid;
	public $username;
	public $usercontact;
	public $dueyear;
	public $duedate;
	public $types;
	public $qtydg; //quantity of dgbox
	public $addon; //add on wiring computed
	public $added; //added bill for estimated value for end of month
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
		$newDate = $newDate->format('d-m-Y'); // for example
  		return $newDate;
	}

	public function getStatus(){
		$status = $this->status;

		switch ($status) {
			case '1':
				$var = "Pending";
			break;
			case '2':
				$var = "Verified and Address";
			break;
			case '3':
				$var = "On-going";
			break;
			case '4':
				if ($this->active == 0) {
					$var = "Done Installing";
				} else {
					$var = "Verifies - Waiting for bind techical";
				}
				
			break;
			case '5':
				$var = "Monthly Due";
			break;
			case '6':
				$var = "Uninstalled";
			break;

			case '7':
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