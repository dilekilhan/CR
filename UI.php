<?php 
	require_once("../TheLast/LogicLayer/UserManager.php");
	$errorMeesage = "";
	
	if(isset($_POST["username"]) && isset($_POST["password"])) {
		$usr = trim($_POST["username"]);
		$passwd = trim($_POST["password"]);
		
		$errorMeesage = "";
		$result = UserManager::validateUser($usr, $passwd);
		if($result === "FALSE")
			$errorMeesage = "Login is not Successfull!";
		else
		{
			session_start();
			header("Location: PresentationLayer/OperationSelect.php");
		}
	}
?>

<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Welcome To CR Portal</title>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style/newstyle.css">
	</head>
	<body class="login"> 
				<div class="divForLoginLogoImage">
					 <img src="images/people.jpg" height="42" width="42">
				</div>
				<div class="divForLoginHeader">
					 <h1>Get Every One In The Picture<hr color="blue"></h1>
				</div>
				
				<div class="divForLoginInfoPharagraph">
					 <p>Get Every One In The Picture<br>new line<br>nw lien</p>
				</div>
				<form method="POST" class="formLogin" action="<?php $_PHP_SELF ?>">

					 <label for=""></label>
					 <br><br>
					 <p id="pr">Civil Registry Portal Login</p>
					 <br><br><br>
					 <input type="text" name="username">
					 <br><br>
					 <label for=""></label>
					 <input type="password" name="password">
					 <br><br>
					 <input type="submit" name="" value="Login!" />
				</form>
				<br><br><br><br><br>
				<hr>

				<div class="divForLoginBottomInfoPharagraph">
					 <p>Get Every One In The Picture<br>new line<br>nw lien</p>
				</div>

	</body> 
</html>
