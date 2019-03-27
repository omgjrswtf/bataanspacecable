<?php 
require_once 'verifyschedule.php';

class VerifyscheduleController{
		protected $pdo;
		public $data;
		public $verifyschedule;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function findUserVerify($verify_id){

		$stmt = $this->pdo->prepare("
			SELECT
				verifysched_id as id,
				vsch_userid as userid,
				vsch_billing as profbilling,
				vsch_billingpic as profbillingpic,
				vsch_id as profid,
				vsch_idpic as profidpic,
				vsch_date as `date`,
				vsch_year as year,
				vsch_stage as stage,
				vsch_status as status,
				vsch_createat as create_at,
				vsch_updateat as update_at
				
			FROM tbl_verifyschedule 
			WHERE vsch_userid = :vsch_userid
		");
		$stmt->bindParam(':vsch_userid', $verify_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Verifyschedule');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function findUser($verify_id){

		$stmt = $this->pdo->prepare("
			SELECT
				verifysched_id as id,
				vsch_userid as userid,
				vsch_billing as profbilling,
				vsch_billingpic as profbillingpic,
				vsch_id as profid,
				vsch_idpic as profidpic,
				vsch_date as `date`,
				vsch_year as year,
				vsch_stage as stage,
				vsch_status as status,
				vsch_createat as create_at,
				vsch_updateat as update_at
				
			FROM tbl_verifyschedule 
			WHERE vsch_userid = :vsch_userid
		");
		$stmt->bindParam(':vsch_userid', $verify_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Verifyschedule');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}


	public function findIdVerify($verify_id){

		$stmt = $this->pdo->prepare("
			SELECT
				verifysched_id as id,
				vsch_userid as userid,
				vsch_billing as profbilling,
				vsch_billingpic as profbillingpic,
				vsch_id as profid,
				vsch_idpic as profidpic,
				vsch_date as `date`,
				vsch_year as year,
				vsch_stage as stage,
				vsch_status as status,
				vsch_createat as create_at,
				vsch_updateat as update_at
				
			FROM tbl_verifyschedule 
			WHERE verifysched_id = :verifysched_id 
		");
		$stmt->bindParam(':verifysched_id', $verify_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Verifyschedule');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	// public function findLocationId($location_id){

	// 	$stmt = $this->pdo->prepare("
	// 		SELECT
	// 			clientloc_id as clientlocid,
	// 			cl_userid as userid,
	// 			cl_unit as unit,
	// 			cl_block as block,
	// 			cl_barangay as barangay,
	// 			cl_municipality as municipality,
	// 			cl_province as province,
	// 			cl_zipcode as zipcode,
	// 			cl_description as description,
	// 			cl_status as status,
	// 			cl_createat as create_at,
	// 			cl_updateat as update_at
				
	// 		FROM tbl_clientlocation 
	// 		WHERE clientloc_id = :clientloc_id 
	// 	");
	// 	$stmt->bindParam(':clientloc_id', $location_id);
	// 	$stmt->execute();

	//     $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
	//     $results = $stmt->fetch();

	//     $this->json = json_encode($results);
	//     $this->data = json_decode($this->json);

	//     return $results;
	// }
	
	// public function findAreas(){
	// 	$stmt = $this->pdo->prepare("
	// 		SELECT
	// 			areaid as areaid,
	// 			ar_codebrgy as codebrgy,
	// 			ar_barangay as barangay,
	// 			ar_codemuni as codemuni,
	// 			ar_municipality as municipality,
	// 			ar_codeprov as codeprov,
	// 			ar_province as province,
	// 			ar_zipcode as zipcode,
	// 			ar_status as status,
	// 			ar_description as description,
	// 			ar_createat as create_at,
	// 			ar_updateat as update_at
				
	// 		FROM ref_areas 
	// 	");
	// 	$stmt->execute();

	// 	$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Area');
	// 	$results = $stmt->fetchAll();
		
	// 	$this->json = json_encode($results);
	// 	$this->data = json_decode($this->json);

	// 	return $results;
	// }
	
	public function findVerifySched(){
		$stmt = $this->pdo->prepare("
			SELECT
				verifysched_id as id,
				vsch_userid as userid,
				vsch_billing as profbilling,
				vsch_billingpic as profbillingpic,
				vsch_id as profid,
				vsch_idpic as profidpic,
				vsch_date as `date`,
				vsch_year as year,
				vsch_stage as stage,
				vsch_status as status,
				vsch_createat as create_at,
				vsch_updateat as update_at,
				c_fname AS fname, 
				c_mname AS mname,
				c_lname AS lname
				
			FROM tbl_verifyschedule 
			INNER JOIN `tbl_client`
			    ON (`vsch_userid` = `client_id`)
			where vsch_stage = 1;
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Verifyschedule');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findVerifyAccepted(){
		$stmt = $this->pdo->prepare("
			SELECT
				verifysched_id AS id,
				vsch_userid AS userid,
				vsch_billing AS profbilling,
				vsch_billingpic AS profbillingpic,
				vsch_id AS profid,
				vsch_idpic AS profidpic,
				vsch_date AS `date`,
				vsch_year AS `year`,
				vsch_stage AS stage,
				vsch_status AS STATUS,
				vsch_createat AS create_at,
				vsch_updateat AS update_at,
				c_fname AS fname, 
				c_mname AS mname,
				c_lname AS lname
				
			FROM tbl_verifyschedule 
			  INNER JOIN `tbl_client`
			    ON (`vsch_userid` = `client_id`)
			WHERE vsch_stage = 2;
					");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Verifyschedule');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findVerifyOngoing(){
		$stmt = $this->pdo->prepare("
			SELECT
				verifysched_id as id,
				vsch_userid as userid,
				vsch_billing as profbilling,
				vsch_billingpic as profbillingpic,
				vsch_id as profid,
				vsch_idpic as profidpic,
				vsch_date as `date`,
				vsch_year as year,
				vsch_stage as stage,
				vsch_status as status,
				vsch_createat as create_at,
				vsch_updateat as update_at,
				c_fname AS fname, 
				c_mname AS mname,
				c_lname AS lname
				
			FROM tbl_verifyschedule 
			  	INNER JOIN `tbl_client`
			    ON (`vsch_userid` = `client_id`)
			where vsch_stage = 3;
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Verifyschedule');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}


	public function save(Verifyschedule $verifyschedule){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($verifyschedule->id)) {
		return $this->update($verifyschedule);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_verifyschedule` (
			`vsch_userid`,
			`vsch_billing`,
			`vsch_billingpic`,
			`vsch_id`,
			`vsch_idpic`,
			`vsch_date`,
			`vsch_year`,
			`vsch_stage`,
			`vsch_status`,
			`vsch_createat`,
			`vsch_updateat`
			)
		VALUES (
			:vsch_userid,
			:vsch_billing,
			:vsch_billingpic,
			:vsch_id,
			:vsch_idpic,
			:vsch_date,  
			:vsch_year, 
			:vsch_stage, 
			:vsch_status,
			:vsch_createat,
			:vsch_updateat);
		");
	
		$stmt->bindParam(":vsch_userid", $verifyschedule->userid);
		$stmt->bindParam(":vsch_billing", $verifyschedule->profbilling);
		$stmt->bindParam(":vsch_billingpic", $verifyschedule->profbillingpic);
		$stmt->bindParam(":vsch_id", $verifyschedule->profid);
		$stmt->bindParam(":vsch_idpic", $verifyschedule->profidpic);
		$stmt->bindParam(":vsch_date", $verifyschedule->date);
		$stmt->bindParam(":vsch_year", $verifyschedule->year);
		$stmt->bindParam(":vsch_stage", $verifyschedule->stage);
		$stmt->bindParam(":vsch_status", $verifyschedule->status);
		$stmt->bindParam(":vsch_createat", $created_at);
		$stmt->bindParam(":vsch_updateat", $created_at);
		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}


	public function saveonce(Verifyschedule $verifyschedule){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($verifyschedule->id)) {
		return $this->update($verifyschedule);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_verifyschedule` (
			`vsch_userid`,
			`vsch_billing`,
			`vsch_billingpic`,
			`vsch_date`,
			`vsch_year`,
			`vsch_stage`,
			`vsch_status`,
			`vsch_createat`,
			`vsch_updateat`
			)
		VALUES (
			:vsch_userid,
			:vsch_billing,
			:vsch_billingpic,
			:vsch_date,  
			:vsch_year, 
			:vsch_stage, 
			:vsch_status,
			:vsch_createat,
			:vsch_updateat);
		");
	
		$stmt->bindParam(":vsch_userid", $verifyschedule->userid);
		$stmt->bindParam(":vsch_billing", $verifyschedule->profbilling);
		$stmt->bindParam(":vsch_billingpic", $verifyschedule->profbillingpic);
		$stmt->bindParam(":vsch_date", $verifyschedule->date);
		$stmt->bindParam(":vsch_year", $verifyschedule->year);
		$stmt->bindParam(":vsch_stage", $verifyschedule->stage);
		$stmt->bindParam(":vsch_status", $verifyschedule->status);
		$stmt->bindParam(":vsch_createat", $created_at);
		$stmt->bindParam(":vsch_updateat", $created_at);
		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function update(Verifyschedule $verifyschedule)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE tbl_verifyschedule 
		SET 
			verifysched_id = :verifysched_id,
			vsch_userid = :vsch_userid,
			vsch_billing = :vsch_billing,
			vsch_billingpic = :vsch_billingpic,
			vsch_id = :vsch_id,
			vsch_idpic = :vsch_idpic,
			vsch_date = :vsch_date,
			vsch_year = :vsch_year,
			vsch_stage = :vsch_stage,
			vsch_status = :vsch_status,
			vsch_createat = :vsch_createat,
			vsch_updateat = :vsch_updateat
		WHERE verifysched_id = :verifysched_id
		");
		$stmt->bindParam(":verifysched_id", $verifyschedule->id);
		$stmt->bindParam(":vsch_userid", $verifyschedule->userid);
		$stmt->bindParam(":vsch_billing", $verifyschedule->profbilling);
		$stmt->bindParam(":vsch_billingpic", $verifyschedule->profbillingpic);
		$stmt->bindParam(":vsch_id", $verifyschedule->profid);
		$stmt->bindParam(":vsch_idpic", $verifyschedule->profidpic);
		$stmt->bindParam(":vsch_date", $verifyschedule->date);
		$stmt->bindParam(":vsch_year", $verifyschedule->year);
		$stmt->bindParam(":vsch_stage", $verifyschedule->stage);
		$stmt->bindParam(":vsch_status", $verifyschedule->status);
		$stmt->bindParam(":vsch_createat", $verifyschedule->create_at);
		$stmt->bindParam(":vsch_updateat", $update_at);
	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}
}
?>