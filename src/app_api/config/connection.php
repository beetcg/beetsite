<?php

	/**
	* To connect With MySQL database
	*/
	class connect{
		private $host = "localhost";
		private $user = "id3702617_root";
		private $pass = "123456";
		private $db = "id3702617_beet";

		public function connection(){
			$connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db) or die('MySQL Connection error');
			
			return $connect;
		}
	}