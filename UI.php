<?php 
	require_once("LogicLayer/UserManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["ID"]) && isset($_POST["username"]) && isset($_POST["usersurname"]) && isset($_POST["birthdate"]) && isset($_POST["city"])) {
		$id=trim($_POST["ID"]);
		$name = trim($_POST["username"]);
		$surname = trim($_POST["usersurname"]);
		$birth = trim($_POST["birthdate"]);
		$city = trim($_POST["city"]);
		
		$errorMeesage = "";
		$result = UserManager::insertNewUser($id, $name, $surname, $birth, $city);
		if(!$result) {
			$errorMeesage = "Yeni kullanıcı kaydı başarısız!";
		}
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>PHP :: 3 Tier Architecture</title>
		<link rel="stylesheet" type="text/css" href="style/site.css">
	</head>
	<body> 
		<div id="dvMain">
			<form method="POST" action="<?php $_PHP_SELF ?>">
				<table id="tblUsers">
					<tbody>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Surname</th>
							<th>Birthdate</th>
							<th>City</th>
						</tr>
						<?php 
							$userList = UserManager::getAllUsers();
							
							for($i = 0; $i < count($userList); $i++) {
							?>
							<tr>
								<td><?php echo $userList[$i]->getID(); ?></td>
								<td><?php echo $userList[$i]->getName(); ?></td>
								<td><?php echo $userList[$i]->getSurname(); ?></td>
								<td><?php echo $userList[$i]->getBirthdate(); ?></td>
								<td><?php echo $userList[$i]->getCity(); ?></td>
							</tr>
							<?php
							}
						?>
						<tr>
							
							<td>
							ID:			<input type="text" name="ID" required />
							Name:		<input type="text" name="username" required />
							Surname:	<input type="text" name="usersurname" required />

							</td>
							
							<td>
							Birthdate:	<input type="text" name="birthdate" required />
							City:		<input type="text" name="city" required />
							<p></p>
										<input type="submit" name="save" value="Save!" />
								<?php 
									if(isset($errorMeesage)) {
										echo "<br>" . "<span style='color: red;'>" . $errorMeesage . "</span>";
									}
								?>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</body> 
</html>
