<?php	
	if($_POST['color']){
        $color = $_POST['color'];
		$color = str_replace("[", "", $color);
		$color = str_replace("]", "", $color);
		//echo $color;
    }else{
	
	}
	
	if($_POST['status']){
        $status = $_POST['status'];
		$status = str_replace("[", "", $status);
		$status = str_replace("]", "", $status);
		//echo $status;
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
	$sql = "SELECT * FROM jobsheet";
	
	if(!empty($color) || !empty($status)){
		$sql .= " WHERE";
		
	}
	if(!empty($color)){
		$sql .= " sheet_colour IN (" . $color . ")";
	}
	
	if(!empty($color) && !empty($status)){
		$sql .= " AND";
		
	}
	
	if(!empty($status)){
		$sql .= " job_status IN (" . $status . ")";
	}

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