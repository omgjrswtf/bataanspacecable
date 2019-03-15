<?php 

class Ipcr {
	
	public $id;
	public $wwt;
	public $ipcridno;
	public $ipcrempno;
	public $atcreate;

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