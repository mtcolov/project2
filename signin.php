<?php
$file_name = "signin.php";
$page_title = "Signin";

include_once ("includes/db_connect.php");
include_once ("includes/header.php");
?>

<div class="container">
  <h2>Please Sign In</h2>
  <form action = "login.php" method = "post">
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
print_r($_POST);


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true){
		header("Location:signin.php");
		echo 'problem';
	}

include_once ('includes/footer.php');
