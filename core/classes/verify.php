<?php 

class Verify {
	
	public $id;
	public $userid;
	public $profbilling;
	public $profid;
	public $xcoor;
	public $ycoor;
	public $stage;
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

      public function getActivity()
    {
    	$activity = $this->stage;

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

}

?>