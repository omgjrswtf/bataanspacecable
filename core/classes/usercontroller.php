<?php 
require_once 'user.php';

class UserController{
		protected $pdo;
		public $data;
		public $user;

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
				user_id as userid,
				u_name as username,
				u_employee as employee,
				u_ipcrNo as upcrno,
				u_password as password,
				u_active as active,
				u_status as status,
				u_atcreate as atcreate,
				u_atupdate as atupdate
			FROM user_db
			WHERE u_name = :username and u_password = :password 
		");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function save(User $user){
		$created_at = date('Y-m-d H:i:s');
	try {
	if (isset($user->userid)) {
		return $this->update($user);
	}

		$stmt = $this->pdo->prepare("
		INSERT INTO `user_db` (
			`u_name`,
			`u_employee`,
			`u_ipcrNo`,
			`u_password`,
			`u_active`,
			`u_status`,
			`u_atcreate`,
			`u_atupdate`
			)
		VALUES (
			:u_name,
			:u_employee,
			:u_ipcrNo,
			:u_password,  
			:u_active, 
			:u_status, 
			:u_atcreate,
			:u_atupdate);
		");

		$stmt->bindParam(":u_name", $user->username);
		$stmt->bindParam(":u_employee", $user->employee);
		$stmt->bindParam(":u_ipcrNo", $user->upcrno);
		$stmt->bindParam(":u_password", $user->password);
		$stmt->bindParam(":u_active", $user->active);
		$stmt->bindParam(":u_status", $user->status);
		$stmt->bindParam(":u_atcreate", $created_at);
		$stmt->bindParam(":u_atupdate", $created_at);

		return $stmt->execute();
			
	} catch (PDOException $ex) {
		echo $ex->getMessage();	
		}
	}

	public function userData($user_id){
		$stmt = $this->pdo->prepare("
			SELECT
				user_id as userid,
				u_name as username,
				u_employee as employee,
				u_ipcrNo as upcrno,
				u_password as password,
				u_active as active,
				u_status as status,
				u_atcreate as atcreate,
				u_atupdate as atupdate
			FROM user_db 
			WHERE user_id = :user_id 
		");
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

	    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
	    $results = $stmt->fetch();

	    $this->json = json_encode($results);
	    $this->data = json_decode($this->json);

	    return $results;
	}

	public function findUsers(){
		$stmt = $this->pdo->prepare("
			SELECT
				user_id as userid,
				u_name as username,
				u_employee as employee,
				u_ipcrNo as upcrno,
				u_password as password,
				u_active as active,
				u_status as status,
				u_atcreate as atcreate,
				u_atupdate as atupdate
			FROM 
				user_db
		");
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
		$results = $stmt->fetchAll();
		
		$this->json = json_encode($results);
		$this->data = json_decode($this->json);

		return $results;
	}

	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location: ../index.php');
	}

	public function checkUsername($username){
		$stmt = $this->pdo->prepare("SELECT `u_name` FROM `user_db` WHERE `username` = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();

		$count = $stmt->rowCount();
		if ($count > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function update(User $user)
	{

	try {
	$update_at = date('Y-m-d H:i:s');
	$stmt = $this->pdo->prepare("
		UPDATE user_db 
		SET 
			u_name = :username,
			u_employee = :employee,
			u_ipcrNo = :upcrno,
			u_password = :password,
			u_active = :active,
			u_status = :status,
			u_atcreate = :atcreate,
			u_atupdate = :atupdate
		WHERE user_id = :userid
		");
		$stmt->bindParam(":userid", $user->userid);
		$stmt->bindParam(":username", $user->username);
		$stmt->bindParam(":employee", $user->employee);
		$stmt->bindParam(":upcrno", $user->upcrno);
		$stmt->bindParam(":password", $user->password);
		$stmt->bindParam(":active", $user->active);
		$stmt->bindParam(":status", $user->status);
		$stmt->bindParam(":atcreate", $user->atcreate);
		$stmt->bindParam(":atupdate", $update_at);
	
	return $stmt->execute();
	} catch (PDOException $ex) {
		echo $ex->getMessage();
	}
	
	
	}

	public function updatepass(User $user)
	{
	$update_at = date('Y-m-d H:i:s');

	$stmt = $this->pdo->prepare("
		UPDATE user_db 
		SET
			u_password = :password,
			u_atupdate = :atupdate
		WHERE user_id = :userid
	");
	$stmt->bindParam(':userid', $user->userid);
	$stmt->bindParam(':password', $user->password);
	$stmt->bindParam(':atupdate', $update_at);

	
	return $stmt->execute();

	}
}
?>