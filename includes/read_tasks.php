<?php

function dateDifference($date_1 , $date_2 , $differenceFormat = '%R%a')
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    
    $interval = date_diff($datetime1, $datetime2);
    
    return $interval->format($differenceFormat);
    
}

	date_default_timezone_set("Europe/Sofia");	
	$b=date(" Y-m-d ");

//-----
	function flags_func($a){
	 	if ($a>=0) {
			if ($a==0) {
				$flag_name1="TODAY";
				
			}
			
			elseif ($a>0 && $a<=7) {
				$flag_name1="NEXT";
				
			} elseif ($a>7) {
				$flag_name1="COMING";
				
			}		

		} else {
			$flag_name1="FINISHED";
		}
		
		echo "<td>" . "$flag_name1" . "</td>";
 	}

//-------end function Date ------------
?>



<?php
//---------------- Welcome read tasks ---------

//if(empty($_POST['submit'])){
//$user_email=$_GET['user_email'];
$user_email=$_SESSION['username'];
$read_query = "SELECT * FROM `tasks` JOIN `users` ON `users`.`user_id`=`tasks`.`user_id` JOIN `flags` ON `tasks`.`flag_id`=`flags`.`flag_id` WHERE `tasks`.`date_deleted` IS NULL AND `users`.`user_email` = '$user_email'";
$result = mysqli_query($conn, $read_query);

if (mysqli_num_rows($result) >0) {
	echo "</div>
	<div class='\"col-md-8\ table-responsive'>
	<h2> Tasks List</h2>";
	echo "<table class='table table-hover'>";
	echo "<tr><td>TASK</td><td>Description</td><td>Term</td><td>Flag</td><td>UPDATE</td><td>DELETE</td></tr>";
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
 					$d=flags_func($a); 				

				//--------------------------end flag ----------//
				// $task_id = 	$row['task_id'];
				// function update_flags($d, $task_id){
					
	// switch($d):
				
	// case $d="TODAY":
	// $update_query = "UPDATE `tasks` SET `flag_id`= '1' WHERE `task_id`= $task_id";
	// return $update_flag = mysqli_query($conn, $update_query);
	// break;
	// case $d="NEXT":
	// $update_query = "UPDATE `tasks` SET `flag_id`= '2' WHERE `task_id`= $task_id";
	// return $update_flag = mysqli_query($conn, $update_query);
	// break;
	// case $d="COMING":
	// $update_query = "UPDATE `tasks` SET `flag_id`= '3' WHERE `task_id`= $task_id";
	// return $update_flag = mysqli_query($conn, $update_query);
	// break;
	// case $d="FINISHED":
	// $update_query = "UPDATE `tasks` SET `flag_id`= '4' WHERE `task_id`= $task_id";
	// return $update_flag = mysqli_query($conn, $update_query);
	// break;
	// // default:
	// // return "Invalid input!";
	// endswitch;
	 	
 	// }
				
				
				// switch($flag_name1):
		
	// case $flag_name1 = "COMING":
	// echo '<td><button class="btn btn-default" href="welcome.php?action=update_form&id='. $row['task_id'] . '" >update</button></td>';
				
				
				// echo "<td><button class='btn btn-default' href='welcome.php?action=delete&id=". $row['task_id'] ."'>delete</button></td>";
				
						// echo "</tr>";
	// break;
	
	// case $flag_name1 = "NEXT":
	// echo '<td><button class="btn btn-default" href="welcome.php?action=update_form&id='.$row['task_id'] . '" >update</button></td>';
	// echo "<td><button class='btn btn-default' disabled='disabled' href='welcome.php?action=delete&id=".$row['task_id'] ." '>delete</button></td>";
				
						// echo "</tr>";
	// break;
	
	// default:
	// echo '<td><button class="btn btn-default" disabled="disabled" href="welcome.php?action=update_form&id='.$row['task_id'] . '">update</button></td>';
				
				
				// echo "<td><button class='btn btn-default' disabled='disabled' href='welcome.php?action=delete&id=".$row['task_id'] ." '>delete</button></td>";
				
						// echo "</tr>";
	// endswitch;
				
				
				
				echo '<td><a class="btn btn-default" href="welcome.php?action=update_form&id='.$row['task_id'] . '" role="button">update</a></td>';
				
				
				echo "<td><a class='btn btn-default' href='welcome.php?action=delete&id=".$row['task_id'] ." ' role='button'>delete</a></td>";
				
						echo "</tr>";
				
			
	}
	echo "</table>";
//	echo "</div>";
	

	
} else {
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! during development !!!!!!!!!!!!!!!
	//echo "Error: " . $read_query . " - " . mysqli_error($conn);

	echo "<div class='alert alert-warning' role='alert'>Nothing found! Please add task.</div>";
	
}


// $x=dateDifference("2017-3-18" , "2017-4-22"); 					
// $y=flags_func($x); 

// echo $y;