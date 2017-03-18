<?php

$read_query = "SELECT * FROM `users` WHERE `user_email`='" . $_SESSION['username'] . "'";

$result = mysqli_query($conn, $read_query);
       
          $row = mysqli_fetch_assoc($result);
		  $current_user_id = $row['user_id'];
         
?>


<div class="col-md-4">
  <h2>Add task</h2>
  <form action = "<?= $file_name ?>" method = "post">
  <input type="hidden" name="action" value="add">
    <div class="form-group">
      <label for="task_name">Task name:</label>
      <input type="text" class="form-control" name = "task_name" id="task_name" placeholder="Enter the task">
    </div>
    <div class="form-group" >
      <label for="task_description">Task description:</label>
      <textarea class="form-control" name="task_description" id="task_description" placeholder="Enter description for task"></textarea>
    </div>
    <div class="form-group">
      <label for="task_term">Task term:</label>
      <input type="date" class="form-control" name = "task_term" id="task_term" placeholder="yyyy-mm-dd">
    </div>
  
	   <?php
	 echo "<input type='hidden' name='user_id' id='user_id' value='" . $current_user_id . "' >";
      
        ?>
     
	<input class="btn btn-primary" type = "submit" value = "Add" name = "submit" />
    <!-- <button type="submit" class="btn btn-default" name = "submit"> Submit </button> -->
  </form>
<!-- </div> -->


<?php

if(!empty($_POST['task_name'])){

  $task_name=$_POST['task_name'];
  $task_description=$_POST['task_description'];
  $task_term=$_POST['task_term']; 
  $user_id=$_POST['user_id'];
  // $flag_id=$_POST['flag_id'];
  

  //$insetr_query="INSERT INTO `tasks`(`task_name`) VALUES ('$task_name')";
  $insert_query="INSERT INTO `tasks`(`task_name`, `task_description`, `task_term`, `user_id`) VALUES ('$task_name', '$task_description', '$task_term', '$user_id')";

  if (mysqli_query($conn, $insert_query)) {
   echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
	echo "<strong>Success!</strong>";
	echo '		</div>' . "\n";
} else {
  //!!!!!!!!!!!!
  echo "Error: ". $insert_query."-" . mysqli_error($conn);
}

}

//-------------------End Welcome new task ---------
