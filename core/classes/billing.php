<?php 

class Billing {
	
	public $billingid;
	public $subscriptionid;
	public $userid;
	public $adminid;
	public $dueyear;
	public $duedate;
	public $address;
	public $xcoor;
	public $ycoor;
	public $product;
	public $addon;
	public $added;
	public $active;
	public $status;
	public $create_at;
	public $update_at;


	//1 installation
	//2 monthly
	//3 payed
	//4 added payment
	public function __construct($data = null)
    {
        //echo 'The class "', __CLASS__, '" was created.<br />';
    }

    public function __destruct()	
    {
        //echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }


    public function getDate()
    {
    	$dateofyear = $this->duedate;
    	$year 		= $this->dueyear; 
   		$newDate = DateTime::createFromFormat('z Y', $dateofyear . ' ' . $year);
		$newDate = $newDate->format('d - m - Y'); // for example
  		return $newDate;
    }
    public function getStatus()
    {
    	$status = $this->active;
    	switch ($status) {
    		case '1':
    			$var = "Under Installation Process";
			break;
			case '2':
				$var = "Monthly Payment Process";
			break;
			case '3':
				$var = "Payed";
			break;
			case '4':
				$var = "Added Payment";
			break;

			case '5':
				$var = "Cut";
			break;

			case '6':
				$var = "Unpayed for two months";
			break;
    		
    		
    		default:
    			$var = "undefined";
    		break;
    	}
    	return $var;
    }

}

?>