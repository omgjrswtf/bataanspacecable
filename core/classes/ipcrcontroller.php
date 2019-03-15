<?php 
require_once 'ipcr.php';

	class IpcrController{
		protected $pdo;
		public $data;
		public $ipcr;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}

	public function save(Ipcr $ipcr){
		$created_at = date('Y-m-d H:i:s');
	
	try {
		if (isset($ipcr->id)) {
		return $this->update($ipcr);
		}

		$stmt = $this->pdo->prepare("
		INSERT INTO `ipcr_db` (
			`ipcr_wwt`,
			`ipcr_idno`,
			`ipcr_empno`,
			`ipcr_atcreate`
			)
		VALUES (
			:ipcr_wwt,
			:ipcr_idno,
			:ipcr_empno,
			:ipcr_atcreate
		)");

		$stmt->bindParam(":ipcr_wwt", $ipcr->wwt);
		$stmt->bindParam(":ipcr_idno", $ipcr->ipcridno);
		$stmt->bindParam(":ipcr_empno", $ipcr->ipcrempno);
		$stmt->bindParam(":ipcr_atcreate", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function findId($ipcrno)
	{
		$stmt = $this->pdo->prepare("
			SELECT
				ipcrid as id,
				ipcr_wwt as wwt,
				ipcr_idno as ipcridno,
				ipcr_empno as ipcrempno,
				ipcr_atcreate as atcreate
			FROM ipcr_db 
			WHERE ipcrid = :ipcrid 
		");
		$stmt->bindParam(':ipcrid', $ipcrno);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ipcr');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function ipcrData($ipcrno)
	{
		$stmt = $this->pdo->prepare("
			SELECT
				ipcrid as id,
				ipcr_wwt as wwt,
				ipcr_idno as ipcridno,
				ipcr_empno as ipcrempno,
				ipcr_atcreate as atcreate
			FROM ipcr_db 
			WHERE ipcr_empno = :ipcr_empno 
		");
		$stmt->bindParam(':ipcr_empno', $ipcrno);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ipcr');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function findipcrData($ipcrno){
		$stmt = $this->pdo->prepare("
			SELECT
				ipcrid as id,
				ipcr_wwt as wwt,
				ipcr_idno as ipcridno,
				ipcr_empno as ipcrempno,
				ipcr_atcreate as atcreate
			FROM 
				ipcr_db
			WHERE ipcr_empno = :ipcr_empno
			ORDER BY ipcrid DESC
		");
		$stmt->bindParam(':ipcr_empno', $ipcrno);
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Ipcr');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

}
?>