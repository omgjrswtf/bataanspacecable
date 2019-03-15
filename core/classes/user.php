<?php 

class User {
	
	public $userid;
	public $username;
	public $employee;
	public $upcrno;
	public $password;
	public $active;
	public $status;
	public $atcreate;
	public $atupdate;
	
	public function __construct($data = null)
    {
        //echo 'The class "', __CLASS__, '" was created.<br />';
    }

    public function __destruct()	
    {
        //echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }
	public function getPosition()
    {
    	$status	= $this->status;

    	switch ($status) {
    		case '1':
    			$var = "Admin";	
			break;
			case '2':
				$var = "First Level";
			break;
			case '3':
				$var = "CCTV Operator";
			break;
    		default:
    			$var = "Undefined";
			break;
    	}

    		return $var;
    }

    public function getStatus()
	{
    	$remark = $this->active;

    	switch ($remark) {
    		case '1':
    			$var = "active";
			break;
    		case '0':
    			$var = "deactivate";
			break;
    		default:
    			$var = "Undefined";
			break;
    	}

    	return $var;
	}

}

?>