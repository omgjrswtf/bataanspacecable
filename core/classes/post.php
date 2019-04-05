<?php 

class Post {
	
	public $poleid;
	public $parentmuni;
    public $parentbrgy;
	public $lat;
	public $long;
    public $active;
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
        $active  = $this->active;

        switch ($active) {

            case '0':
                $var = "deactive";
            break;

            case '1':
                $var = "active"; 
            break;
            
            default:
                $var = "undefined";
            break;
        }

        return $var;
    }

}

?>