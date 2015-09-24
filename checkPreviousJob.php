<?php
	
	
	
	if($_POST['JobNum']){
        $jobNum = $_POST['JobNum'];

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
		
		//check for jobNum
		$result = $conn->query("SELECT * FROM tableName WHERE jobNum = '$JobNum'");
  
		if($result === FALSE) { 
			die(mysql_error());
		}
		
		while($result->num_rows > 0){
			echo "job sheet exist!!!";
		}
			
		$conn->close();
	*/

?>

