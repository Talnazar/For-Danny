<?php

class connectDB
{
	private $host;
	private $db;
	private $user;
	private $password;
	private $charset;

	public function connectSubscriptionDB(){
		$this->host = "localhost";
		$this->db = "subscriptiondb";
		$this->user = "root";
		$this->password = "root";
		$this->charset = "utf8mb4";

		$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

		try {
			$pdo = new PDO($dsn, $this->user, $this->password);

			if ($pdo) {
				return $pdo;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

	}
	
}