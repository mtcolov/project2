<?php
$file_name = "register.php";
$page_title = "Register";

include_once ("includes/db_connect.php");
include_once ("includes/header.php");

session_start();
print_r($_POST);
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword']) && !empty($_POST['agree'])) {
$username = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
//$agree = $_POST['agree'];


	$sql="SELECT * FROM `users` WHERE `user_email`='$username' ";
	$result = mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
     if($count>=1) {
        echo "name already exists";
		//break;
       }
     elseif ($_POST['password'] == $_POST['repassword']) {

            $query = "INSERT INTO users(user_email, user_password) VALUES ('$username', '$password')";

            $read ="SELECT * FROM `users` WHERE `user_email`='$username' AND `user_password`= '$password'";
	$result=mysqli_query($conn, $read);
	$count=mysqli_num_rows($result);
	echo $count;
	
	if($count==1){
    //session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
		
}
}


        
        else {
           echo "Passwords do not match";
        }
        }

         else {
			echo "You must fill in all fields and check you are agree!";
		}



if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		header("Location:welcome.php");
	} else {

	//$_SESSION['email'] = $_POST['email'];
	header("Location:signup.php");
	echo 'problem';
    }
 

include_once ('includes/footer.php');
