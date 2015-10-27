<?php	
	if($_POST['jobNum']){
        $jobNum = $_POST['jobNum'];
    }else{
	
	}
	
	if($_POST['noteName']){
        $noteName = $_POST['noteName'];
    }else{
		$noteName = null;
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
	$sql = "DELETE FROM jobsheet WHERE job_code = " . $jobNum;
	
	
	$note = explode(",",$noteName);
	foreach($note as $unlink){
		$file = "uploads/" . $unlink;
		if(!is_null($noteName) ){
			unlink($file);
		}
	}

	$result = $conn->query($sql);

	$conn->close();
?>