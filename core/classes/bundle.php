<?php 

class Bundle {
	
	public $bundleid;
	public $code;
	public $name;
	public $volume;
	public $price;
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

    public function getTerms()
    {
    	$id = $this->bundleid;

    	switch ($id) {
    		case '1':
    			$var = "<p>
    					<li>5 mpbs </li>
    					<li>free modem and wifi plus digital box</li>
    					</p>";
    		break;

    		case '2':
    			$var = "<p>
    					<li>5 mpbs </li>
    					<li>free modem and wifi plus digital box</li>
    					</p>";
    		break;

    		case '3':
    			$var = "<p>
    					<li>5 mpbs </li>
    					<li>free modem and wifi plus digital box</li>
    					</p>";
    		break;

    		case '4':
    			$var = "<p>
    					<li>5 mpbs </li>
    					<li>free modem and wifi plus digital box</li>
    					</p>";
    		break;

    		case '5':
    			$var = "<p>
    					<li>5 mpbs </li>
    					<li>free modem and wifi plus digital box</li>
    					</p>";
    		break;
    		
    		default:
    			$var = "undefined description";
    			break;
    	}

    	return $var;
    }

    public function getBundleCodetoName()
    {
        $bundlecode = $this->code;
        switch ($bundlecode) {
            case 'A':
                $var = "Cable and Digital Service";
            break;
            case 'B':
                $var = "Internet Bundle Service";
            break;
            
            default:
                $var = "undefined";
            break;
        }

        return $var;
    }


    public function getBundlePrice()
    {
        $price = $this->price - 475;
        $var = "&#x20b1; ". $price.".00"; 
       

        return $var;
    }

    public function getAddedValue()
    {
        $var = $this->code;
        $var = $var[0];
        
        switch ($var) {
            case 'A':
                $var = 0;
            break;

            case 'B':
                $var = 475;
            break;

            case 'C':
                $var = 0;
            break;
             
            default:
                $var = 0;
            break;
         } 
         return $var;
    }

    public function getPrefix()
    {
        $var = $this->code;
        $var = $var[0];

        return $var;
    }

    public function getStatus()
    {
        $var = $this->status;

        switch ($var) {
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