<?php 

class Client {
	
	public $clientid;
	public $fname;
	public $mname;
	public $lname;
	public $contact;
	public $gender;
	public $datebirth;
	public $email;
	public $password;
	public $status;
	public $activity;
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

    public function getGender()
    {
    	$gender = $this->gender;

	  switch ($gender) {
		  	case 'M':
		  		$var = "Sir";
		  	break;
		  	case 'F':
		  		$var = "Ma'am";
		  	break;
		  	
		  	default:
		  		$var = "undefined";
	  		break;

  	}	
  			return $var;

    }

    public function getActivity()
    {
    	$activity = $this->activity;

	  switch ($activity) {
		  	case '0':
		  		$var = "Non Validate";
		  	break;
		  	case '1':
		  		$var = "Verified Level 1 Passed";
		  	break;
		  	case '2':
		  		$var = "Verified Level 2 Passed";
		  	break;
		  	case '3':
		  		$var = "Verified Level 3 Passed";
		  	break;
		  	
		  	default:
		  		$var = "undefined";
	  		break;

  	}	
  			return $var;

    }

    public function getStatus()
    {
    	$status = $this->status;

    	switch ($status) {
    		case '1':
    			$var = "Active";
			break;
			case '2':
    			$var = "Inactive";
			break;
    		default:
    			$var = "Undefined";
			break;
    	}

    	return $var;

    }

}

?>