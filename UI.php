<?php 
	require_once("../TheLast/LogicLayer/UserManager.php");
	$errorMeesage = "";
	
	if(isset($_POST["username"]) && isset($_POST["password"])) {
		$usr = trim($_POST["username"]);
		$passwd = trim($_POST["password"]);
		
		$errorMeesage = "";
		$result = UserManager::validateUser($usr, $passwd);
		if(!$result)
			$errorMeesage = "Login is not Successfull!";
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Welcome To CR Portal</title>
		<link rel="stylesheet" type="text/css" href="style/still.css">
	</head>
	<body> 
				<form method="POST" action="<?php $_PHP_SELF ?>">
					 <label for=""></label>
					 <br><br>
					 <p id="pr">Civil Registry Portal Login</p>
					 <br><br><br>
					 <input type="text" name="username" id="" placeholder="username" class="username">
					 <br><br>
					 <label for=""></label>
					 <input type="password" name="password" id="" placeholder="password" class="pass">
					 <br><br>
					 <input type="submit" name="" value="Login!" />
					 <?php 
									if(!isset($errorMeesage)) {
										header("Location: /OperationSelect.php");
									}
								?>

				</form>
	</body> 
</html>
