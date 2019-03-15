<?php 
require_once 'bundle.php';

class BundleController{
		protected $pdo;
		public $data;
		public $bundle;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function bundleData($bundle_id){
  
		$stmt = $this->pdo->prepare("
			SELECT
				bundle_id as bundleid,
				b_code as code,
				b_name as name,
				b_volume as volume,
				b_price as price,
				b_status as status,
				b_createat as create_at,
				b_updateat as update_at
				
			FROM ref_bundles 
			WHERE bundle_id = :bundleid 
		");
		$stmt->bindParam(':bundleid', $bundle_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Bundle');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function bundleCode($bundle_code){
  
		$stmt = $this->pdo->prepare("
			SELECT
				bundle_id as bundleid,
				b_code as code,
				b_name as name,
				b_volume as volume,
				b_price as price,
				b_status as status,
				b_createat as create_at,
				b_updateat as update_at
				
			FROM ref_bundles 
			WHERE b_code = :b_code 
		");
		$stmt->bindParam(':b_code', $bundle_code);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Bundle');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}
	
	public function findBundles(){
		$stmt = $this->pdo->prepare("
			SELECT
				bundle_id as bundleid,
				b_name as name,
				b_code as code,
				b_volume as volume,
				b_price as price,
				b_status as status,
				b_createat as create_at,
				b_updateat as update_at
			FROM ref_bundles 
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Bundle');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function save(Bundle $bundle){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($bundle->bundleid)) {
		return $this->update($bundle);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `ref_bundles` (
			`b_code`
			`b_name`,
			`b_volume`,
			`b_price`,
			`b_status`,
			`b_createat`,
			`b_updateat`
			)
		VALUES (
			:b_code,
			:b_name,
			:b_volume,
			:b_price,
			:b_status,
			:b_createat,
			:b_updateat);
		");

		$stmt->bindParam(":b_name", $bundle->name);
		$stmt->bindParam(":b_code", $bundle->code);
		$stmt->bindParam(":b_volume", $bundle->volume);
		$stmt->bindParam(":b_price", $bundle->price);
		$stmt->bindParam(":b_status", $bundle->status);
		$stmt->bindParam(":b_createat", $created_at);
		$stmt->bindParam(":b_updateat", $created_at);
		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function update(Bundle $bundle)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE ref_bundles 
		SET 
			bundle_id = :bundle_id,
			b_code as :b_code,
			b_name = :b_name,
			b_volume = :b_volume,
			b_price = :b_price,
			b_status = :b_status,
			b_createat = :b_createat,
			b_updateat = :b_updateat
		WHERE bundle_id = :bundle_id
		");
		$stmt->bindParam(":bundle_id", $bundle->bundleid);
		$stmt->bindParam(":b_code", $bundle->code);
		$stmt->bindParam(":b_name", $bundle->name);
		$stmt->bindParam(":b_volume", $bundle->volume);
		$stmt->bindParam(":b_price", $bundle->price);
		$stmt->bindParam(":b_status", $bundle->status);
		$stmt->bindParam(":b_createat", $bundle->create_at);
		$stmt->bindParam(":b_updateat", $update_at);

	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}

	// public function findBundlesList($){
	// 	$stmt = $this->pdo->prepare("
	// 		SELECT
	// 			ipcrid as id,
	// 			ipcr_wwt as wwt,
	// 			ipcr_idno as ipcridno,
	// 			ipcr_empno as ipcrempno,
	// 			ipcr_atcreate as atcreate
	// 		FROM 
	// 			ipcr_db
	// 		WHERE ipcr_empno = :ipcr_empno
	// 		ORDER BY ipcrid DESC
	// 	");
	// 	$stmt->bindParam(':ipcr_empno', $ipcrno);
	// 	$stmt->execute();

	// 	$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Bundle');
	// 	$results = $stmt->fetchAll();
		
	// 	$this->json = json_encode($results);
	// 	$this->data = json_decode($this->json);

	// 	return $results;
	// }





}
?>