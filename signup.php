<?php
$file_name = "signup.php";
$page_title = "Signup";

include_once ("includes/db_connect.php");
include_once ("includes/header.php");
?>

<div class="container">
  <h2>Please Sign Up</h2>
  <form action = "register.php" method = "post">
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
  </form>
</div>


<?php
print_r($_POST);
// if(($_POST["password"])!=($_POST["repassword"])){
    // echo"Password did not match! Try again.";
// }


include_once ('includes/footer.php');
