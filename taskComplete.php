<?php	
	if($_POST['jobNum']){
        $jobNum = $_POST['jobNum'];
		//echo $jobNum;
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

	// Create database
	$dbSelected = mysqli_select_db($conn, 'jobtable');

	//create sql query
	$sql = "UPDATE jobsheet SET tasks_complete = tasks_complete + 1 WHERE job_code = " . $jobNum;
	

	
	$result = $conn->query($sql);

	

	$conn->close();
?>