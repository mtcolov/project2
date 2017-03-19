<?php

//Update Tasks
		if (isset($_POST['update_name']) && $_POST['action'] == 'update') {
			$task_id = $_POST['task_id'];
			$update_name1 = $_POST['update_name'];
			$update_name2 = $_POST['update_description'];
			$update_name3 = $_POST['update_term'];
			
			$update_query = "UPDATE `tasks` SET `task_name`= '$update_name1', `task_description`= '$update_name2', `task_term`= '$update_name3' WHERE `task_id`= $task_id";
			if (mysqli_query($conn, $update_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $update_name1 . '</strong> updated successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $update_query . " - " . mysqli_error($conn);
			}
			if(isset($_GET)) {unset($_GET);}
		}

//Update Task Form
if (isset($_GET['action']) && $_GET['action'] == 'update_form') {
	$task_id = $_GET['id'];
	$q = "SELECT * FROM `tasks` WHERE task_id = $task_id";
	$result = mysqli_query($conn, $q);
//print_r($result);
	if (mysqli_num_rows($result) !==0) {
		$row_edit = mysqli_fetch_assoc($result);
	
	//print_r($row_edit);
}


?>
<form method="post" action="welcome.php">
			<h2>Edit Task</h2>
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="task_id" value="<?= $task_id ?>">
			<label class="text-primary"> Task Name:
				<input class="form-control" type="text" name="update_name" value="<?= $row_edit['task_name'] ?>">
			</label>
			
			<label class="text-primary"> Task Description:
				<textarea class="form-control" name="update_description" value="<?= $row_edit['task_description'] ?>"></textarea>
			</label>
			
			<label class="text-primary"> Task Term:
				<input type="date" class="form-control" name = "update_term" value="<?= $row_edit['task_term'] ?>">
			</label>
			
			<input class="btn btn-primary" type="submit" name="submit" value="Update">
		</form>
		<?php

}