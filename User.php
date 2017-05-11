<?php 
	class User {
		private $username;
		private $password;
		private $usertype;
		private $firstname;
		private $lastname;
		private $phone;
		private $address;

		function __construct($username = NULL, $password = NULL, $usertype = NULL, $firstname = NULL, $lastname = NULL, $phone = NULL, $address = NULL) {
			$this->username = $username;
			$this->password = $password;
			$this->usertype = $usertype;
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->phone = $phone;
			$this->address = $address;
		}
		
		public function getUserName() {
			return $this->username;
		}
		
		public function getPassword() {
			return $this->password;
		}
		
		public function getUserType() {
			return $this->usertype;	
		}
		
		public function getFirstName() {
			return $this->firstname;
		}
		
		public function getLastName() {
			return $this->lastname;
		}
		
		public function getPhone() {
			return $this->phone;	
		}
		
		public function getAddress() {
			return $this->address;	
		}
	}
?>