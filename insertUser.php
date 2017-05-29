<?php 
	require_once("../LogicLayer/AdminManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["usertype"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["phone"]) && isset($_POST["address"])) {
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		$usertype = trim($_POST["usertype"]);
		$firstname = trim($_POST["firstname"]);
		$lastname = trim($_POST["lastname"]);
		$phone = trim($_POST["phone"]);
		$address = trim($_POST["address"]);
		
		$errorMeesage = "";
		$result = AdminManager::insertNewUser($username, $password, $usertype, $firstname, $lastname, $phone, $address);
		if(!$result) {
			$errorMeesage = "Yeni kullanýcý kaydý baþarýsýz!";
		}
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Insert A User</title>
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
							Username        :			<input type="text" name="username" required />
							</tr>
														<p></p>
							<tr>
							Password  :	<input type="text" name="password" required />
							</tr>
														<p></p>

							<tr>
							Usertype      :	<input type="text" name="usertype" required />
							</tr>
														<p></p>

							<tr>
							First Name:	<input type="text" name="firstname" required />
							</tr>
														<p></p>

							<tr>
							Last Name :		<input type="text" name="lastname" required />
							</tr>
														<p></p>
							<tr>
							Phone :		<input type="text" name="phone" required />
							</tr>
														<p></p>
							<tr>
							Address    :			<input type="text" name="address" required />
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
