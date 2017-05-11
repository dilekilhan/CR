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
		<link rel="stylesheet" type="text/css" href="style/still.css">
	</head>
	<body> 
		<div id="dvMain">
			<form method="POST" action="<?php $_PHP_SELF ?>">
				<table id="tblUsers">
					<tbody>
						<tr>
							<th>ID</th>
							<th>Province</th>
							<th>City</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Birthdate</th>
							<th>Gender</th>
							<th>Fathername</th>
							<th>Mothername</th>
						</tr>
						<?php 
							$personList = UserManager::listAllPersons();
							
							for($i = 0; $i < count($personList); $i++) {
							?>
							<tr>
								<td><?php echo $personList[$i]->getID(); ?></td>
								<td><?php echo $personList[$i]->getProvince(); ?></td>
								<td><?php echo $personList[$i]->getCity(); ?></td>
								<td><?php echo $personList[$i]->getFirstName(); ?></td>
								<td><?php echo $personList[$i]->getLastName(); ?></td>
								<td><?php echo $personList[$i]->getBirthdate(); ?></td>
								<td><?php echo $personList[$i]->getGender(); ?></td>
								<td><?php echo $personList[$i]->getFathername(); ?></td>
								<td><?php echo $personList[$i]->getMothername(); ?></td>
							</tr>
							<?php
							}
						?>
							<p></p>

							<tr>
							ID        :			<input type="text" name="ID" required />
							</tr>
														<p></p>
							<tr>
							Province  :	<input type="text" name="Province" required />
							</tr>
														<p></p>

							<tr>
							City      :	<input type="text" name="City" required />
							</tr>
														<p></p>

							<tr>
							First Name:	<input type="text" name="Firstname" required />
							</tr>
														<p></p>

							<tr>
							Last Name :		<input type="text" name="Lastname" required />
							</tr>
														<p></p>
							<tr>
							Birth Date :		<input type="date" name="Birthdate" required />
							</tr>
														<p></p>
							<tr>
							Gender    :			<input type="text" name="Gender" required />
							</tr>
														<p></p>
							<tr>
							FatherName:			<input type="text" name="Fathername" required />
							</tr>
														<p></p>
							<tr>
							MotherName:			<input type="text" name="Mothername" required />
							</tr>
														<p></p>
							<input type="submit" name="save" value="Save" />
								<?php 
									if(isset($errorMeesage)) {
										echo "<br>" . "<span style='color: red;'>" . $errorMeesage . "</span>";
									}
								?>
					</tbody>
				</table>
			</form>
		</div>
	</body> 
</html>
