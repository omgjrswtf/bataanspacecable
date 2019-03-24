<?php 

class Verifyschedule {
	
	public $id;
	public $userid;
	public $profbilling;
	public $profbillingpic;
	public $profid;
	public $profidpic;
	public $date;
	public $year;
	public $stage;
	public $status;
	public $create_at;
	public $update_at;


	public $fname;
	public $mname;
	public $lname;

	public function __construct($data = null)
    {
        //echo 'The class "', __CLASS__, '" was created.<br />';
    }

    public function __destruct()	
    {
        //echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }

   
    public function getDateFromDay() {
    	$dateofyear = $this->date;
    	$year 		= $this->year; 
   		$newDate = DateTime::createFromFormat('z Y', $dateofyear . ' ' . $year);
		$newDate = $newDate->format('d - m - Y'); // for example
  		return $newDate;
	}

	  public function getClientName() {
    	$fname = $this->fname;
    	$mname = $this->mname;
    	$lname = $this->lname;

    	$newname = $fname." ".$mname." ".$lname;
  		return ucwords($newname);
	}


}

?>