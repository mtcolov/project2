<?php
$file_name = "login.php";
$page_title = "Login";

include_once ("includes/db_connect.php");
include_once ("includes/header.php");

session_start();
     if (!empty($_POST['email']) && !empty($_POST['password'])) {
		 
		$username=$_POST['email']; 
		$password=$_POST['password']; 
		 
		 $q ="SELECT * FROM `users` WHERE `user_email`='$username' AND `user_password`= '$password'";
	$result=mysqli_query($conn, $q);
	$count=mysqli_num_rows($result);
	//echo $count;
	if($count==1){
    //session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
	// echo "Hello, " . $_SESSION['username'];
  //   echo '<a href="my_copy.php">Next</a>';
	
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		header("Location:welcome.php");
	}
	else {

	//$_SESSION['email'] = $_POST['email'];
	header("Location:signin.php");
	echo "problem";
    }
 }


include_once ('includes/footer.php');
