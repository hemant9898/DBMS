
<?php
if(isset($_POST["submit"]))
{

     $conn=mysqli_connect("localhost","root","","dbms");
           if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
               }


     $query= " SELECT *  FROM login WHERE user_name='".$_POST["user_name"]."' AND
     password= '".$_POST["password"]."'   ";
     $result=mysqli_query($conn,$query);


     if(mysqli_num_rows($result)==1){


             session_start();
             $_SESSION['IS_AUTHENTICATED'] = 1;
             $_SESSION['USER_ID'] = $_POST["user_name"];
            header('location:home_page.php');

    }
    else{


    echo ' <script> alert("Incorrect Username or Password")</script>';


    }
}
?>
<html>
<head>
<title>CustomerloginSignpage</title>
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<body background="img/pic5.jpg">
    <div class="loginbox">
    <img src="img/avatar2.jpg" class="avatar">
        <h1>Login Here</h1>

        <form method="post">

            <input id="text1" type="text" name="user_name" placeholder="Enter Username" required>

            <input id="text1" type="password" name="password" placeholder="Enter Password" required>
          <br><br><br>
            <input type="submit" name="submit" value="Login">

            <p id="link2">Don't have an account?  <a id="link2" href="customer_signup.php">Sign UP</a></p>
        </form>

    </div>

</body>
</head>
</html>
