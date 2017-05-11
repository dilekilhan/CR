<?php 
	require_once("../DataLayer/DB.php");
	require_once("../LogicLayer/User.php");
	require_once("../LogicLayer/Person.php");
	
	class UserManager {
		
		public static function validateUser($username, $password) {
			$db = new DB();
			$result = $db->getDataTable("select * from users where Username='".$username."' and Password='".$password."' ");
			
		if($result)  {
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
		}
		else {
			if($username=="" or $password=="") {
				echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! </center>";
			}
			else {
				echo "<center>Kullanici Adi/Sifre Yanlis.<br></center>";
			}
		}
			return $result;
		}
		
		public static function insertNewPerson ($id, $province, $city, $firstname, $lastname, $birthdate, $gender, $fathername, $mothername) {
			$db = new DB();
			$querytoInsert = $db->executeQuery("INSERT INTO persons(ID, Province, City, Firstname, Lastname, Birthdate, Gender, Fathername, Mothername) VALUES ('$id', '$province', '$city', '$firstname', '$lastname', '$birthdate', '$gender', '$fathername', '$mothername')");
			return $querytoInsert;
		}
		
		public static function deletePerson ($id) {
			$db = new DB();
			$querytoDelete = $db->executeQuery("DELETE FROM persons WHERE ID=id");
			return $querytoDelete;
		}
		
		public static function updatePerson ($id, $lastname) {
			$db = new DB();
			$querytoUpdate = $db->executeQuery("UPDATE persons SET Lastname=lastname WHERE ID=id");
			return $querytoUpdate;
		}
		
		public static function searchPerson ($id) {
			$db = new DB();
			$querytoUpdate = $db->getDataTable("select * FROM persons WHERE ID=id");
			return $querytoUpdate;
		}
		
		public static function listAllPersons () {
			$db = new DB();
			$result = $db->getDataTable("select ID, Province, City, Firstname, Lastname, Birthdate, Gender, Fathername, Mothername from persons order by ID");
			
			$allPersons = array();
			
			while($row = $result->fetch_assoc()) {
				$personObj = new Person($row["ID"], $row["Province"], $row["City"], $row["Firstname"], $row["Lastname"], $row["Birthdate"], $row["Gender"], $row["Fathername"], $row["Mothername"]);
				array_push($allPersons, $personObj);
			}
			
			return $allPersons;
		}
	}
?>