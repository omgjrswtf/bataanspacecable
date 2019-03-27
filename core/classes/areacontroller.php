<?php 
require_once 'area.php';

class AreaController{
		protected $pdo;
		public $data;
		public $area;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function areaData($area_id){

		$stmt = $this->pdo->prepare("
			SELECT
				areaid as areaid,
				ar_codebrgy as codebrgy,
				ar_barangay as barangay,
				ar_codemuni as codemuni,
				ar_municipality as municipality,
				ar_codeprov as codeprov,
				ar_province as province,
				ar_zipcode as zipcode,
				ar_status as status,
				ar_description as description,
				ar_createat as create_at,
				ar_updateat as update_at
				
			FROM ref_areas 
			WHERE areaid = :areaid 
		");
		$stmt->bindParam(':areaid', $area_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Area');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function findBarangay($barangay,$municipality){
	
	    $stmt = $this->pdo->prepare("
			SELECT
				areaid as areaid,
				ar_codebrgy as codebrgy,
				ar_barangay as barangay,
				ar_codemuni as codemuni,
				ar_municipality as municipality,
				ar_codeprov as codeprov,
				ar_province as province,
				ar_zipcode as zipcode,
				ar_status as status,
				ar_description as description,
				ar_createat as create_at,
				ar_updateat as update_at
				
			FROM ref_areas 
			WHERE ar_barangay = :ar_barangay and ar_municipality = :ar_municipality
		");
		$stmt->bindParam(':ar_barangay', $barangay);
		$stmt->bindParam(':ar_municipality', $municipality);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Area');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;

	}
	
	public function findAreas(){
		$stmt = $this->pdo->prepare("
			SELECT
				areaid as areaid,
				ar_codebrgy as codebrgy,
				ar_barangay as barangay,
				ar_codemuni as codemuni,
				ar_municipality as municipality,
				ar_codeprov as codeprov,
				ar_province as province,
				ar_zipcode as zipcode,
				ar_status as status,
				ar_description as description,
				ar_createat as create_at,
				ar_updateat as update_at
				
			FROM ref_areas 
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Area');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function save(Area $area){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($area->areaid)) {
		return $this->update($area);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `ref_areas` (
			`ar_codebrgy`,
			`ar_barangay`,
			`ar_codemuni`,
			`ar_municipality`,
			`ar_codeprov`,
			`ar_province`,
			`ar_zipcode`,
			`ar_status`,
			`ar_description`,
			`ar_createat`,
			`ar_updateat`
			)
		VALUES (
			:ar_codebrgy,
			:ar_barangay,
			:ar_codemuni,
			:ar_municipality,  
			:ar_codeprov, 
			:ar_province, 
			:ar_zipcode,
			:ar_status,
			:ar_description,
			:ar_createat,
			:ar_updateat);
		");

		$stmt->bindParam(":ar_codebrgy", $area->codebrgy);
		$stmt->bindParam(":ar_barangay", $area->barangay);
		$stmt->bindParam(":ar_codemuni", $area->codemuni);
		$stmt->bindParam(":ar_municipality", $area->municipality);
		$stmt->bindParam(":ar_codeprov", $area->codeprov);
		$stmt->bindParam(":ar_province", $area->province);
		$stmt->bindParam(":ar_zipcode", $area->zipcode);
		$stmt->bindParam(":ar_status", $area->status);
		$stmt->bindParam(":ar_description", $area->description);
		$stmt->bindParam(":ar_createat", $created_at);
		$stmt->bindParam(":ar_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}
	public function update(Area $area)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE ref_areas 
		SET 
			ar_codebrgy = :ar_codebrgy,
			ar_barangay = :ar_barangay,
			ar_codemuni = :ar_codemuni,
			ar_municipality = :ar_municipality,
			ar_codeprov = :ar_codeprov,
			ar_province = :ar_province,
			ar_zipcode = :ar_zipcode,
			ar_status = :ar_status,
			ar_description = :ar_description,
			ar_createat = :ar_createat,
			ar_updateat = :ar_updateat
		WHERE areaid = :areaid
		");
		$stmt->bindParam(":areaid", $area->areaid);
		$stmt->bindParam(":ar_codebrgy", $area->codebrgy);
		$stmt->bindParam(":ar_barangay", $area->barangay);
		$stmt->bindParam(":ar_codemuni", $area->codemuni);
		$stmt->bindParam(":ar_municipality", $area->municipality);
		$stmt->bindParam(":ar_codeprov", $area->codeprov);
		$stmt->bindParam(":ar_province", $area->province);
		$stmt->bindParam(":ar_zipcode", $area->zipcode);
		$stmt->bindParam(":ar_status", $area->status);
		$stmt->bindParam(":ar_description", $area->description);
		$stmt->bindParam(":ar_createat", $area->create_at);
		$stmt->bindParam(":ar_updateat", $update_at);
	
	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}
}
?>