<?php 
require_once 'sms.php';

class SmsController{
		protected $pdo;
		public $data;
		public $sms;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function findUserAllMessage($client_id){

		$stmt = $this->pdo->prepare("
			SELECT
				send_id as id,
				snd_userid as userid,
				snd_message as message,
				snd_contact as contact,
				snd_transactionid as transactionid,
				snd_status as status,
				snd_createat as create_at
			FROM 
				tbl_sms

			WHERE snd_userid = :snd_userid
			
		");
		$stmt->bindParam(':snd_userid', $client_id);
		$stmt->execute();

    	$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Sms');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

	    return $results;
	}

	// public function findVerifyId($verify_id){

	// 	$stmt = $this->pdo->prepare("
	// 		SELECT
	// 			verify_id as id,
	// 			ver_userid as userid,
	// 			ver_profbilling as profbilling,
	// 			ver_id as profid,
	// 			ver_xcoordinates as xcoor,
	// 			ver_ycoordinates as ycoor,
	// 			ver_stage as stage,
	// 			ver_status as status,
	// 			ver_createat as create_at,
	// 			ver_updateat as update_at
				
	// 		FROM tbl_veriyrequirement 
	// 		WHERE verify_id = :verify_id 
	// 	");
	// 	$stmt->bindParam(':verify_id', $verify_id);
	// 	$stmt->execute();

	//     $stmt->setFetchMode(PDO::FETCH_CLASS, 'Verify');
	//     $results = $stmt->fetch();

	//     $this->json = json_encode($results);
	//     $this->data = json_decode($this->json);

	//     return $results;
	// }

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

	public function findSmslog(){
		$stmt = $this->pdo->prepare("
			SELECT
				send_id as id,
				snd_userid as userid,
				snd_message as message,
				snd_contact as contact,
				snd_transactionid as transactionid,
				snd_status as status,
				snd_createat as create_at
			FROM 
				tbl_sms
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Sms');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}


	public function save(Sms $sms){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($sms->id)) {
		return $this->update($verify);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_sms` (
			`snd_userid`,
			`snd_message`,
			`snd_contact`,
			`snd_transactionid`,
			`snd_status`,
			`snd_createat`,
			`snd_updateat`
			)
		VALUES (
			:snd_userid,
			:snd_message,
			:snd_contact,
			:snd_transactionid,
			:snd_status,
			:snd_createat,
			:snd_updateat);
		");
		$stmt->bindParam(":snd_userid", $sms->userid);
		$stmt->bindParam(":snd_message", $sms->message);
		$stmt->bindParam(":snd_contact", $sms->contact);
		$stmt->bindParam(":snd_transactionid", $sms->transactionid);
		$stmt->bindParam(":snd_status", $sms->status);
		$stmt->bindParam(":snd_createat", $created_at);
		$stmt->bindParam(":snd_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	// public function update(Verify $verify)
	// {

	// try {
	// $update_at = date('Y-m-d H:i:s');
	// $stmt = $this->pdo->prepare("
	// 	UPDATE tbl_veriyrequirement 
	// 	SET 
	// 		verify_id = :verify_id,
	// 		ver_userid = :ver_userid,
	// 		ver_profbilling = :ver_profbilling,
	// 		ver_id = :ver_id,
	// 		ver_xcoordinates = :ver_xcoordinates,
	// 		ver_ycoordinates = :ver_ycoordinates,
	// 		ver_stage = :ver_stage,
	// 		ver_status = :ver_status,
	// 		ver_createat = :ver_createat,
	// 		ver_updateat = :ver_updateat
	// 	WHERE verify_id = :verify_id
	// 	");
	// 	$stmt->bindParam(":verify_id", $verify->id);
	// 	$stmt->bindParam(":ver_userid", $verify->userid);
	// 	$stmt->bindParam(":ver_profbilling", $verify->profbilling);
	// 	$stmt->bindParam(":ver_id", $verify->profid);
	// 	$stmt->bindParam(":ver_xcoordinates", $verify->xcoor);
	// 	$stmt->bindParam(":ver_ycoordinates", $verify->ycoor);
	// 	$stmt->bindParam(":ver_stage", $verify->stage);
	// 	$stmt->bindParam(":ver_status", $verify->status);
	// 	$stmt->bindParam(":ver_createat", $verify->create_at);
	// 	$stmt->bindParam(":ver_updateat", $verify->update_at);
	// return $stmt->execute();

	// } catch (PDOException $ex) {
	// 	echo $ex->getMessage();
	// 	}
	// }

	function send($sms)
	{

		$ch = curl_init();
		$parameters = array(
		    'apikey' => '2576aa2870a5ac518220f119255bb9fb', //Your API KEY
		    'number' => "63".substr($sms->contact, -10),
		    'message' => $sms->message,
		    'sendername' => 'SEMAPHORE'
		);
		curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec( $ch );
		curl_close ($ch);

		//Show the server response
		// echo $output;

	}
}
?>