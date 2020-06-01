
<?php
//Start the session to see if the user is authencticated user.
session_start();

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){


$user_name= $_SESSION['USER_ID'];
include("config.php");

if(isset($_POST["submit1"])){

  $query= " UPDATE login set login.PASSWORD= '".$_POST["password"]."'  where
            login.user_name= '".$user_name."' ";
 if(mysqli_query($mysqli, $query)){
  echo' <script>alert("Your Password is succesfully changed")</script>';
header('Location:home_page.php');
 }
}
}
else {
  header('Location:newlogin.php');
}
?>
