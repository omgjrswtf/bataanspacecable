<?php 
// The Multiple Indicator Cluster Surveys (MICS) 
class Mic {
	
	public $mics_id;
	public $bundleft; //bundle in ft price
	public $bundledgb; //dgital box price
	public $createat; //date create
	public $updateat; //date update

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