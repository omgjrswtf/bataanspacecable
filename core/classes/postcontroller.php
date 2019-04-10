<?php 
require_once 'post.php';

class PostController{
		protected $pdo;
		public $data;
		public $post;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}

	public function findbyparent($municipality){
	 $stmt = $this->pdo->prepare("

	 	SELECT 
			poleid AS poleid,
			p_parentmuni AS parentmuni,
			p_parentbrgy AS parentbrgy,
			p_lat AS lat,
			p_long	AS `long`,
			p_active AS active,
			p_createat AS createat,
			p_updateat AS updateat,
			areaid AS areaid,
			ar_codebrgy AS codebrgy,
			ar_barangay AS barangay,
			ar_codemuni AS codemuni,
			ar_municipality AS municipality,
			ar_codeprov AS codeprov,
			ar_province AS province,
			ar_zipcode AS zipcode,
			ar_status AS STATUS,
			ar_description AS description,
			ar_createat AS create_at,
			ar_updateat AS update_at
		FROM
		  tbl_pole
		  RIGHT JOIN ref_areas
		    ON (p_parentmuni = ar_municipality)
		    AND (p_parentbrgy = ar_barangay)
		    
		    
		    WHERE p_parentmuni = :p_parentmuni OR ar_municipality = :p_parentmuni
		");
		  $stmt->bindParam(':p_parentmuni', $municipality);
		  $stmt->execute();

		  $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
		  $results = $stmt->fetchAll();

		  $this->json = json_encode($results);
		  $this->data = json_decode($this->json);

		  return $results;
  	}


  	public function postData($id,$municipality,$brgy){

		$stmt = $this->pdo->prepare("
			SELECT
				poleid AS poleid,
				p_parentmuni AS parentmuni,
				p_parentbrgy AS parentbrgy,
				p_lat AS lat,
				p_long	AS `long`,
				p_active AS active,
				p_createat AS createat,
				p_updateat AS updateat
			FROM tbl_pole 
			WHERE poleid = :poleid and p_parentbrgy = :p_parentbrgy and p_parentmuni = :p_parentmuni
		");
	  	$stmt->bindParam(':p_parentmuni', $municipality);
	  	$stmt->bindParam(':p_parentbrgy', $brgy);
	  	$stmt->bindParam(':poleid', $id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function postId($id){

		$stmt = $this->pdo->prepare("
			SELECT
				poleid AS poleid,
				p_parentmuni AS parentmuni,
				p_parentbrgy AS parentbrgy,
				p_lat AS lat,
				p_long	AS `long`,
				p_active AS active,
				p_createat AS createat,
				p_updateat AS updateat
			FROM tbl_pole 
			WHERE poleid = :poleid
		");
	  	$stmt->bindParam(':poleid', $id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function getpostNear($lat,$long){

		$stmt = $this->pdo->prepare("
			SELECT 
				poleid AS poleid,
				p_parentmuni AS parentmuni,
				p_parentbrgy AS parentbrgy,
				p_lat AS lat,
				p_long	AS `long`,
				p_active AS active,
				p_createat AS createat,
				p_updateat AS updateat,
				(((ACOS(SIN((:p_lat *PI()/180)) * SIN((p_lat*PI()/180))+COS((:p_lat *PI()/180)) * COS((p_lat*PI()/180)) * COS(((p_long - :p_long)*PI()/180))))*180/PI())*60*1.1515*1.609344*1000) AS distance 
			FROM tbl_pole
			ORDER BY distance ASC
			LIMIT 1
		");
	  	$stmt->bindParam(':p_lat', $lat);
	  	$stmt->bindParam(':p_long', $long);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

  	public function findbybrgy($municipality,$bgry){
	 $stmt = $this->pdo->prepare("

	 	SELECT 
			poleid AS poleid,
			p_parentmuni AS parentmuni,
			p_parentbrgy AS parentbrgy,
			p_lat AS lat,
			p_long	AS `long`,
			p_active AS active,
			p_createat AS createat,
			p_updateat AS updateat
		FROM
		  tbl_pole
		    
		WHERE p_parentmuni = :p_parentmuni and p_parentbrgy = :p_parentbrgy
		");
	 	  $stmt->bindParam(':p_parentmuni', $municipality);
		  $stmt->bindParam(':p_parentbrgy', $bgry);
		  $stmt->execute();

		  $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
		  $results = $stmt->fetchAll();

		  $this->json = json_encode($results);
		  $this->data = json_decode($this->json);

		  return $results;
  	}
	
	
	public function findPost(){
		$stmt = $this->pdo->prepare("
			SELECT 
				poleid AS poleid,
				p_parentmuni AS parentmuni,
				p_parentbrgy AS parentbrgy,
				p_lat AS lat,
				p_long	AS `long`,
				p_active AS active,
				p_createat AS createat,
				p_updateat AS updateat
			FROM 
				tbl_pole
			GROUP BY p_parentmuni
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Post');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function save(Post $post){
		$created_at = date('Y-m-d H:i:s');
		
	try {
	if (isset($post->poleid)) {
		return $this->update($post);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_pole` (
			`p_parentmuni`,
			`p_parentbrgy`,
			`p_lat`,
			`p_long`,
			`p_active`,
			`p_createat`,
			`p_updateat`
			)
		VALUES (
			:p_parentmuni,
			:p_parentbrgy,
			:p_lat,
			:p_long,
			:p_active,
			:p_createat,
			:p_updateat);
		");

		$stmt->bindParam(":p_parentmuni", $post->parentmuni);
		$stmt->bindParam(":p_parentbrgy", $post->parentbrgy);
		$stmt->bindParam(":p_lat", $post->lat);
		$stmt->bindParam(":p_long", $post->long);
		$stmt->bindParam(":p_active", $post->active);
		$stmt->bindParam(":p_createat", $created_at);
		$stmt->bindParam(":p_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function update(Post $post)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE tbl_pole 
		SET 
			poleid = :poleid,
			p_parentmuni = :p_parentmuni,
			p_parentbrgy = :p_parentbrgy,
			p_lat 		 = :p_lat,
			p_long		 = :p_long,
			p_active	 = :p_active,
			p_createat   = :p_createat,
			p_updateat   = :p_updateat
		WHERE poleid = :poleid
		");
		$stmt->bindParam(":poleid", $post->poleid);
		$stmt->bindParam(":p_parentmuni", $post->parentmuni);
		$stmt->bindParam(":p_parentbrgy", $post->parentbrgy);
		$stmt->bindParam(":p_lat", $post->lat);
		$stmt->bindParam(":p_long", $post->long);
		$stmt->bindParam(":p_active", $post->active);
		$stmt->bindParam(":p_createat", $post->create_at);
		$stmt->bindParam(":p_updateat", $update_at);

	
	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}
}
?>