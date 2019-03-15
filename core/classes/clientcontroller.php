<?php 
require_once 'client.php';

class ClientController{
		protected $pdo;
		public $data;
		public $client;

	function __construct($pdo){
		$this->pdo = $pdo; 
	}

	public function checkInput($var){
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;
	}

	public function login($username, $password){
		$stmt = $this->pdo->prepare("
			SELECT
				client_id as clientid,
				c_fname as fname,
				c_mname as mname,
				c_lname as lname,
				c_contact as contact,
				c_gender as gender,
				c_datebirth as datebirth,
				c_email as email,
				c_password as password,
				c_status as status,
				c_activity as activity,
				c_createat as create_at,
				c_updateat as update_at
			FROM tbl_client
			WHERE c_email = :username and c_password = :password 
		");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Client');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function clientData($client_id){
		$stmt = $this->pdo->prepare("
			SELECT
				client_id as clientid,
				c_fname as fname,
				c_mname as mname,
				c_lname as lname,
				c_contact as contact,
				c_gender as gender,
				c_datebirth as datebirth,
				c_email as email,
				c_password as password,
				c_status as status,
				c_activity as activity,
				c_createat as create_at,
				c_updateat as update_at
			FROM tbl_client 
			WHERE client_id = :client_id 
		");
		$stmt->bindParam(':client_id', $client_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Client');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}


	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location: ../index.php');
	}


	public function checkEmail($email){
		$stmt = $this->pdo->prepare("SELECT c_email as email FROM `tbl_client` WHERE `c_email` = :email");

		$stmt->bindParam(":email", $email);
		$stmt->execute();
    	
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Client');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	// public function checkUsername($username){
	// 	$stmt = $this->pdo->prepare("SELECT `u_name` FROM `user_db` WHERE `username` = :username");
	// 	$stmt->bindParam(":username", $username);
	// 	$stmt->execute();

	// 	$count = $stmt->rowCount();
	// 	if ($count > 0) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }


	public function findClient(){
		$stmt = $this->pdo->prepare("
			SELECT
				client_id as clientid,
				c_fname as fname,
				c_mname as mname,
				c_lname as lname,
				c_contact as contact,
				c_gender as gender,
				c_datebirth as datebirth,
				c_email as email,
				c_password as password,
				c_status as status,
				c_activity as activity,
				c_createat as create_at,
				c_updateat as update_at
			FROM 
				tbl_client
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Client');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function save(Client $client){

		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($client->clientid)) {
		return $this->update($client);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_client` (
			c_fname,
			c_mname,
			c_lname,
			c_contact,
			c_gender,
			c_datebirth,
			c_email,
			c_password,
			c_status,
			c_activity,
			c_createat,
			c_updateat
			)
		VALUES (
			:c_fname,
			:c_mname,
			:c_lname,
			:c_contact
			:c_gender,
			:c_datebirth,
			:c_email,
			:c_password,
			:c_status,
			:c_activity,
			:c_createat,
			:c_updateat);
		");

		$stmt->bindParam(":c_fname", $client->fname);
		$stmt->bindParam(":c_mname", $client->mname);
		$stmt->bindParam(":c_lname", $client->lname);
		$stmt->bindParam(":c_contact", $client->contact);
		$stmt->bindParam(":c_gender", $client->gender);
		$stmt->bindParam(":c_datebirth", $client->datebirth);
		$stmt->bindParam(":c_email", $client->email);
		$stmt->bindParam(":c_password", $client->password);
		$stmt->bindParam(":c_status", $client->status);
		$stmt->bindParam(":c_activity", $client->activity);
		$stmt->bindParam(":c_createat", $created_at);
		$stmt->bindParam(":c_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function saveonce(Client $client){

	print_r($client);
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($client->userid)) {
		return $this->update($client);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_client` (
			c_email,
			c_password,
			c_status,
			c_activity,
			c_createat,
			c_updateat
			)
		VALUES (
			:c_email,
			:c_password,
			:c_status,
			:c_activity,
			:c_createat,
			:c_updateat);
		");

		$stmt->bindParam(":c_email", $client->email);
		$stmt->bindParam(":c_password", $client->password);
		$stmt->bindParam(":c_status", $client->status);
		$stmt->bindParam(":c_activity", $client->activity);
		$stmt->bindParam(":c_createat", $created_at);
		$stmt->bindParam(":c_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}


	public function update(Client $client)
	{

	print_r($client);
	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE `tbl_client`
		SET 
			client_id = :client_id,
			c_fname = :c_fname,
			c_mname = :c_mname,
			c_lname = :c_lname,
			c_contact = :c_contact,
			c_gender = :c_gender,
			c_datebirth = :c_datebirth,
			c_email = :c_email,
			c_password = :c_password,
			c_status = :c_status,
			c_activity = :c_activity,
			c_createat = :c_createat,
			c_updateat = :c_updateat
		WHERE client_id = :client_id
		");
		$stmt->bindParam(":client_id", $client->clientid);
		$stmt->bindParam(":c_fname", $client->fname);
		$stmt->bindParam(":c_mname", $client->mname);
		$stmt->bindParam(":c_lname", $client->lname);
		$stmt->bindParam(":c_contact", $client->contact);
		$stmt->bindParam(":c_gender", $client->gender);
		$stmt->bindParam(":c_datebirth", $client->datebirth);
		$stmt->bindParam(":c_email", $client->email);
		$stmt->bindParam(":c_password", $client->password);
		$stmt->bindParam(":c_status", $client->status);
		$stmt->bindParam(":c_activity", $client->activity);
		$stmt->bindParam(":c_createat", $client->create_at);
		$stmt->bindParam(":c_updateat", $update_at);

	return $stmt->execute();

	} catch (PDOException $ex) {
		echo $ex->getMessage();
		}
	}

	// public function updatepass(User $user)
	// {
	// $update_at = date('Y-m-d H:i:s');

	// $stmt = $this->pdo->prepare("
	// 	UPDATE user_db 
	// 	SET
	// 		u_password = :password,
	// 		u_atupdate = :atupdate
	// 	WHERE user_id = :userid
	// ");
	// $stmt->bindParam(':userid', $user->userid);
	// $stmt->bindParam(':password', $user->password);
	// $stmt->bindParam(':atupdate', $update_at);

	
	// return $stmt->execute();

	// }





}
?>