<?php 
require_once 'subscription.php';

class SubscriptionController{
		protected $pdo;
		public $data;
		public $subscription;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}


	public function subscriptionData($subscription_id){

		$stmt = $this->pdo->prepare("
			SELECT
				subcription_id as subcriptionid,
				sb_userid as userid,
				sb_username as username,
				sb_usercontact as usercontact,
				sb_dueyear as dueyear,
				sb_duedate as duedate,
				sb_xcoordinates as xcoor,
				sb_ycoordinates as ycoor,
				sb_types as types,
				sb_addon as addon,
				sb_added as added,
				sb_status as status,
				sb_active as active,
				sb_createat as create_at,
				sb_updateat as update_at
				
			FROM tbl_subcription 
			WHERE subcription_id = :subcription_id 
		");
		$stmt->bindParam(':subcription_id', $subscription_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function subsClientData($subscription_id){

		$stmt = $this->pdo->prepare("
			SELECT
				subcription_id as subcriptionid,
				sb_userid as userid,
				sb_username as username,
				sb_usercontact as usercontact,
				sb_dueyear as dueyear,
				sb_duedate as duedate,
				sb_xcoordinates as xcoor,
				sb_ycoordinates as ycoor,
				sb_types as types,
				sb_addon as addon,
				sb_added as added,
				sb_status as status,
				sb_active as active,
				sb_createat as create_at,
				sb_updateat as update_at
				
			FROM tbl_subcription 
			WHERE sb_userid = :sb_userid 
		");
		$stmt->bindParam(':sb_userid', $subscription_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function subsBundledata($subscription_id){

		$stmt = $this->pdo->prepare("
			SELECT 
				subcription_id AS subcriptionid,
				sb_userid AS userid,
				sb_username AS username,
				sb_usercontact AS usercontact,
				sb_dueyear AS dueyear,
				sb_duedate AS duedate,
				sb_xcoordinates AS xcoor,
				sb_ycoordinates AS ycoor,
				sb_types AS 'types',
				sb_addon AS addon,
				sb_added AS added,
				sb_status AS 'status',
				sb_active AS active,
				sb_createat AS create_at,
				sb_updateat AS update_at,
				bundle_id AS bundleid,
				b_code AS CODE,
				b_name AS NAME,
				b_volume AS volume,
				b_price AS price,
				b_status AS STATUS,
				b_createat AS create_at,
				b_updateat AS update_at
				
			FROM
			  tbl_subcription
			  INNER JOIN ref_bundles
			    ON (sb_types = b_code)

			WHERE subcription_id = :subcription_id 
		");
		$stmt->bindParam(':subcription_id', $subscription_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}


	public function findAllSchedPending(){
		$stmt = $this->pdo->prepare("
			SELECT
				subcription_id as subcriptionid,
				sb_userid as userid,
				sb_username as username,
				sb_usercontact as usercontact,
				sb_dueyear as dueyear,
				sb_duedate as duedate,
				sb_xcoordinates as xcoor,
				sb_ycoordinates as ycoor,
				sb_types as types,
				sb_addon as addon,
				sb_added as added,
				sb_status as status,
				sb_active as active,
				sb_createat as create_at,
				sb_updateat as update_at
			FROM tbl_subcription 
			Where sb_status = 1;
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Subscription');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findAllSchedUnAddress(){
		$stmt = $this->pdo->prepare("
			SELECT
				subcription_id as subcriptionid,
				sb_userid as userid,
				sb_username as username,
				sb_usercontact as usercontact,
				sb_dueyear as dueyear,
				sb_duedate as duedate,
				sb_xcoordinates as xcoor,
				sb_ycoordinates as ycoor,
				sb_types as types,
				sb_addon as addon,
				sb_added as added,
				sb_status as status,
				sb_active as active,
				sb_createat as create_at,
				sb_updateat as update_at
			FROM tbl_subcription 
			Where sb_status = 4;
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Subscription');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findAllSchedAccepted(){
		$stmt = $this->pdo->prepare("
			SELECT
				subcription_id as subcriptionid,
				sb_userid as userid,
				sb_username as username,
				sb_usercontact as usercontact,
				sb_dueyear as dueyear,
				sb_duedate as duedate,
				sb_xcoordinates as xcoor,
				sb_ycoordinates as ycoor,
				sb_types as types,
				sb_addon as addon,
				sb_added as added,
				sb_status as status,
				sb_active as active,
				sb_createat as create_at,
				sb_updateat as update_at
			FROM tbl_subcription 
			Where sb_status = 2;
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Subscription');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findAllSchedOngoing(){
		$stmt = $this->pdo->prepare("
			SELECT
				subcription_id as subcriptionid,
				sb_userid as userid,
				sb_username as username,
				sb_usercontact as usercontact,
				sb_dueyear as dueyear,
				sb_duedate as duedate,
				sb_xcoordinates as xcoor,
				sb_ycoordinates as ycoor,
				sb_types as types,
				sb_addon as addon,
				sb_added as added,
				sb_status as status,
				sb_active as active,
				sb_createat as create_at,
				sb_updateat as update_at
			FROM tbl_subcription 
			Where sb_status = 3;
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Subscription');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findOverSub(){
		$stmt = $this->pdo->prepare("
			SELECT
				`all` AS `all`,
				installed AS installed,
				unintalled AS unintalled,
				ROUND((`installed`/`all`)*100) AS percentinstalled,
				ROUND((`unintalled`/`all`)*100) AS percentunintalled

				FROM (
				SELECT  
					COUNT(IF(`sb_status` IN (4), `sb_status`, NULL)) AS `installed`,
					COUNT(IF(`sb_status` IN (6), `sb_status`, NULL)) AS `unintalled`,
					COUNT(sb_status) AS `all`
				FROM
				tbl_subcription

					
				HAVING COUNT(sb_status)) AS b
		");
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}


	public function findAllSubsDay(){
		$stmt = $this->pdo->prepare("
			SELECT  
				COUNT(IF(`sb_status` IN (4), `sb_status`, NULL)) AS `installed`,
				COUNT(IF(`sb_status` IN (6), `sb_status`, NULL)) AS `unintalled`,
				MAKEDATE(sb_dueyear,sb_duedate)  AS `date`
			FROM
			tbl_subcription

			GROUP BY DAY(MAKEDATE(sb_dueyear,sb_duedate)),MAKEDATE(sb_dueyear,sb_duedate)
			ORDER BY MAKEDATE(sb_dueyear,sb_duedate) DESC;

		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Subscription');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}


	public function findAllSubsWeek(){
		$stmt = $this->pdo->prepare("
			SELECT  
				COUNT(IF(`sb_status` IN (4), `sb_status`, null)) AS `installed`,
				COUNT(IF(`sb_status` IN (6), `sb_status`, NULL)) AS `unintalled`,
				WEEK(MAKEDATE(sb_dueyear,sb_duedate))+1 AS `week`,
				MONTHNAME(MAKEDATE(sb_dueyear,sb_duedate)) AS `month`,
				DATE_FORMAT(MAKEDATE(sb_dueyear,sb_duedate),'%Y %m')  AS `date`
			FROM
			tbl_subcription

			GROUP BY WEEK(MAKEDATE(sb_dueyear,sb_duedate))+1 ,MONTHNAME(MAKEDATE(sb_dueyear,sb_duedate)), YEAR(MAKEDATE(sb_dueyear,sb_duedate)),DATE_FORMAT(MAKEDATE(sb_dueyear,sb_duedate),'%Y %m')
			ORDER BY  `date` DESC,WEEK DESC;

		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Subscription');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}
	
	public function findAllSubsMonth(){
		$stmt = $this->pdo->prepare("
			SELECT  
				COUNT(IF(`sb_status` IN (4), `sb_status`, NULL)) AS `installed`,
				COUNT(IF(`sb_status` IN (6), `sb_status`, NULL)) AS `unintalled`,
				MONTHNAME(MAKEDATE(sb_dueyear,sb_duedate)) AS `month`,
				DATE_FORMAT(MAKEDATE(sb_dueyear,sb_duedate),'%Y %m')  AS `date`
			FROM
			  tbl_subcription
			    
			GROUP BY  MONTHNAME(MAKEDATE(sb_dueyear,sb_duedate)), YEAR(MAKEDATE(sb_dueyear,sb_duedate)),DATE_FORMAT(MAKEDATE(sb_dueyear,sb_duedate),'%Y %m')
			ORDER BY `date` DESC

		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Subscription');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function findAllSubsYear(){
		$stmt = $this->pdo->prepare("
			SELECT  
				COUNT(IF(`sb_status` IN (4), `sb_status`, NULL)) AS `installed`,
				COUNT(IF(`sb_status` IN (6), `sb_status`, NULL)) AS `unintalled`,
				YEAR(MAKEDATE(sb_dueyear,sb_duedate)) AS `year`
			FROM
			  tbl_subcription
			    
			GROUP BY `year`
			ORDER BY `year` DESC


		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Subscription');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}


	public function OverallBundle(){

		$stmt = $this->pdo->prepare("
			SELECT
				installed AS installed,
				unintalled AS unintalled,
				`all` AS `all`,
				ROUND((`installed`/`all`)*100) AS percentinstalled,
				ROUND((`unintalled`/`all`)*100) AS percentunintalled,
				revenue AS revenue,
				lostrevenue AS lostrevenue,
				amount AS amount,
				ROUND((revenue/amount)*100) AS percentrevenue,
				ROUND((lostrevenue/amount)*100) AS percentlost

				FROM(
				SELECT  
				COUNT(IF(`sb_status` IN (4), `sb_status`, NULL)) AS `installed`,
				COUNT(IF(`sb_status` IN (6), `sb_status`, NULL)) AS `unintalled`,
				COUNT(sb_status) AS `all`,
				SUM(CASE WHEN `sb_status` IN (4) THEN `b_price` ELSE 0 END) AS revenue,
				SUM(CASE WHEN `sb_status` IN (6) THEN `b_price` ELSE 0 END) AS lostrevenue,
				SUM(b_price) AS amount		
				FROM
				tbl_subcription

				INNER JOIN ref_bundles
				    ON (sb_types = b_code)

				HAVING COUNT(b_price)) AS b		
			
		");
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function findSubscriberBundleDay($code){
	 $stmt = $this->pdo->prepare("
  			SELECT 
				COUNT(sb_types) as total,
				sb_types AS code,
				b_name AS name,
				b_price AS price,
				MAKEDATE(sb_dueyear,sb_duedate)  AS `date`
				FROM
				  `tbl_subcription`
			  	INNER JOIN `ref_bundles`
				    ON (`tbl_subcription`.`sb_types` = `ref_bundles`.`b_code`)
				WHERE sb_types = :sb_types
    
			GROUP BY sb_types,DAY(MAKEDATE(sb_dueyear,sb_duedate)),MAKEDATE(sb_dueyear,sb_duedate)
			ORDER BY MAKEDATE(sb_dueyear,sb_duedate) DESC;
		");
		  $stmt->bindParam(':sb_types', $code);
		  $stmt->execute();

		 	  $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
		  $results = $stmt->fetchAll();

		  $this->json = json_encode($results);
		  $this->data = json_decode($this->json);

		  return $results;
  	}


  	public function findSubscriberBundleWeek($code){
	 $stmt = $this->pdo->prepare("
  			SELECT 
				count(sb_types) as total,
				sb_types as code,
				b_name as name,
				b_price as price,
				WEEK(MAKEDATE(sb_dueyear,sb_duedate))+1 AS `week`,
				MONTHNAME(MAKEDATE(sb_dueyear,sb_duedate)) AS `month`,
				DATE_FORMAT(MAKEDATE(sb_dueyear,sb_duedate),'%Y %m')  AS `date`

			FROM
			  `tbl_subcription`
			  INNER JOIN `ref_bundles`
			    ON (`tbl_subcription`.`sb_types` = `ref_bundles`.`b_code`)
			    WHERE sb_types = :sb_types
			    
			GROUP BY WEEK(MAKEDATE(sb_dueyear,sb_duedate))+1 ,MONTHNAME(MAKEDATE(sb_dueyear,sb_duedate)), YEAR(MAKEDATE(sb_dueyear,sb_duedate)),DATE_FORMAT(MAKEDATE(sb_dueyear,sb_duedate),'%Y %m')
			ORDER BY  `date` DESC,WEEK DESC;

		");
		  $stmt->bindParam(':sb_types', $code);
		  $stmt->execute();

		  $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
		  $results = $stmt->fetchAll();

		  $this->json = json_encode($results);
		  $this->data = json_decode($this->json);

		  return $results;
  	}

  	public function findSubscriberBundleMonth($code){
	 $stmt = $this->pdo->prepare("
  			SELECT 
				COUNT(b_code) as total,
				b_code AS code,
				b_name AS name,
				b_price AS price,
				MONTHNAME(MAKEDATE(sb_dueyear,sb_duedate)) AS `month`,
				DATE_FORMAT(MAKEDATE(sb_dueyear,sb_duedate),'%Y %m')  AS `date`

				FROM
				`bscndb`.`tbl_subcription`
				INNER JOIN `bscndb`.`ref_bundles`
				ON (`tbl_subcription`.`sb_types` = `ref_bundles`.`b_code`)
				WHERE sb_types = :sb_types

			GROUP BY  b_code,MONTHNAME(MAKEDATE(sb_dueyear,sb_duedate)), YEAR(MAKEDATE(sb_dueyear,sb_duedate)),DATE_FORMAT(MAKEDATE(sb_dueyear,sb_duedate),'%Y %m')
			ORDER BY `date` DESC

		");
		  $stmt->bindParam(':sb_types', $code);
		  $stmt->execute();

		  $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
		  $results = $stmt->fetchAll();

		  $this->json = json_encode($results);
		  $this->data = json_decode($this->json);

		  return $results;
  	}

  	public function findSubscriberBundleYear($code){
	 $stmt = $this->pdo->prepare("
  			SELECT 
				COUNT(b_code) AS total,
				b_code AS code,
				b_name AS name,
				b_price AS price,
				YEAR(MAKEDATE(sb_dueyear,sb_duedate)) AS `year`

			FROM
			  `bscndb`.`tbl_subcription`
			  INNER JOIN `bscndb`.`ref_bundles`
			    ON (`tbl_subcription`.`sb_types` = `ref_bundles`.`b_code`)
		    WHERE sb_types = :sb_types
			    
			GROUP BY b_code,`year`
			ORDER BY `year` DESC


		");
		  $stmt->bindParam(':sb_types', $code);
		  $stmt->execute();

		  $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subscription');
		  $results = $stmt->fetchAll();

		  $this->json = json_encode($results);
		  $this->data = json_decode($this->json);

		  return $results;
  	}

	public function save(Subscription $subscription){
		$created_at = date('Y-m-d H:i:s');
		
	try {
	if (isset($subscription->subcriptionid)) {
		return $this->update($subscription);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_subcription` (
			`sb_userid`,
			`sb_username`,
			`sb_usercontact`,
			`sb_dueyear`,
			`sb_duedate`,
			`sb_xcoordinates`,
			`sb_ycoordinates`,
			`sb_types`,
			`sb_addon`,
			`sb_added`,
			`sb_status`,
			`sb_active`,
			`sb_createat`,
			`sb_updateat`
			)
		VALUES (
			:sb_userid,
			:sb_username,
			:sb_usercontact,
			:sb_dueyear,
			:sb_duedate,  
			:sb_xcoordinates, 
			:sb_ycoordinates, 
			:sb_types,
			:sb_addon,
			:sb_added,
			:sb_status,
			:sb_active,
			:sb_createat,
			:sb_updateat);
		");
		$stmt->bindParam(":sb_userid", $subscription->userid);
		$stmt->bindParam(":sb_username", $subscription->username);
		$stmt->bindParam(":sb_usercontact", $subscription->usercontact);
		$stmt->bindParam(":sb_dueyear", $subscription->dueyear);
		$stmt->bindParam(":sb_duedate", $subscription->duedate);
		$stmt->bindParam(":sb_xcoordinates", $subscription->xcoor);
		$stmt->bindParam(":sb_ycoordinates", $subscription->ycoor);
		$stmt->bindParam(":sb_types", $subscription->types);
		$stmt->bindParam(":sb_addon", $subscription->addon);
		$stmt->bindParam(":sb_added", $subscription->added);
		$stmt->bindParam(":sb_status", $subscription->status);
		$stmt->bindParam(":sb_active", $subscription->active);
		$stmt->bindParam(":sb_createat", $create_at);
		$stmt->bindParam(":sb_updateat", $update_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}


	public function update(Subscription $subscription)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE tbl_subcription 
		SET 
			subcription_id = :subcription_id,
			sb_userid = :sb_userid,
			sb_username = :sb_username,
			sb_usercontact = :sb_usercontact,
			sb_dueyear = :sb_dueyear,
			sb_duedate = :sb_duedate,
			sb_xcoordinates = :sb_xcoordinates,
			sb_ycoordinates = :sb_ycoordinates,
			sb_types = :sb_types,
			sb_addon = :sb_addon,
			sb_added = :sb_added,
			sb_status = :sb_status,
			sb_active = :sb_active,
			sb_createat = :sb_createat,
			sb_updateat = :sb_updateat
		WHERE subcription_id = :subcription_id
		");
		$stmt->bindParam(":subcription_id", $subscription->subcriptionid);
		$stmt->bindParam(":sb_userid", $subscription->userid);
		$stmt->bindParam(":sb_username", $subscription->username);
		$stmt->bindParam(":sb_usercontact", $subscription->usercontact);
		$stmt->bindParam(":sb_dueyear", $subscription->dueyear);
		$stmt->bindParam(":sb_duedate", $subscription->duedate);
		$stmt->bindParam(":sb_xcoordinates", $subscription->xcoor);
		$stmt->bindParam(":sb_ycoordinates", $subscription->ycoor);
		$stmt->bindParam(":sb_types", $subscription->types);
		$stmt->bindParam(":sb_addon", $subscription->addon);
		$stmt->bindParam(":sb_added", $subscription->added);
		$stmt->bindParam(":sb_status", $subscription->status);
		$stmt->bindParam(":sb_active", $subscription->active);
		$stmt->bindParam(":sb_createat", $subscription->create_at);
		$stmt->bindParam(":sb_updateat", $update_at);
	
	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}
}
?>