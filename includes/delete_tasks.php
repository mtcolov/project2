<?php
//Delete Drugs
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	$task_id = $_GET['id'];
	$date = date('Y-m-d');
	$q = "UPDATE `tasks` SET `date_deleted`= '$date'  WHERE `task_id`= $task_id";
	$result = mysqli_query($conn, $q);
	if (mysqli_query($conn, $q)) {
		unset($_GET);
		return header('Location: welcome.php');
	} else {
		echo "Error: " . $q . " - " . mysqli_error($conn);
	}
}