<?php
	define("db_host", "localhost");
	define("db_user", "logi_joharyDB");
	define("db_pass", "joharyDB");
	define("db_name", "logi_joharyDB");
	
	
	
	class db_connect{
		public $host = db_host;
		public $user = db_user;
		public $pass = db_pass;
		public $name = db_name;
		public $conn;
		public $error;
		
		
		public function connect(){
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
			
			if(!$this->conn){
				$this->error="Fatal Error: Can't connect to database" . $this->connect->connect_error();
				return false;
			}
		}
		
	}
?>
