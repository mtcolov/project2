<?php
$file_name = "signin.php";
$page_title = "Signin";

include_once ("includes/db_connect.php");
include_once ("includes/header.php");
?>

<div class="container">
  <h2>Please Sign In</h2>
  <form action = "" method = "post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name = "email" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" name = "password" id="pswd" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>


<?php
session_start();
     if (!empty($_POST['email']) && !empty($_POST['password'])) {
		 
		$username=$_POST['email']; 
		$password=$_POST['password']; 
		 
		 $q ="SELECT * FROM `users` WHERE `user_email`='$username' AND `user_password`= '$password'";
	$result=mysqli_query($conn, $q);
	$count=mysqli_num_rows($result);
	
	if($count==1){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
	
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		header("Location:welcome.php");
	}
	else {

	echo "<div class='alert alert-danger' role='alert'>Please check your credentials and try again!</div>";
    }
 }

include_once ('includes/footer.php');
