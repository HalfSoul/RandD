<?php
	
	
	
	if($_POST['specNum']){
        $specNum = $_POST['specNum'];

		echo json_encode(true);
    }else{

		echo json_encode(false);
	}
		

		
		
	/*
		require_once ("settings.php");

		$servername = $host;
		$username = $user;
		$password = $pswd;

		// Create connection
		$conn = new mysqli($servername, $username, $password);

		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		} 

		// Create database
		$dbSelected = mysqli_select_db($conn, 'databaseName');

		if (!$dbSelected) {
			$sqlDB = "CREATE DATABASE databaseName";
			if ($conn->query($sqlDB) === TRUE) {
				//echo "Database created successfully";
			} else {
				echo "Error creating database: " . $conn->error;
			}
		}
		//Create table
		$sqlTable = "CREATE TABLE IF NOT EXISTS databaseName.tableName (
			table....
		 )";

		if ($conn->query($sqlTable) === TRUE) {
			//echo "Table created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
		
		//check for specNum
		$result = $conn->query("SELECT * FROM tableName WHERE specNum = '$specNum'");
  
		if($result === FALSE) { 
			die(mysql_error());
		}
		
		while($result->num_rows > 0){
			echo "specification sheet exist!!!";
		}
			
		$conn->close();
	*/

?>

