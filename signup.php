<?php
$file_name = "signup.php";
$page_title = "Signup";

include_once ("includes/db_connect.php");
include_once ("includes/header.php");

// Sign up form
?>

<div class="container">
  <h2>Please Sign Up</h2>
  <form action = "" method = "post">
  <fieldset>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name = "email" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" name = "password" id="pswd" placeholder="Enter password">
    </div>
	<div class="form-group">
      <label for="repswd">Retype Password:</label>
      <input type="password" class="form-control" name = "repassword" id="repswd" placeholder="Retype password">
    </div>
	<div class="checkbox">
      <label><input type="checkbox" name="agree" value="yes"> I Agree</label>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value = "submit">Submit</button>
  </fieldset>
  </form>
</div>


<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword']) && !empty($_POST['agree'])) {
$username = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];



	$sql="SELECT * FROM `users` WHERE `user_email`='$username' ";
	$result = mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
     if($count>=1) {
		
        echo "<div class='alert alert-info' role='alert'>User already exists. Please 
  <a href='signin.php' class='alert-link'>Sign In</a></div>";
		
       }
     elseif ($_POST['password'] == $_POST['repassword']) {

            $insert_query = "INSERT INTO `users` (`user_email`, `user_password`) VALUES ('$username', '$password')";
			$insert = mysqli_query($conn, $insert_query);
			
			$read ="SELECT * FROM `users` WHERE `user_email`='$username' AND `user_password`= '$password'";
			$result=mysqli_query($conn, $read);
			$count=mysqli_num_rows($result);
				
	
			if($count==1){
   			 
    		$_SESSION['loggedin'] = true;
    		$_SESSION['username'] = $username;
		
}
}


        
        else {
           echo "<div class='alert alert-danger' role='alert'>Passwords do not match. Please try again.</div>";
        }
        }

         else {
			echo "<div class='alert alert-info' role='alert'>You must fill in all fields and check you are agree!</div>";
		}



if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		header("Location:welcome.php");
	}
 
include_once ('includes/footer.php');
