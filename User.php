<?php 
	class User {
		private $id;
		private $name;
		private $surname;
		private $birthdate;
		private $city;
		
		function __construct($id = NULL, $name = NULL, $surname = NULL, $birthdate = NULL, $city = NULL) {
			$this->id = $id;
			$this->name = $name;
			$this->surname = $surname;
			$this->birthdate = $birthdate;
			$this->city = $city;
		}
		
		public function getID() {
			return $this->id;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getSurname() {
			return $this->surname;
		}
		
		public function getBirthdate() {
			return $this->birthdate;	
		}
		
		public function getCity() {
			return $this->city;
		}
	}
?>