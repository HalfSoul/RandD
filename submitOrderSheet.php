<?php
	
	if($_POST['jobNum']){
        $jobNum = $_POST['jobNum'];
		echo $jobNum;
    }else{

	}
	
	if($_POST['sheetColour']){
        $sheetColour = $_POST['sheetColour'];
		if($sheetColour == 'yellow'){
			$sheetColour = '1';	
		}
		if($sheetColour == 'blue'){
			$sheetColour = '0';	
		}
    }else{
		
	}

	if($_POST['jobStatus']){
        $jobStatus = $_POST['jobStatus'];
    }else{
	
	}
	
	if($_POST['completionDate']){
        $completionDate = $_POST['completionDate'];
    }else{
	
	}

	if($_POST['jobPriority']){
        $jobPriority = $_POST['jobPriority'];
    }else{
	
	}
	
	if($_POST['priorityRate']){
        $priorityRate = $_POST['priorityRate'];
    }else{
	
	}

	if($_POST['referenceJob']){
        $referenceJob = $_POST['referenceJob'];
    }else{
	
	}
	
	if($_POST['referenceSpec']){
        $referenceSpec = $_POST['referenceSpec'];
    }else{
	
	}
	
	if($_POST['productionList']){
        $productionList = $_POST['productionList'];
    }else{
	
	}
	
	if(isset($_FILES['notes'])){

		$file = rand(1000,100000)."-".$_FILES['notes']['name'];
		$file_loc = $_FILES['notes']['tmp_name'];
		$file_size = $_FILES['notes']['size'];
		$file_type = $_FILES['notes']['type'];
		$folder="uploads/";
 
		move_uploaded_file($file_loc,$folder.$file);
        
    }else{
		
		$file = null;
	}

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
		$dbSelected = mysqli_select_db($conn, 'jobtable');

		if (!$dbSelected) {
			$sqlDB = "CREATE DATABASE jobtable";
			if ($conn->query($sqlDB) === TRUE) {
				//echo "Database created successfully";
			} else {
				echo "Error creating database: " . $conn->error;
			}
		}
		// Create table
		$sqlTable = "CREATE TABLE IF NOT EXISTS jobtable.jobsheet (
				 job_code VARCHAR(8) NOT NULL,
				 customer_name VARCHAR(15),
				 job_status VARCHAR(15),
				 sheet_colour TINYINT(1),
				 
				 start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				 completion_date DATE NOT NULL,
				 tasks_complete INTEGER(10),

				 job_priority DECIMAL(3.1),
				 priority_rate DECIMAL(3,1),
				 
				 custmer_notes BLOB,
				 
				 ref_job VARCHAR(8),
				 ref_spec VARCHAR(8),
				 
				 production_list VARCHAR(15),
				 
				 PRIMARY KEY (job_code)
		 )";

		if ($conn->query($sqlTable) === TRUE) {
			//echo "Table created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
		
		/*
		$result = $conn->query("SELECT * FROM jobsheet WHERE job_code = '234'");
		if($result === FALSE) { 
			die(mysql_error());
		}
		//SELECT DISTINCT(DATE(completion_date)) FROM jobsheet;
		if($result->num_rows > 0){
			//job sheet already created
			//echo json_encode(false);
		}
		$file = null;
		*/
		
		
		$sqlInsertPost = "INSERT INTO jobsheet (job_code, customer_name, job_status, sheet_colour, completion_date, tasks_complete, job_priority, priority_rate, custmer_notes, ref_job, ref_spec ,production_list)
										VALUES ('$jobNum', 'john', '$jobStatus', '$sheetColour', '$completionDate', '0', '$jobPriority', '$priorityRate', '$file', '$referenceJob', '$referenceSpec', '$productionList' )";
					
		if ($conn->query($sqlInsertPost) === TRUE) {
			echo "Your booking has been created successfully ";
			

			
		} else {
			echo "Error: " . $sqlInsertPost . "<br>" . $conn->error;
		}
		
	$conn->close();
	

?>

