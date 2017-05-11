<?php 
	class Person {
		private $ID;
		private $Province;
		private $City;
		private $Firstname;
		private $Lastname;
		private $Birthdate;
		private $Gender;
		private $Fathername;
		private $Mothername;


		function __construct($ID = NULL, $Province = NULL, $City = NULL, $Firstname = NULL, $Lastname = NULL, $Birthdate = NULL, $Gender = NULL, $Fathername = NULL, $Mothername = NULL) {
			$this->ID = $ID;
			$this->Province = $Province;
			$this->City = $City;
			$this->Firstname = $Firstname;
			$this->Lastname = $Lastname;
			$this->Birthdate = $Birthdate;
			$this->Gender = $Gender;
			$this->Fathername = $Fathername;
			$this->Mothername = $Mothername;
		}
		
		public function getID() {
			return $this->ID;
		}
		
		public function getProvince() {
			return $this->Province;
		}
		
		public function getCity() {
			return $this->City;	
		}
		
		public function getFirstName() {
			return $this->Firstname;
		}
		
		public function getLastName() {
			return $this->Lastname;
		}
		
		public function getBirthdate() {
			return $this->Birthdate;	
		}
		
		public function getGender() {
			return $this->Gender;	
		}
		
		public function getFathername() {
			return $this->Fathername;	
		}
		
		public function getMothername() {
			return $this->Mothername;	
		}
	}
?>