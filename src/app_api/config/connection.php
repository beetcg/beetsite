<?php

	/**
	* Connect class POO 
	* To connect With MySQL database
	*/
	class connect{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "beet";

		public function connection(){
			$connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db) or die('MySQL Connection error');
			
			return $connect;
		}
	}