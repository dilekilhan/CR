<?php 
	require_once("../DataLayer/DB.php");
	require_once("../LogicLayer/User.php");
	require_once("../LogicLayer/Person.php");
	
	class AdminManager {
		
		public static function insertNewUser ($username, $password, $usertype, $firstname, $lastname, $phone, $address) {
			$db = new DB();
			$querytoInsert = $db->executeQuery("INSERT INTO users(Username, Password, Usertype, Firstname, Lastname, Phone, Address) VALUES ('$username', '$password', '$usertype', '$firstname', '$lastname', '$phone', '$address')");
			return $querytoInsert;
		}
		
		public static function deleteUser ($username) {
			$db = new DB();
			$querytoDelete = $db->executeQuery("DELETE FROM users WHERE Username='$username'");
			return $querytoDelete;
		}
		
		public static function updateUser ($username, $lastname) {
			$db = new DB();
			$querytoUpdate = $db->executeQuery("UPDATE users SET Lastname='$lastname' WHERE Username='$username'");
			return $querytoUpdate;
		}
		
		public static function searchUser ($username) {
			$db = new DB();
			$querytoUpdate = $db->getDataTable("select * FROM users WHERE Username='$username'");
			return $querytoUpdate;
		}
		
		public static function listAllUsers () {
			$db = new DB();
			$result = $db->getDataTable("select Username, Password, Usertype, Firstname, Lastname, Phone, Address from users order by Username");
			
			$allUsers = array();
			
			while($row = $result->fetch_assoc()) {
				$personObj = new User($row["Username"], $row["Password"], $row["Usertype"], $row["Firstname"], $row["Lastname"], $row["Phone"], $row["Address"]);
				array_push($allUsers, $personObj);
			}
			
			return $allUsers;
		}
	}
?>