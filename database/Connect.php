<?php

include("config.php");

class Connect {
	public $db;

	public function __construct() {
		$this->db = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);
	}
}

?>