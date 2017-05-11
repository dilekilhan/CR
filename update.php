<?php 
	require_once("../LogicLayer/UserManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["ID"]) && isset($_POST["Lastname"]))
	{
		$ID = trim($_POST["ID"]);
		$lastname = trim($_POST["Lastname"]);
		
		$errorMeesage = "";
		$result = UserManager::updatePerson($ID, $lastname);
		if(!$result) {
			$errorMeesage = "Kiþi güncelleme baþarýsýz!";
		}
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Update A Person</title>
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
						Enter ID to Update:			<input type="text" name="ID" required />
						</tr>
						<p></p>
						<tr>
						Enter New Last Name:			<input type="text" name="Lastname" required />
						</tr>
												<p></p>

						<input type="submit" name="update" value="Update" />

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
