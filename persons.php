<?php
	if(isset($_POST['ID'])) {
		// connect DB
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "civilregistry";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
			die("Connection error: " . $conn->connect_error);
		}
		
		$conn->set_charset("utf8");
		
		// read POST variables
		$number_of_ids = !empty($_POST['num']) ? intval($_POST['num']) : 10; // 10 is the default
		$format = strtolower($_POST['format']) == 'json' ? 'json' : 'xml'; // xml is the default
		$code = $_POST['ID'];
		$code = "%".$code."%";
		
		// prepare, bind and execute SQL statement
		$stmt = $conn->prepare("SELECT ID, Firstname, Lastname FROM persons WHERE Firstname LIKE ? ORDER BY Firstname LIMIT ?");
		$stmt->bind_param("si", $code, $number_of_ids); // si: string integer
		$stmt->execute();
		$stmt->bind_result($code, $name, $region);
		
		$countries = array();
		while ($stmt->fetch()) {
			array_push( $countries, array("ID"=>$code, "Firstname"=>$name, "Lastname"=>$region) );
		}
		
		$stmt->close(); // close statement
		
		
		if($format == 'json') { // JSON output
			header('Content-type: application/json');
			echo json_encode(array('persons'=>$countries));
		}
		else { // XML output
			header('Content-type: text/xml');
			echo '<persons>';
			
			foreach($countries as $index => $country) {
				
				echo '<person>';
				foreach($country as $key => $value) {
					echo '<',$key,'>';
					echo htmlentities($value);
					echo '</',$key,'>';
				}
				echo '</person>';
				
			}
			
			echo '</persons>';
		}
		
		$conn->close(); // close DB connection
	}
?>		