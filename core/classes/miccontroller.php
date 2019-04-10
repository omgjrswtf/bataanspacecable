<?php 
require_once 'mic.php';
// The Multiple Indicator Cluster Surveys (MICS) 
class MicController{
		protected $pdo;
		public $data;
		public $mic;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function micData($id){

		$stmt = $this->pdo->prepare("
			SELECT
				mics_id as mics_id,
				m_bundleft as bundleft,
				m_bundledgb as bundledgb,
				m_createat as create_at,
				m_updateat as update_at
				
			FROM ref_mics 
			WHERE mics_id = :mics_id 
		");
		$stmt->bindParam(':mics_id', $id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Mic');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function micDatas(){

		$stmt = $this->pdo->prepare("
			SELECT
				mics_id as mics_id,
				m_bundleft as bundleft,
				m_bundledgb as bundledgb,
				m_createat as create_at,
				m_updateat as update_at
				
			FROM ref_mics 
		");
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Mic');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

		public function findMics(){
		$stmt = $this->pdo->prepare("
			SELECT
				mics_id as mics_id,
				m_bundleft as bundleft,
				m_bundledgb as bundledgb,
				m_createat as create_at,
				m_updateat as update_at
				
			FROM ref_mics 
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Mic');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}


	
	public function save(Mic $mic){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($mic->mics_id)) {
		return $this->update($mic);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `ref_mics` (
			`m_bundleft`,
			`m_bundledgb`,
			`m_createat`,
			`m_updateat`
			)
		VALUES (
			:m_bundleft,
			:m_bundledgb,
			:m_createat,
			:m_updateat);
		");

		$stmt->bindParam(":m_bundleft", $mic->bundleft);
		$stmt->bindParam(":m_bundledgb", $mic->bundledgb);
		$stmt->bindParam(":m_createat", $created_at);
		$stmt->bindParam(":m_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}
	public function update(Mic $mic)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE ref_mics 
		SET 
			m_bundleft = :m_bundleft,
			m_bundledgb = :m_bundledgb,
			m_createat = :m_createat,
			m_updateat = :m_updateat
		WHERE mics_id = :mics_id
		");
		$stmt->bindParam(":mics_id", $mic->mics_id);
		$stmt->bindParam(":m_bundleft", $mic->bundleft);
		$stmt->bindParam(":m_bundledgb", $mic->bundledgb);
		$stmt->bindParam(":m_createat", $mic->create_at);
		$stmt->bindParam(":m_updateat", $update);
	
	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}
}
?>