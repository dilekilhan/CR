<?php 
	require_once("DataLayer/DB.php");
	require_once("User.php");
	
	class UserManager {
		
		public static function getAllUsers () {
			$db = new DB();
			$result = $db->getDataTable("select ID, Name, Surname, Birthdate, City from users order by Name");
			
			$allUsers = array();
			
			while($row = $result->fetch_assoc()) {
				$userObj = new User($row["ID"], $row["Name"], $row["Surname"], $row["Birthdate"], $row["City"]);
				array_push($allUsers, $userObj);
			}
			
			return $allUsers;
		}
		
		public static function insertNewUser($ID, $userName, $userSurname, $birthdate, $city) {
			$db = new DB();
			$success = $db->executeQuery("INSERT INTO users(ID, Name, Surname, Birthdate, City) VALUES ('$ID', '$userName', '$userSurname', '$birthdate', '$city')");
			return $success;
		}
		
	}
?>