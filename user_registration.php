<?php
         if(isset($_POST['user_name'])){
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
            $sql = "INSERT INTO customer VALUES ('".$_POST["user_name"]."','".$_POST["cust_name"]."',
              '".$_POST["gender"]."','".$_POST["contact"]."',  '".$_POST["address"]."','".$_POST["pincode"]."',
              '".$_POST["city"]."','".date("Y-m-d")."',null )";

            if (mysqli_query($conn, $sql)) {
               $sql2=" INSERT into login values ('".$_POST["user_name"]."','".$_POST["password"]."') ";
               if(mysqli_query($conn,$sql2)){
               echo "New record created successfully";
               header('location:newlogin.php');
            }
          } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
         }
         else
         echo "whats wrong here";
      ?>
