<?php
// Date difference function
function dateDifference($date_1 , $date_2 , $differenceFormat = '%R%a')
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    
    $interval = date_diff($datetime1, $datetime2);
    
    return $interval->format($differenceFormat);
    
}

	date_default_timezone_set("Europe/Sofia");	
	$b=date(" Y-m-d ");

// Sort function
	
	function sort_table ($value = NULL) {
		if ($_POST['sort'] == 'Default') {
			return "";
		
	} elseif ($_POST['sort'] == 'Term') {
			
		return "ORDER BY `task_term` ASC";
	} elseif ($_POST['sort'] == 'Name') {
			
		return "ORDER BY `task_name` ASC";
	} else {
			
		return "";
	}
	
	}
	
	if (!empty($_POST['sort'])) {
$sort_table_result = sort_table();
} else {
	$sort_table_result = "";
}

//---------------- Read tasks ---------

$user_email=$_SESSION['username'];
$read_query = "SELECT * FROM `tasks` JOIN `users` ON `users`.`user_id`=`tasks`.`user_id` JOIN `flags` ON `tasks`.`flag_id`=`flags`.`flag_id` WHERE `tasks`.`date_deleted` IS NULL AND `users`.`user_email` = '$user_email' $sort_table_result";
$result = mysqli_query($conn, $read_query);

if (mysqli_num_rows($result) >0) {
	echo "</div>
	<div class='\"col-md-8\ table-responsive'>
	<h2> Tasks List</h2>";
	?>
<div class="btn-group btn-group-justified" role="group" aria-label="Sort">

	<div class="btn-group" role="group">
		<form action="welcome.php" method="post">
			<input type="hidden" name="sort" value="Default">
				<button type="submit" class="btn btn-default">Default Sort</button>
			</form>
		</div>


		<div class="btn-group" role="group">
			<form action="welcome.php" method="post">
				<input type="hidden" name="sort" value="Term">
					<button type="submit" class="btn btn-default">Sort by Term</button>
				</form>
			</div>


			<div class="btn-group" role="group">
				<form action="welcome.php" method="post">
					<input type="hidden" name="sort" value="Name">
						<button type="submit" class="btn btn-default">Sort by Name</button>
					</form>
				</div>

			</div>


			<?php
	
	echo "<table class='table table-hover'>";
	?>

			<?php
	
	
	echo "<thead><tr><th>Task</th><th>Description</th><th>Term</th><th>Flag</th><th>UPDATE</th><th>DELETE</th></tr></thead>";
	?>

			<?php
	while($row = mysqli_fetch_assoc($result)){
			
			echo "<tr class='active'>";	
				//echo "<td>" . $row['task_id'] . "</td>";
				echo "<td>" . $row['task_name'] . "</td>";
				echo "<td>" . $row['task_description'] . "</td>";
				echo "<td>" . $row['task_term'] . "</td>";
				//echo "<td>" . $row['user_id'] . "</td>";
				//echo "<td>" . $row['user_email'] . "</td>";
				//echo "<td>" . $row['flag_id'] . "</td>";
				//echo "<td>" . $row['flag_name'] . "</td>";

				//---------------------------flag ----------//
					$c=$row['task_term'];
					$a=dateDifference("$b" , "$c"); 					
 					//$d=flags_func($a);
					//$current_flag = $d;	
					

				//--------------------------end flag ----------//
				
				
				if ($a<0) {
			$flag_name1="ACCOMPLISHED";
			echo "<td>" . "$flag_name1" . "</td>";
			echo '<td><button class="btn btn-default" disabled="disabled" href="welcome.php?action=update_form&id='.$row['task_id'] . '">update</button></td>';
				
				
				echo "<td><button class='btn btn-default' disabled='disabled' href='welcome.php?action=delete&id=".$row['task_id'] ." '>delete</button></td>";
		} else {
			if ($a!=0) {
				if ($a<7) {
					$flag_name1="NEXT";
					echo "<td>" . "$flag_name1" . "</td>";
					
					echo '<td><a class="btn btn-default" href="welcome.php?action=update_form&id= '.$row['task_id'] . '" role="button">update</a></td>';
					
					echo "<td><button class='btn btn-default' disabled='disabled' href='welcome.php?action=delete&id=".$row['task_id'] ." '>delete</button></td>";
				} else {
					$flag_name1="COMING";
					echo "<td>" . "$flag_name1" . "</td>";
					
					echo '<td><a class="btn btn-default" href="welcome.php?action=update_form&id='.$row['task_id'] . '" role="button">update</a></td>';
					echo "<td><a class='btn btn-default' href='welcome.php?action=delete&id=".$row['task_id'] ." ' role='button'>delete</a></td>";
				}
			

			} else {
				$flag_name1="TODAY";
				echo "<td>" . "$flag_name1" . "</td>";
				echo '<td><button class="btn btn-default" disabled="disabled" href="welcome.php?action=update_form&id='.$row['task_id'] . '">update</button></td>';
				
				
				echo "<td><button class='btn btn-default' disabled='disabled' href='welcome.php?action=delete&id=".$row['task_id'] ." '>delete</button></td>";
				
			}
		}
				
				
				
			
	}
	echo "</table>";
//	echo "</div>";
	

	
} else {
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! during development !!!!!!!!!!!!!!!
	//echo "Error: " . $read_query . " - " . mysqli_error($conn);

	echo "<div class='alert alert-warning' role='alert'>Nothing found! Please add task.</div>";
	
}