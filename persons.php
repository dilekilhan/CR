<?php
require_once("DataLayer/DB.php");

	$person= "FALSE";
    $db = new DB();
		
	if(isset($_GET['TCNumber']) & !isset($_GET['Name']) & !isset($_GET['Surname']) & !isset($_GET['BirthYear']))
	{
			$code = $_GET['TCNumber'];
			$stmt = $db->getDataTable("SELECT TCNumber FROM peopleRecords WHERE TCNumber='$code'");
			while ($row = $stmt->fetch_assoc())
			{
				$person= "TRUE";
			}
                $stmt->close(); // close statement
		
		header('Content-type: application/json');
			echo json_encode(array('persons'=>$person));
	}
	else if(isset($_GET['TCNumber']) & isset($_GET['Name']) & isset($_GET['Surname']) & isset($_GET['BirthYear'])) 
	{
		$code = $_GET['TCNumber'];
        $birthyear= $_GET['BirthYear'];
		
        if (preg_match('/^\d{11}$/', $code) & preg_match('/^\d{4}$/', $birthyear))
        {
          header('Content-Type: text/xml');
		  $client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
		  $requestData = array(
			"TCKimlikNo" => $_GET['TCNumber'],
			"Ad" => $_GET['Name'],
			"Soyad" => $_GET['Surname'],
			"DogumYili" => $_GET['BirthYear']
			);
		  $result = $client->TCKimlikNoDogrula($requestData);
		  if ($result->TCKimlikNoDogrulaResult === true){
			$person= "TRUE";
		  }
        }  
        else 
		{
            $person= "FALSE";
        }

		header('Content-type: application/json');
			echo json_encode(array('persons'=>$person));
	}
	else if(isset($_GET['PassportNumber'])) 
	{
		$code = $_GET['PassportNumber'];
			$stmt = $db->getDataTable("SELECT PassportNumber FROM peopleRecords WHERE PassportNumber='$code'");
			while ($row = $stmt->fetch_assoc())
			{
				$person= "TRUE";
			}
        $stmt->close(); // close statement
		header('Content-type: application/json');
			echo json_encode(array('persons'=>$person));
	}

	else if(isset($_GET['DrivingLicenseNumber'])) 
	{
		$code = $_GET['DrivingLicenseNumber'];
			$stmt = $db->getDataTable("SELECT DrivingLicenseNumber FROM peopleRecords WHERE DrivingLicenseNumber='$code'");
			while ($row = $stmt->fetch_assoc())
			{
				$person= "TRUE";
			}
        $stmt->close(); // close statement
		header('Content-type: application/json');
			echo json_encode(array('persons'=>$person));
	}
?>