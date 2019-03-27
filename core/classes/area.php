<?php 

class Area {
	
	public $areaid;
	public $codebrgy;
	public $barangay;
	public $codemuni;
	public $municipality;
	public $codeprov;
	public $province;
	public $zipcode;
	public $status;
	public $description;
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