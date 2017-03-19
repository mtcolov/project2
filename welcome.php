<?php
$file_name = "welcome.php";
$page_title = "Welcome";

// Welcome page
session_start();
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		
	
	include_once ("includes/db_connect.php");
include_once ("includes/delete_tasks.php");

include_once ("includes/header.php");
?>

<div class="container-fluid">
<div class="row pull-right">

<?php	

echo "<div class='alert alert-success col-md-5 col-md-offset-4' role='alert'>Logged in as, " . $_SESSION['username'] . "</div>";
echo "<a href='logout.php' class='btn btn-danger btn-sm' role='button'> Log Out</a>";
 

	
?>

</div>
</div>

<?php

include_once ("includes/create_tasks.php");
include_once ("includes/update_tasks.php");
include_once ("includes/read_tasks.php");
include_once ('includes/footer.php');
	 } else {
		 include_once ("includes/header.php");
		

		 
    echo " <div class='alert alert-warning' role='alert'>Please " . "<a href='signin.php' class='alert-link'>Sign In</a> first to see this page. </div>";
	include_once ('includes/footer.php');
}