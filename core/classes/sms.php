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
    
    public function getStatus()
    {
        $var = $this->status;

        switch ($var) {
            case '0':
                $var = "Send";
                break;
            case '1':
                $var = "Not Sending";
                break;
            default:
                $var = "Undefined";
                break;
        }
        return $var;
    }
}

?>