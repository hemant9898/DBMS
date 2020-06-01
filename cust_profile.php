

<?php
//Start the session to see if the user is authencticated user.
session_start();
//Check if the session variable for user authentication is set, if not redirect to login page.
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){


$user_name= $_SESSION['USER_ID'];
include("config.php");


if(isset($_POST["signup"])){

  $file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query6= " UPDATE customer set user_image= '$file'  where
            user_name= '$user_name' ";
 if(mysqli_query($mysqli, $query6)){
        echo' <script>alert("Profile is succesfully changed")</script>';


 }
}
}

?>


<html lang="en">
<head>
  <title>user_profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/cust_profile.css">
  <link rel="stylesheet" href="css/slick-theme.css">


<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="cust_profile.php">welcome!<?php
       $query= "SELECT * from customer where user_name= '".$user_name."' ";
       $result=mysqli_query($mysqli,$query);
       $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

           $name=$row["cust_name"];
            echo " "."$name";
       ?>
     </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="cust_profile.php">MY PROFILE</a></li>
      <li><a href="home_page.php"> HOME</a></li>
      <li><a href="order.php">MY ORDERS</a></li>
      <li><a href="#">CONTACT US</a></li>

      <li><a href="booking_worker.php">BOOK NOW</a></li>
    </ul>
    <ul class="nav navbar-nav" style="float:right;">


      <li ><a href="user_logout.php">LOGOUT</a></li>

    </ul>
  </div>
</nav>
<container>

<div>
  <div id="container1">

   <div id="image_sec">
     <img id="img" src="data:image/jpeg;base64, <?php echo base64_encode($row["user_image"]); ?>"
      alt="User" class="img-fluid rounded-circle mb-2" >

   </div>
   <div>
   <form method="post" enctype="multipart/form-data">
     <td><label id="l1">Edit Image</label></td>
     <td><input id="image" type="file" name="image" /></td>
    <td><button id="btn1" type="submit" name="signup" >Update</button></td>
  </form>


   </div>
   <div><form method="post" action="user_profile_update.php">
     <p> change password</p>
      <tr>
       <td><input type="password" name="password"></td>
       <td> <button id="btn1" type="submit" name="submit1" > confirm</button></td>
     </tr>
   </form>
   </div>
  </div>
  <div>

  </div>
  <div id="container2">
       <div class="profile">
         <h3 id="hdd1"> Your Contact Details </h3>
         <form method="post" action="user_profile_update.php">
            <table>

             <tr> <td id="l1"><label >Name</label></td>
                    <td id="l1"><input id="text1" type="text" name="cust_name" placeholder="<?php echo $row["cust_name"]; ?>"></td>
             </tr>
             <tr>
                  <td id="l1"><label >Contact</label></td>
                  <td id="l1"><input id="text1" type="text" name="contact" placeholder="<?php echo $row["contact"]; ?>" >
                  </td>
            </tr>
            <tr>    <td id="l1" ><label>Address</label></td>
             <td id="l1" ><input id="text1" type="text" name="address" placeholder="<?php echo $row["address"]; ?>" ></td>
           </tr>
           <tr>
             <td id="l1" ><label >City</label></td>
             <td id="l1">
             <input id="text1" type="text" name="city" placeholder="<?php echo $row["city"]; ?>" ></td>
           </tr>
           <tr>
             <td id="l1"><label >Pincode</label></td>
             <td id="l1"><input id="text1" type="text" name="pincode" placeholder="<?php echo $row["pincode"]; ?>" ></td>

           </tr>




           </table>
         </form>
       </div>

  </div>
</div>

</container>

<footer id="main-footer" class="text-center p-4">
  <div class="container">
    <div class="row">
      <div class="col">
        <p>Copyright 2019 &copy; LetMeHelp</p>
      </div>
    </div>
  </div>
</footer>


</body>
</html>
