<?php 
require_once 'billing.php';

class billingController{
		protected $pdo;
		public $data;
		public $billing;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function billingschedData($billing_id){

		$stmt = $this->pdo->prepare("
			SELECT
				billing_id AS billingid ,
				bl_subscriptionid AS subscriptionid ,
				bl_userid AS userid ,
				bl_adminid AS adminid ,
				bl_dueyear AS dueyear ,
				bl_duedate AS duedate ,
				bl_address AS address ,
				bl_xcoordinates AS xcoor ,
				bl_ycoordinates AS ycoor ,
				bl_product AS product ,
				bl_addon AS addon ,
				bl_added AS added ,
				bl_active AS active ,
				bl_status AS 'status' ,
				bl_createat AS create_at ,
				bl_updateat AS update_at
				
			FROM tbl_billing 
			WHERE billing_id = :billing_id 
		");
		$stmt->bindParam(':billing_id', $billing_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'billing');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	// public function billingCode($billing_code){
  
	// 	$stmt = $this->pdo->prepare("
	// 		SELECT
	// 			billing_id as billingid,
	// 			b_code as code,
	// 			b_name as name,
	// 			b_volume as volume,
	// 			b_price as price,
	// 			b_status as status,
	// 			b_createat as create_at,
	// 			b_updateat as update_at
				
	// 		FROM ref_billings 
	// 		WHERE b_code = :bl_code 
	// 	");
	// 	$stmt->bindParam(':bl_code', $billing_code);
	// 	$stmt->execute();

	//     $stmt->setFetchMode(PDO::FETCH_CLASS, 'billing');
	//     $results = $stmt->fetch();

	//     $this->json = json_encode($results);
	//     $this->data = json_decode($this->json);

	//     return $results;
	// }
	
	public function findbillinginstallation(){
		$stmt = $this->pdo->prepare("
			SELECT 
				billing_id AS billingid ,
				bl_subscriptionid AS subscriptionid ,
				bl_userid AS userid ,
				bl_adminid AS adminid ,
				bl_dueyear AS dueyear ,
				bl_duedate AS duedate ,
				bl_address AS address ,
				bl_xcoordinates AS xcoor ,
				bl_ycoordinates AS ycoor ,
				bl_product AS product ,
				bl_addon AS addon ,
				bl_added AS added ,
				bl_active AS active ,
				bl_status AS STATUS ,
				bl_createat AS create_at ,
				bl_updateat AS update_at ,
				c_fname AS fname,
				c_mname AS mname,
				c_lname AS lname,
				c_contact AS contact,
				cl_unit AS unit,
				cl_block AS block,
				cl_barangay AS barangay,
				cl_municipality AS municipality,
				cl_province AS province,
				cl_zipcode AS zipcode,
				cl_description AS description, 
				b_name as name,
				b_volume as volume,
				b_price as price
			FROM
			  tbl_billing
			  INNER JOIN tbl_client
			    ON (bl_userid = client_id)
			  INNER JOIN tbl_clientlocation
			    ON (bl_address = clientloc_id)
			  INNER JOIN ref_bundles
    			ON (bl_product = b_code)

		    WHERE bl_status = 1;


		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'billing');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findbillinginstallationPerAdmin($id){
		$stmt = $this->pdo->prepare("
			SELECT 
				billing_id AS billingid ,
				bl_subscriptionid AS subscriptionid ,
				bl_userid AS userid ,
				bl_adminid AS adminid ,
				bl_dueyear AS dueyear ,
				bl_duedate AS duedate ,
				bl_address AS address ,
				bl_xcoordinates AS xcoor ,
				bl_ycoordinates AS ycoor ,
				bl_product AS product ,
				bl_addon AS addon ,
				bl_added AS added ,
				bl_active AS active ,
				bl_status AS status ,
				bl_createat AS create_at ,
				bl_updateat AS update_at ,
				c_fname AS fname,
				c_mname AS mname,
				c_lname AS lname,
				c_contact AS contact,
				cl_unit AS unit,
				cl_block AS block,
				cl_barangay AS barangay,
				cl_municipality AS municipality,
				cl_province AS province,
				cl_zipcode AS zipcode,
				cl_description AS description, 
				b_name as name,
				b_volume as volume,
				b_price as price
			FROM
			  tbl_billing
			  INNER JOIN tbl_client
			    ON (bl_userid = client_id)
			  INNER JOIN tbl_clientlocation
			    ON (bl_address = clientloc_id)
			  INNER JOIN ref_bundles
    			ON (bl_product = b_code)

		    WHERE bl_status = 1 and bl_adminid = :bl_adminid


		");

		$stmt->bindParam(":bl_adminid", $id);
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'billing');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findbillinginstallationAdmin($id){
		$stmt = $this->pdo->prepare("
			SELECT 
				billing_id AS billingid ,
				bl_subscriptionid AS subscriptionid ,
				bl_userid AS userid ,
				bl_adminid AS adminid ,
				bl_dueyear AS dueyear ,
				bl_duedate AS duedate ,
				bl_address AS address ,
				bl_xcoordinates AS xcoor ,
				bl_ycoordinates AS ycoor ,
				bl_product AS product ,
				bl_addon AS addon ,
				bl_added AS added ,
				bl_active AS active ,
				bl_status AS status ,
				bl_createat AS create_at ,
				bl_updateat AS update_at ,
				c_fname AS fname,
				c_mname AS mname,
				c_lname AS lname,
				c_contact AS contact,
				cl_unit AS unit,
				cl_block AS block,
				cl_barangay AS barangay,
				cl_municipality AS municipality,
				cl_province AS province,
				cl_zipcode AS zipcode,
				cl_description AS description, 
				b_name as name,
				b_volume as volume,
				b_price as price
			FROM
			  tbl_billing
			  INNER JOIN tbl_client
			    ON (bl_userid = client_id)
			  INNER JOIN tbl_clientlocation
			    ON (bl_address = clientloc_id)
			  INNER JOIN ref_bundles
    			ON (bl_product = b_code)

		    WHERE bl_status = 1 and bl_adminid = :bl_adminid


		");

		$stmt->bindParam(":bl_adminid", $id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'billing');
	    $results = $stmt->fetch();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}


	public function findbillingmonthly(){
		$stmt = $this->pdo->prepare("
			SELECT 
				billing_id AS billingid ,
				bl_subscriptionid AS subscriptionid ,
				bl_userid AS userid ,
				bl_adminid AS adminid ,
				bl_dueyear AS dueyear ,
				bl_duedate AS duedate ,
				bl_address AS address ,
				bl_xcoordinates AS xcoor ,
				bl_ycoordinates AS ycoor ,
				bl_product AS product ,
				bl_addon AS addon ,
				bl_added AS added ,
				bl_active AS active ,
				bl_status AS STATUS ,
				bl_createat AS create_at ,
				bl_updateat AS update_at ,
				c_fname AS fname,
				c_mname AS mname,
				c_lname AS lname,
				c_contact AS contact,
				cl_unit AS unit,
				cl_block AS block,
				cl_barangay AS barangay,
				cl_municipality AS municipality,
				cl_province AS province,
				cl_zipcode AS zipcode,
				cl_description AS description, 
				b_name as name,
				b_volume as volume,
				b_price as price
			FROM
			  tbl_billing
			  INNER JOIN tbl_client
			    ON (bl_userid = client_id)
			  INNER JOIN tbl_clientlocation
			    ON (bl_address = clientloc_id)
			  INNER JOIN ref_bundles
    			ON (bl_product = b_code)

		    WHERE bl_status = 2;


		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'billing');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}


	public function save(Billing $billing){

	$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($billing->billingid)) {
		return $this->update($billing);
	}
		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_billing` (
			`bl_subscriptionid`,
			`bl_userid`,
			`bl_adminid`,
			`bl_dueyear`,
			`bl_duedate`,
			`bl_address`,
			`bl_xcoordinates`,
			`bl_ycoordinates`,
			`bl_product`,
			`bl_addon`,
			`bl_added`,
			`bl_active`,
			`bl_status`,
			`bl_createat`,
			`bl_updateat`
			)
		VALUES (
			:bl_subscriptionid,
			:bl_userid,
			:bl_adminid,
			:bl_dueyear,
			:bl_duedate,
			:bl_address,
			:bl_xcoordinates,
			:bl_ycoordinates,
			:bl_product,
			:bl_addon,
			:bl_added,
			:bl_active,
			:bl_status,
			:bl_createat,
			:bl_updateat);

		");
		$stmt->bindParam(":bl_subscriptionid", $billing->subscriptionid);
		$stmt->bindParam(":bl_userid", $billing->userid);
		$stmt->bindParam(":bl_adminid", $billing->adminid);
		$stmt->bindParam(":bl_dueyear", $billing->dueyear);
		$stmt->bindParam(":bl_duedate", $billing->duedate);
		$stmt->bindParam(":bl_address", $billing->address);
		$stmt->bindParam(":bl_xcoordinates", $billing->xcoor);
		$stmt->bindParam(":bl_ycoordinates", $billing->ycoor);
		$stmt->bindParam(":bl_product", $billing->product);
		$stmt->bindParam(":bl_addon", $billing->addon);
		$stmt->bindParam(":bl_added", $billing->added);
		$stmt->bindParam(":bl_active", $billing->active);
		$stmt->bindParam(":bl_status", $billing->status);
		$stmt->bindParam(":bl_createat", $created_at);
		$stmt->bindParam(":bl_updateat", $created_at);
		return $stmt->execute();
		
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function update(Billing $billing)
	{
	print_r($billing);
	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE tbl_billing 
		SET 
			billing_id = :billing_id,
			bl_subscriptionid = :bl_subscriptionid,
			bl_userid = :bl_userid,
			bl_adminid = :bl_adminid,
			bl_dueyear = :bl_dueyear,
			bl_duedate = :bl_duedate,
			bl_address = :bl_address,
			bl_xcoordinates = :bl_xcoordinates,
			bl_ycoordinates = :bl_ycoordinates,
			bl_product = :bl_product,
			bl_addon = :bl_addon,
			bl_added = :bl_added,
			bl_active = :bl_active,
			bl_status = :bl_status,
			bl_createat = :bl_createat,
			bl_updateat = :bl_updateat
		WHERE billing_id = :billing_id
		");
		$stmt->bindParam(":billing_id", $billing->billingid);
		$stmt->bindParam(":bl_subscriptionid", $billing->subscriptionid);
		$stmt->bindParam(":bl_userid", $billing->userid);
		$stmt->bindParam(":bl_adminid", $billing->adminid);
		$stmt->bindParam(":bl_dueyear", $billing->dueyear);
		$stmt->bindParam(":bl_duedate", $billing->duedate);
		$stmt->bindParam(":bl_address", $billing->address);
		$stmt->bindParam(":bl_xcoordinates", $billing->xcoor);
		$stmt->bindParam(":bl_ycoordinates", $billing->ycoor);
		$stmt->bindParam(":bl_product", $billing->product);
		$stmt->bindParam(":bl_addon", $billing->addon);
		$stmt->bindParam(":bl_added", $billing->added);
		$stmt->bindParam(":bl_active", $billing->active);
		$stmt->bindParam(":bl_status", $billing->status);
		$stmt->bindParam(":bl_createat", $billing->create_at);
		$stmt->bindParam(":bl_updateat", $update_at);

	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}


}
?>