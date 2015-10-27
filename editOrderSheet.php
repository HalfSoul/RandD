<?php
	
	if($_POST['jobNum']){
        $jobNum = $_POST['jobNum'];
		
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
	
	if($_POST['preNote']){
        $preNote = $_POST['preNote'];
    }else{
		$preNote = '';
	}
	
	$fileNum = 0;
	for ($x = 0; $x < 10; $x++) {
		$file = 'notes_' . $x;
		
		if(isset($_FILES[$file])){
			$fileNum = $fileNum + 1;
			
		}
	} 
	
	$noteString = $preNote;
	for ($i = 0; $i < $fileNum; $i++) {
		$file = 'notes_' . $i;
		if(isset($_FILES[$file])){
			$fileName = $jobNum."-".$_FILES[$file]['name'];
			$file_loc = $_FILES[$file]['tmp_name'];
			$file_size = $_FILES[$file]['size'];
			$file_type = $_FILES[$file]['type'];
			$folder="uploads/";
			move_uploaded_file($file_loc,$folder.$fileName);
			if($i == 0){
				if($preNote == ''){

					$noteString = $fileName;
				}else{
					$noteString = $noteString . "," . $fileName;
				}
			}else{
				$noteString = $noteString . "," . $fileName;
			}
			
		}
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

		// Select database
		$dbSelected = mysqli_select_db($conn, 'jobtable');

		$sqlEditPost = "UPDATE jobsheet SET job_status = '$jobStatus', sheet_colour =  '$sheetColour', completion_date = '$completionDate', 
											tasks_complete = 0, job_priority = '$jobPriority', priority_rate = '$priorityRate', 
											custmer_notes = '$noteString', ref_job = '$referenceJob', ref_spec = '$referenceSpec', 
											production_list = '$productionList'
											WHERE job_code = '$jobNum'";
					
		if ($conn->query($sqlEditPost) === TRUE) {
			echo "Your edit has been created successfully ";			
		} else {
			echo "Error: " . $sqlEditPost . "<br>" . $conn->error;
		}
		
	$conn->close();
	

?>

