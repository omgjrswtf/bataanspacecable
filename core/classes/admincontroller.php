<?php 
require_once 'admin.php';

class AdminController{
		protected $pdo;
		public $data;
		public $admin;

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
				admin_id as adminid,
				a_firstname as firstname,
				a_middlename as middlename,
				a_lastname as lastname,
				a_username as username,
				a_password as password,
				a_address as address,
				a_datebirth as datebirth,
				a_contact as contact,
				a_email as email,
				a_role as role,
				a_status as status,
				a_createat as create_at,
				a_updateat as update_at

			FROM tbl_admin
			WHERE a_username = :username and a_password = :password 
		");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Admin');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}


	public function adminData($admin_id){

		$stmt = $this->pdo->prepare("
			SELECT
				admin_id as adminid,
				a_firstname as firstname,
				a_middlename as middlename,
				a_lastname as lastname,
				a_username as username,
				a_password as password,
				a_address as address,
				a_datebirth as datebirth,
				a_contact as contact,
				a_email as email,
				a_role as role,
				a_status as status,
				a_createat as create_at,
				a_updateat as update_at
				
			FROM tbl_admin 
			WHERE admin_id = :adminid 
		");
		$stmt->bindParam(':adminid', $admin_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Admin');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function findAdmins(){
		$stmt = $this->pdo->prepare("
			SELECT
				admin_id as adminid,
				a_firstname as firstname,
				a_middlename as middlename,
				a_lastname as lastname,
				a_username as username,
				a_password as password,
				a_address as address,
				a_datebirth as datebirth,
				a_contact as contact,
				a_email as email,
				a_role as role,
				a_status as status,
				a_createat as create_at,
				a_updateat as update_at
				
			FROM tbl_admin 
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Admin');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}


	public function save(Admin $admin){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($admin->adminid)) {
		return $this->update($admin);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `tbl_admin` (
			`a_firstname`,
			`a_middlename`,
			`a_lastname`,
			`a_username`,
			`a_password`,
			`a_address`,
			`a_datebirth`,
			`a_contact`,
			`a_email`,
			`a_role`,
			`a_status`,
			`a_createat`,
			`a_updateat`
			)
		VALUES (
			:a_firstname,
			:a_middlename,
			:a_lastname,
			:a_username,  
			:a_password, 
			:a_address, 
			:a_datebirth,
			:a_contact,
			:a_email,
			:a_role,
			:a_status, 
			:a_createat,
			:a_updateat);
		");

		$stmt->bindParam(":a_firstname", $admin->firstname);
		$stmt->bindParam(":a_middlename", $admin->middlename);
		$stmt->bindParam(":a_lastname", $admin->lastname);
		$stmt->bindParam(":a_username", $admin->username);
		$stmt->bindParam(":a_password", $admin->password);
		$stmt->bindParam(":a_address", $admin->address);
		$stmt->bindParam(":a_datebirth", $admin->datebirth);
		$stmt->bindParam(":a_contact", $admin->contact);
		$stmt->bindParam(":a_email", $admin->email);
		$stmt->bindParam(":a_role", $admin->role);
		$stmt->bindParam(":a_status", $admin->status);
		$stmt->bindParam(":a_createat", $created_at);
		$stmt->bindParam(":a_updateat", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}
	public function update(Admin $admin)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE tbl_admin 
		SET 
			a_firstname = :a_firstname,
			a_middlename = :a_middlename,
			a_lastname = :a_lastname,
			a_username = :a_username,
			a_password = :a_password,
			a_address = :a_address,
			a_datebirth = :a_datebirth,
			a_contact = :a_contact,
			a_email = :a_email,
			a_role = :a_role,
			a_status = :a_status,
			a_createat = :a_createat,
			a_updateat = :a_updateat
		WHERE admin_id = :admin_id
		");
		$stmt->bindParam(":admin_id", $admin->adminid);
		$stmt->bindParam(":a_firstname", $admin->firstname);
		$stmt->bindParam(":a_middlename", $admin->middlename);
		$stmt->bindParam(":a_lastname", $admin->lastname);
		$stmt->bindParam(":a_username", $admin->username);
		$stmt->bindParam(":a_password", $admin->password);
		$stmt->bindParam(":a_address", $admin->address);
		$stmt->bindParam(":a_datebirth", $admin->datebirth);
		$stmt->bindParam(":a_contact", $admin->contact);
		$stmt->bindParam(":a_email", $admin->email);
		$stmt->bindParam(":a_role", $admin->role);
		$stmt->bindParam(":a_status", $admin->status);
		$stmt->bindParam(":a_createat", $created_at);
		$stmt->bindParam(":a_updateat", $update_at);
	
	return $stmt->execute();
	} catch (PDOException $ex) {
		echo $ex->getMessage();
	}
	}

	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location: ../restrictbackend/index.php');
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