<?php 

class Billing {
	
	public $billingid;
	public $subcriptionid;
	public $userid;
	public $username;
	public $usercontact;
	public $adminid;
	public $adminstatus;
	public $adminname;
	public $admincontact;
	public $dueyear;
	public $duedate;
	public $address;
	public $ycoor;
	public $xcoor;
	public $barangay;
	public $province;
	public $municipality;
	public $zipcode;
	public $active;
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

}

?>