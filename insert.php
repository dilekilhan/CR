<?php 
	require_once("../LogicLayer/UserManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["ID"]) && isset($_POST["Province"]) && isset($_POST["City"]) && isset($_POST["Firstname"]) && isset($_POST["Lastname"]) && isset($_POST["Birthdate"]) && isset($_POST["Gender"]) && isset($_POST["Fathername"]) && isset($_POST["Mothername"])) {
		$ID = trim($_POST["ID"]);
		$Province = trim($_POST["Province"]);
		$City = trim($_POST["City"]);
		$Firstname = trim($_POST["Firstname"]);
		$Lastname = trim($_POST["Lastname"]);
		$Birthdate = trim($_POST["Birthdate"]);
		$Gender = trim($_POST["Gender"]);
		$Fathername = trim($_POST["Fathername"]);
		$Mothername = trim($_POST["Mothername"]);
		
		$errorMeesage = "";
		$result = UserManager::insertNewPerson($ID, $Province, $City, $Firstname, $Lastname, $Birthdate, $Gender, $Fathername, $Mothername);
		if(!$result) {
			$errorMeesage = "Yeni kişi kaydı başarısız!";
		}
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Insert A Person</title>
		<link rel="stylesheet" type="text/css" href="../style/newstyle.css">
	</head>
	<body> 
<div id="content">
<form method="POST" action="<?php $_PHP_SELF ?>">
	<table align="center" cellpadding = "5">
	<tr>
		<td>COUNTRY</td>
		<td><input type="text" name="COUNTRY" value="TURKIYE" readonly="readonly" maxlength="30"/>(max 30 characters a-z and A-Z)</td>
	</tr>
 	<tr>
		<td>CITY</td>
		<td><input type="text" name="CITY" maxlength="30"/>(max 30 characters a-z and A-Z)</td>
	</tr>
	<tr>
		<td>FIRST NAME</td>
		<td><input type="text" name="FIRST_NAME" maxlength="30"></input></td>
		<td>LAST NAME</td>
			<td><input type="text" name="LAST_NAME" maxlength="30"/></td>
	</tr>

	<tr>
		<td>BIRTH DATE</td>
		<td><input type="date" name="BIRTH_DATE" maxlength="30"/></td>
	</tr>
 
	<tr>
		<td>GENDER</td>
		<td>
		Male <input type="radio" name="Gender" value="Male" />
		Female <input type="radio" name="Gender" value="Female" />
		</td>
	</tr>
 	<tr>
		<td>FATHER NAME</td>
		<td><input type="text" name="FATHER_NAME" maxlength="30"/></td>
		<td>MOTHER NAME</td>
			<td><input type="text" name="MOTHER_NAME" maxlength="30"/></td>
	</tr>
	<tr>
		<td>Identification Number</td>
	</tr>
	<tr>
		<td><input type="radio" name="FATHER_NAME"/></td>
		<td>Identification Number</td>
		<td><input type="text" name="FATHER_NAME" maxlength="30"/></td>
	</tr>
	<tr>
		<td><input type="radio" name="FATHER_NAME"/></td>
		<td>Identification Number</td>
		<td><input type="text" name="FATHER_NAME" maxlength="30"/></td>
	</tr>
	<tr>
		<td><input type="radio" name="FATHER_NAME"/></td>
		<td>Identification Number</td>
		<td><input type="text" name="FATHER_NAME" maxlength="30"/></td>
	</tr>

 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>

</form>
 </div>
</body> 
</html>
