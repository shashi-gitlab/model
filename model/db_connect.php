<?php
	require_once"db_parameter.php";

	abstract class db_connect implements db_parameter{

		var $conn="";
		function __construct()
		{
			if(session_id()==""):
				session_start();
			// echo session_id();
			endif;
			
			$this->conn= mysqli_connect(self::HOST, self::USER, self::PASS, self::DATABASE);
			// echo "<pre>";
			// print_r($this->conn);
			// echo "</pre>";
		}
		
		function __destruct()
		{
			$result= mysqli_close($this->conn);
		}
	}

?>
