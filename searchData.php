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
	$sql = "SELECT * FROM jobsheet WHERE job_code = " . $jobNum;
	

	$sql .= " ORDER BY job_priority DESC";
	//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$emparray[] = array();
		while($row = $result->fetch_assoc()) {
			$emparray[] = $row;
		}
		echo json_encode($emparray);

	} else {
		echo "0 results";
	}

	$conn->close();
?>