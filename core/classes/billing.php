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