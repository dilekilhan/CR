<?php

require_once("../LogicLayer/UserManager.php");
	
if(isset($_POST['insertNew'])){
	header("Location: insert.php");
	//exit;
}
else if(isset($_POST['deleteAnyOne'])){
	header("Location: delete.php");
	//exit;
}
else if(isset($_POST['updateAnyOne'])){
	header("Location: update.php");
	//exit;
}
else if(isset($_POST['searchOne'])){
	header("Location: search.php");
	//exit;
}
else if(isset($_POST['list'])){
	header("Location: list.php");
	//exit;
}
else if(isset($_POST['getFromKPS'])){
	header("Location: getFromKPS.php");
	//exit;
}
?>

<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Select An Operation</title>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../style/newstyle.css">
	</head>
	<body> 
		<form method="POST" action="<?php $_PHP_SELF ?>">
		<div style="height:100%; width:270px;" class="divForEdgeMenu" >
			<div>
			  <img src="../images/insertIcon.png" width="100" height="100" class="imageLogoEdgeMenu"><hr></img>
			</div>
			<div class="divUsername">
			  	<img src="../images/insertIcon.png" width="30" height="30"/>
				<span class="multiline">Welcome,<br>
				<?php 
				session_start();
				echo $_SESSION["username"];?>
				<hr></span>
			</div>
			<div class="divAccounInfo">
			<?php 
				$result = UserManager::getUserInfo($_SESSION["username"]);
				//echo $result["Type"],$result["Enrolldate"];
			?>
				<span>Account Type:
				<?php 
				echo $result["Type"];?>
				<br> Enrolldate: <?php 
				echo $result["Enrolldate"];?>
				<br> Last Activated Date: <?php 
				echo $result["LastActivatedDate"];?> <hr></span>
			</div>
			<div class="divAccounInfo">
				<img src="../images/insertIcon.png" width="20" height="20"/>
				<span>Arrange A Certificate<hr></span>
			</div>
			<div id="divLastOperations">
				<br>
				<span>Last Operations<hr></span>
			</div>
			<div class="divSupportInfo">
				<br>
				<span>Support Operations</span>
			</div>
		</div>
		
			<div class="buttonList">
				<button name="insertNew" class="btnnew">               
					<img src="../images/insertIcon.png" width="30" height="30"/>
					<span class="multiline">Button link 1
			dilek ilhana
			dşdşlşd</span>
				</button>
				
				<button name="deleteAnyOne" class="btnnew">               
					<img src="../images/insertIcon.png" width="30" height="30"/>
					<span class="multiline">Button link 1
			dilek ilhana
			dşdşlşd</span>
				</button>
				
				<button name="updateAnyOne" class="btnnew">               
					<img src="../images/insertIcon.png" width="30" height="30"/>
					<span class="multiline">Button link 1
			dilek ilhana
			dşdşlşd</span>
				</button>
				<br>
				<br>
				<button name="searchOne" class="btnnew">               
					<img src="../images/insertIcon.png" width="30" height="30"/>
					<span class="multiline">Button link 1
			dilek ilhana
			dşdşlşd</span>
				</button>
					<button name="list" class="btnnew">               
					<img src="../images/insertIcon.png" width="30" height="30"/>
					<span class="multiline">Button link 1
			dilek ilhana
			dşdşlşd</span>
				</button>
					<button name="getFromKPS" class="btnnew">               
					<img src="../images/insertIcon.png" width="30" height="30"/>
					<span class="multiline">Button link 1
			dilek ilhana
			dşdşlşd</span>
				</button>
			<div>
		</form>
	</body>
</html>
