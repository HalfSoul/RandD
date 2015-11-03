<?php

	$connection = mysql_connect("localhost","root","");
	if(!$connection) {
	die("can not connect: " . mysql_error());
	}
	mysql_select_db("jobtable",$connection);
	
	if(isset($_POST['update'])) {
		$UpdateQuery = "UPDATE specsheet SET product_name = '$_POST[product_name]', description = '$_POST[description]', cut_list = '$_POST[cut_list]', packing = '$_POST[packing]', submit = '$_POST[submit]', drawing = '$_POST[drawing]'
		WHERE product_name = '$_POST[hidden]'";
		mysql_query($UpdateQuery, $connection);
	}
	
	$sql = "SELECT * FROM specsheet";
	$myData = mysql_query($sql,$connection);
	echo "<table border = 1>
	<tr>
	<th>Date</th>
	<th>Product</th>
	<th>Description</th>
	<th>Cut List</th>
	<th>Packing</th>
	<th>File Uploaded</th>
	<th>Drawing</th>
	</tr>";
	
	while($record = mysql_fetch_array($myData)) {
		echo "<form action = pullingTwo.php method = post>";
		echo "<tr>";
		echo "<td>" . "<input type = text name = topic value=" . $record['date_create'] . " </td>";
		echo "<td>" . "<input type = text name = topic value=" . $record['product_name'] . " </td>";
		echo "<td>" . "<input type = text name = topic value=" . $record['description'] . " </td>";
		echo "<td>" . "<input type = text name = topic value=" . $record['cut_list'] . " </td>";
		echo "<td>" . "<input type = text name = topic value=" . $record['packing'] . " </td>";
		echo "<td>" . "<input type = text name = topic value=" . $record['submit'] . " </td>";
		echo "<td>" . "<input type = text name = topic value=" . $record['drawing'] . " </td>";
		echo "<td>" . "<input type = submit name = update value = update" . " </td>";
		echo "</form>";
	}
	
	echo "</table>";
	mysql_close($connection);
	
?>

	