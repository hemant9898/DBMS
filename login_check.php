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


   exit();
    }
}

?>
