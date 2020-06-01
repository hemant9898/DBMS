

<?php

         if(isset($_POST['register'])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dbms";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
            $sql = "INSERT INTO worker(worker_id,w_name,Gender,contact,mail,start_date,city,password)
            VALUES ('".$_POST["worker_id"]."','".$_POST["w_name"]."',  '".$_POST["gender"]."',
              '".$_POST["w_contact"]."',  '".$_POST["email_id"]."','".date("Y-m-d")."',
              '".$_POST["w_city"]."','".$_POST["w_password"]."' )";

            if (mysqli_query($conn, $sql)) {
               $sql1 = "INSERT INTO worksfor   VALUES ('".$_POST["department"]."',
               '".$_POST["worker_id"]."')";
               if(mysqli_query($conn,$sql1)){

                 $sql2 = "INSERT INTO day_of_avail(worker_id) VALUES ('".$_POST["worker_id"]."')";
                 {
                   if(mysqli_query($conn,$sql2))
                 echo "Account successfully created";
                 header('location:worker_login.php');
               }
               }

            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
         }

?>
<html>
<head>
<title>worker registration page</title>
<link rel="stylesheet" type="text/css" href="css/worker_signup.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>

<body background="img/pic3.jpg">
  <div class="loginbox">

<h3 align="center"> CREATE AN ACCOUNT AND START WORKING </h3>
<h5 align="center"> its easy and simple</h5>

<form  method="post" action="#">


     <input  name="worker_id" type="text" id="worker_id" placeholder="user_name">
    <input name="w_name" type="text" placeholder="Name"></td>
    <input name="w_contact" type="text" placeholder="Mobile Number">
    <input name="email_id" type="text" placeholder="Email address">
    <input name="w_city" type="text" placeholder="city">
    <input name="w_password" type="password" placeholder="create password">

    <p id="text1">Department  <select  name="department" id="select1">
       <option value="Mason">Mason</option>
       <option value="Electrician">Electrician</option>
       <option value="Mechanic">Mechanic</option>
       <option value="Painter">Painter</option>
       <option value="Carpenter">Carpenter</option>
       <option value="Plumber">Plumber</option>
  </select></p>
  <br>
  <p id="text1"> Gender  <select  name="gender" id="select1">
           <option value="">Select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>


     </select></p>
     <br>
<input type="submit" name="register" value="Register" />

<h5 align="center"> HAVE A  WORKING ACCOUNT <a href="worker_login.php">SIGN IN </a> </h5>
</div>
</body>
</html>
