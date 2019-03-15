<?php 
require_once 'verify.php';

class VerifyController{
		protected $pdo;
		public $data;
		public $verify;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function findUserVerify($verify_id){

		$stmt = $this->pdo->prepare("
			SELECT
				verify_id as id,
				ver_userid as userid,
				ver_profbilling as profbilling,
				ver_id as profid,
				ver_xcoordinates as xcoor,
				ver_ycoordinates as ycoor,
				ver_stage as stage,
				ver_status as status,
				ver_createat as create_at,
				ver_updateat as update_at
				
			FROM tbl_veriyrequirement 
			WHERE ver_userid = :ver_userid 
		");
		$stmt->bindParam(':ver_userid', $verify_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Verify');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}


	public function findRealVerify($verify_id){

		$stmt = $this->pdo->prepare("
			SELECT
				verify_id as id,
				ver_userid as userid,
				ver_profbilling as profbilling,
				ver_id as profid,
				ver_xcoordinates as xcoor,
				ver_ycoordinates as ycoor,
				ver_stage as stage,
				ver_status as status,
				ver_createat as create_at,
				ver_updateat as update_at
				
			FROM tbl_veriyrequirement 
			WHERE ver_userid = :ver_userid and ver_stage = 3
		");
		$stmt->bindParam(':ver_userid', $verify_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Verify');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function findVerifyId($verify_id){

		$stmt = $this->pdo->prepare("
			SELECT
				verify_id as id,
				ver_userid as userid,
				ver_profbilling as profbilling,
				ver_id as profid,
				ver_xcoordinates as xcoor,
				ver_ycoordinates as ycoor,
				ver_stage as stage,
				ver_status as status,
				ver_createat as create_at,
				ver_updateat as update_at
				
			FROM tbl_veriyrequirement 
			WHERE verify_id = :verify_id 
		");
		$stmt->bindParam(':verify_id', $verify_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Verify');
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



	public function save(Verify $verify){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($verify->id)) {
		return $this->update($verify);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_veriyrequirement` (
			`ver_userid`,
			`ver_profbilling`,
			`ver_id`,
			`ver_xcoordinates`,
			`ver_ycoordinates`,
			`ver_stage`,
			`ver_status`,
			`ver_createat`,
			`ver_updateat`
			)
		VALUES (
			:ver_userid,
			:ver_profbilling,
			:ver_id,
			:ver_xcoordinates,  
			:ver_ycoordinates, 
			:ver_stage, 
			:ver_status,
			:ver_createat,
			:ver_updateat);
		");

		$stmt->bindParam(":ver_userid", $verify->userid);
		$stmt->bindParam(":ver_profbilling", $verify->profbilling);
		$stmt->bindParam(":ver_id", $verify->profid);
		$stmt->bindParam(":ver_xcoordinates", $verify->xcoor);
		$stmt->bindParam(":ver_ycoordinates", $verify->ycoor);
		$stmt->bindParam(":ver_stage", $verify->stage);
		$stmt->bindParam(":ver_status", $verify->status);
		$stmt->bindParam(":ver_createat", $created_at);
		$stmt->bindParam(":ver_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function update(Verify $verify)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE tbl_veriyrequirement 
		SET 
			verify_id = :verify_id,
			ver_userid = :ver_userid,
			ver_profbilling = :ver_profbilling,
			ver_id = :ver_id,
			ver_xcoordinates = :ver_xcoordinates,
			ver_ycoordinates = :ver_ycoordinates,
			ver_stage = :ver_stage,
			ver_status = :ver_status,
			ver_createat = :ver_createat,
			ver_updateat = :ver_updateat
		WHERE verify_id = :verify_id
		");
		$stmt->bindParam(":verify_id", $verify->id);
		$stmt->bindParam(":ver_userid", $verify->userid);
		$stmt->bindParam(":ver_profbilling", $verify->profbilling);
		$stmt->bindParam(":ver_id", $verify->profid);
		$stmt->bindParam(":ver_xcoordinates", $verify->xcoor);
		$stmt->bindParam(":ver_ycoordinates", $verify->ycoor);
		$stmt->bindParam(":ver_stage", $verify->stage);
		$stmt->bindParam(":ver_status", $verify->status);
		$stmt->bindParam(":ver_createat", $verify->create_at);
		$stmt->bindParam(":ver_updateat", $verify->update_at);
	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}
}
?>