<?php 
	require_once("../LogicLayer/AdminManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["username"]))
	{
		$username = trim($_POST["username"]);
		
		$errorMeesage = "";
		$result = AdminManager::deleteUser($username);
		if(!$result) {
			$errorMeesage = "Kullanýcý silme baþarýsýz!";
		}
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Delete A User</title>
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
							Enter username to delete: <input type="text" name="username" required />
							</tr>
														<p></p>
							<input type="submit" name="delete" value="Delete" />
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
