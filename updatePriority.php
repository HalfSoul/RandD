<?php	
	if($_POST['jobNum']){
        $jobNum = $_POST['jobNum'];
    }else{
	
	}
	
	if($_POST['jobPriority']){
        $jobPriority = $_POST['jobPriority'];
    }else{
	
	}
	
	if($_POST['priorityDate']){
        $priorityDate = $_POST['priorityDate'];
    }else{
	
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

	//create sql query
	$sql = "UPDATE jobsheet SET job_priority = '$jobPriority', priority_date = '$priorityDate' WHERE job_code = " . $jobNum;
	
	$result = $conn->query($sql);

	$conn->close();
?>