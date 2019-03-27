<?php 

class Admin {
	
	public $adminid;
	public $firstname;
	public $middlename;
	public $lastname;
	public $username;
	public $password;
	public $address;
	public $datebirth;
	public $contact;
	public $email;
	public $role;
	public $status;
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

	public function getPosition()
    {
    	$status	= $this->role;

    	switch ($status) {
    		case '0':
    			$var = "Admin";	
			break;
			case '1':
				$var = "Cable Technician";
			break;
			case '2':
				$var = "IT";
			break;
			case '3':
				$var = "Clerk";
			break;
			case '4':
				$var = "Cashier";
			break;
			case '5':
				$var = "Manager";
			break;
    		default:
    			$var = "Undefined";
			break;
    	}

    		return $var;
    }
}

?>