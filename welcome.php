<?php
$file_name = "welcome.php";
$page_title = "Welcome";
session_start();
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		
	
	include_once ("includes/db_connect.php");
//include_once ("includes/delete-duration.php");

include_once ("includes/header.php");
?>

<div class="container-fluid">
<div class="row pull-right">



<div class='alert alert-success alert-dismissible' role='alert'>
<span type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>
Logged in as,<?php  " . $_SESSION['username'] . "?></div>
<a href='logout.php' class='btn btn-danger btn-sm' role='button'> Log Out</a>
 
<?php	
	
?>

<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>
</div>
</div>

<?php

echo "Welcome";

include_once ('includes/footer.php');
	 } else {
		 include_once ("includes/header.php");
		

		 
    echo " <div class='alert alert-warning' role='alert'>Please " . "<a href='signin.php' class='alert-link'>Sign In</a> first to see this page. </div>";
	include_once ('includes/footer.php');
}

?>



<?php
//include_once ("includes/db_connect.php");
//include_once ("includes/delete-duration.php");

//include_once ("includes/create-duration.php");
//include_once ("includes/update-duration.php");
//include_once ("includes/read-duration.php");



