<?php 
	require_once("../LogicLayer/AdminManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["username"]) && isset($_POST["Lastname"]))
	{
		$username = trim($_POST["username"]);
		$lastname = trim($_POST["Lastname"]);
		
		$errorMeesage = "";
		$result = AdminManager::updateuser($username, $lastname);
		if(!$result) {
			$errorMeesage = "Kullanýcý güncelleme baþarýsýz!";
		}
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Update A User</title>
		<link rel="stylesheet" type="text/css" href="style/still.css">
	</head>
	<body> 
		<div id="dvMain">
			<form method="POST" action="<?php $_PHP_SELF ?>">
				<table id="tblUsers">
					<tbody>
						<tr>
							<th>Username</th>
							<th>Password</th>
							<th>Usertype</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Phone</th>
							<th>Address</th>
						</tr>
						<?php 
							$userList = AdminManager::listAllUsers();
							
							for($i = 0; $i < count($userList); $i++) {
							?>
							<tr>
								<td><?php echo $userList[$i]->getUserName(); ?></td>
								<td><?php echo $userList[$i]->getPassword(); ?></td>
								<td><?php echo $userList[$i]->getUserType(); ?></td>
								<td><?php echo $userList[$i]->getFirstName(); ?></td>
								<td><?php echo $userList[$i]->getLastName(); ?></td>
								<td><?php echo $userList[$i]->getPhone(); ?></td>
								<td><?php echo $userList[$i]->getAddress(); ?></td>
							</tr>
							<?php
							}
						?>
							<p></p>


						<tr>
						Enter username to Update:			<input type="text" name="username" required />
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
