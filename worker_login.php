<?php

session_start();

if(isset($_POST['worker_login'])){
$conn=mysqli_connect("localhost","root","","dbms");
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


  $query= " SELECT *  FROM worker WHERE worker_id='".$_POST["worker_id"]."' AND
    password= '".$_POST["w_password"]."'   ";
    $result=mysqli_query($conn,$query);


    if(mysqli_num_rows($result)==1){
      session_start();
      $_SESSION['IS_AUTHENTICATED']=1;
      $_SESSION['worker']=$_POST['worker_id'];
      echo "you have logged in";
    echo "Today is " . date("Y-m-d") . "<br>";
    header('location:worker_profile.php');
      exit();
    }
    else{
       echo ' <script> alert("Incorrect Username or Password")</script>';
    }
    mysqli_close($conn);
}


?>


<html>
<head>
<title>workerloginpage</title>
    <link rel="stylesheet" type="text/css" href="css/workerlogin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<body background="img/pic7.jpg">
    <div class="loginbox">
    <img src="img/avatar2.jpg" class="avatar">
        <h1>Login Here</h1>

        <form method="post" action="#">

            <input id="text1" type="text" name="worker_id" placeholder="Enter worker Id" required>

            <input id="text1" type="password" name="w_password" placeholder="Enter Password" required>
            <a href="#">Forgot your password?</a><br><br>
            <input type="submit" name="worker_login" value="Login">

            <p id="link2">Don't have an account?  <a id="link2" href="worker_reg.php">Sign UP</a></p>
        </form>

    </div>

</body>
</head>
</html>
