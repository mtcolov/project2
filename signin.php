<?php
$file_name = "signin.php";
$page_title = "Signin";

include_once ("includes/db_connect.php");
//include_once ("includes/delete-duration.php");
include_once ("includes/header.php");
?>

<div class="container">
  <h2>Please Sign In</h2>
  <form>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" id="pswd" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>


<?php
//include_once ("includes/create-duration.php");
//include_once ("includes/update-duration.php");
//include_once ("includes/read-duration.php");


include_once ('includes/footer.php');
