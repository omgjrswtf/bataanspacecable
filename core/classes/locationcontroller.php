<?php 
require_once 'location.php';

class LocationController{
		protected $pdo;
		public $data;
		public $location;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function findLocation($location_id){

		$stmt = $this->pdo->prepare("
			SELECT
				clientloc_id as clientlocid,
				cl_userid as userid,
				cl_unit as unit,
				cl_block as block,
				cl_barangay as barangay,
				cl_municipality as municipality,
				cl_province as province,
				cl_zipcode as zipcode,
				cl_description as description,
				cl_status as status,
				cl_createat as create_at,
				cl_updateat as update_at
				
			FROM tbl_clientlocation 
			WHERE cl_userid = :cl_userid 
		");
		$stmt->bindParam(':cl_userid', $location_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function findLocationId($location_id){

		$stmt = $this->pdo->prepare("
			SELECT
				clientloc_id as clientlocid,
				cl_userid as userid,
				cl_unit as unit,
				cl_block as block,
				cl_barangay as barangay,
				cl_municipality as municipality,
				cl_province as province,
				cl_zipcode as zipcode,
				cl_description as description,
				cl_status as status,
				cl_createat as create_at,
				cl_updateat as update_at
				
			FROM tbl_clientlocation 
			WHERE clientloc_id = :clientloc_id 
		");
		$stmt->bindParam(':clientloc_id', $location_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}
	
	public function findLocationAll(){

		$stmt = $this->pdo->prepare("
			SELECT
				clientloc_id as clientlocid,
				cl_userid as userid,
				cl_unit as unit,
				cl_block as block,
				cl_barangay as barangay,
				cl_municipality as municipality,
				cl_province as province,
				cl_zipcode as zipcode,
				cl_description as description,
				cl_status as status,
				cl_createat as create_at,
				cl_updateat as update_at
				
			FROM tbl_clientlocation
		");
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function save(Location $location){
		$created_at = date('Y-m-d H:i:s');
		

	try {
	if (isset($location->clientlocid)) {
		return $this->update($location);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_clientlocation` (
			`cl_userid`,
			`cl_unit`,
			`cl_block`,
			`cl_barangay`,
			`cl_municipality`,
			`cl_province`,
			`cl_zipcode`,
			`cl_description`,
			`cl_status`,
			`cl_createat`,
			`cl_updateat`
			)
		VALUES (
			:cl_userid,
			:cl_unit,
			:cl_block,
			:cl_barangay,  
			:cl_municipality, 
			:cl_province, 
			:cl_zipcode,
			:cl_description,
			:cl_status,
			:cl_createat,
			:cl_updateat);
		");

		$stmt->bindParam(":cl_userid", $location->userid);
		$stmt->bindParam(":cl_unit", $location->unit);
		$stmt->bindParam(":cl_block", $location->block);
		$stmt->bindParam(":cl_barangay", $location->barangay);
		$stmt->bindParam(":cl_municipality", $location->municipality);
		$stmt->bindParam(":cl_province", $location->province);
		$stmt->bindParam(":cl_zipcode", $location->zipcode);
		$stmt->bindParam(":cl_description", $location->description);
		$stmt->bindParam(":cl_status", $location->status);
		$stmt->bindParam(":cl_createat", $created_at);
		$stmt->bindParam(":cl_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function update(Location $location)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE tbl_clientlocation 
		SET 
			cl_userid = :cl_userid,
			cl_unit = :cl_unit,
			cl_block = :cl_block,
			cl_barangay = :cl_barangay,
			cl_municipality = :cl_municipality,
			cl_province = :cl_province,
			cl_zipcode = :cl_zipcode,
			cl_description = :cl_description,
			cl_status = :cl_status,
			cl_createat = :cl_createat,
			cl_updateat = :cl_updateat
		WHERE clientloc_id = :clientloc_id
		");
		$stmt->bindParam(":clientloc_id", $location->clientlocid);
		$stmt->bindParam(":cl_userid", $location->userid);
		$stmt->bindParam(":cl_unit", $location->unit);
		$stmt->bindParam(":cl_block", $location->block);
		$stmt->bindParam(":cl_barangay", $location->barangay);
		$stmt->bindParam(":cl_municipality", $location->municipality);
		$stmt->bindParam(":cl_province", $location->province);
		$stmt->bindParam(":cl_zipcode", $location->zipcode);
		$stmt->bindParam(":cl_description", $location->description);
		$stmt->bindParam(":cl_status", $location->status);
		$stmt->bindParam(":cl_createat", $location->create_at);
		$stmt->bindParam(":cl_updateat", $update_at);
	
	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}
}
?>