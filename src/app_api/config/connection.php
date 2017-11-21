<?php

	/**
	* Connect class POO 
	* To connect With MySQL database
	*/
	class connect{
		private $host = "mysql.hostinger.es";
		private $user = "u420574110_root";
		private $pass = "123456";
		private $db = "u420574110_beet";

		public function connection(){
			$connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db) or die('MySQL Connection error');
			
			return $connect;
		}
	}