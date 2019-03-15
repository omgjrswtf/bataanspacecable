<?php 

class Sms {
	

	public $id;
	public $userid;
	public $messege;
	public $contact;
	public $transactionid;
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