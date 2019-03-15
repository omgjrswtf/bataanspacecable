<?php 

class Location {
	
	public $clientlocid;
	public $userid;
	public $unit;
	public $block;
	public $barangay;
	public $municipality;
	public $province;
	public $zipcode;
	public $description;
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

    public function getBlock(){
        $block = $this->block;

        if (empty($block) || is_null($block)) {
            $var = "";
        }else{
            $var = $block;
        }

        return $var;
    }

    public function getAddress(){

        $block = $this->block;

        if (empty($block) || is_null($block)) {
            $block = "";
        }
                
        $var = "$this->unit $block $this->barangay, $this->municipality, $this->province - $this->zipcode";
        return $var;
    }

}

?>