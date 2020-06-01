

<?php
//Start the session to see if the user is authencticated user.
session_start();
//Check if the session variable for user authentication is set, if not redirect to login page.
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){


$workerid= $_SESSION['worker'];
include("config.php");



if(isset($_POST["submit1"])){
  $query1= " UPDATE worker set worker.PASSWORD= '".$_POST["password"]."'  where
            worker.worker_id= '".$workerid."' ";
 if(mysqli_query($mysqli, $query1)){
        echo' <script>alert("your password is succesfully Updated")</script>';

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
  <link rel="stylesheet" href="css/worker_profile.css">
  <link rel="stylesheet" href="css/slick-theme.css">
  <style>


  </style>


<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="worker_profile.php">welcome!<?php
       $query= "SELECT * from worker where worker_id= '".$workerid. "' ";

       $result=mysqli_query($mysqli,$query);
       $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

           $name=$row["w_name"];
            echo " "."$name";
       ?>
     </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="cust_profile.php">MY PROFILE</a></li>
     
      <li><a href="worker_order.php">MY ORDERS</a></li>
      

      
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
       <img id="img" src=" <?php echo $row["image"]; ?>"
       alt="User"  >

   </div>
   <div>
   <form>
     <td><h4 style="margin-left:55px;">Edit Image</h4></td>
     <td><input id="image" type="file" name="image" ></td>
    <td><button id="btn1" type="submit" name="submit" >Update</button></td>
  </form>


   </div>
   <div>
     <form method="post" >
     <p> change password</p>
      <tr>
       <td><input type="password" name="password"></td>
       <td> <button  id="btn1" type="submit" name="submit1"  >Confirm</buttton></td>
     </tr>
   </form>
   </div>
   <div>
     <form action="new2.php" method="post">
 <table width="25%" border="0">
      <tr>
          <td>
				<h4>Update Day of Availability</h4>

            <select name = 'subject[]' multiple size = 2>
				         <option value='All'>ALL</option>
                <option value = 'Monday'>MONDAY</option>
                <option value = 'Tuesday'>TUESDAY</option>
                <option value = 'Wednesday'>WEDNESDAY</option>
                <option value = 'Thursday'>THURSDAY</option>
                <option value = 'Friday'>FRIDAY</option>
                <option value = 'Saturday'>SATURDAY</option>
				        <option value = 'Sunday'>SUNDAY</option>
            </select>
          </td>
                <td><button  id="btn1" type="submit" name="upload" >Update</table></td>
      </tr>

  </table>
		</form>
   </div>
  </div>
  <div>

  </div>
  <div id="container2">
       <div class="profile">
         <h3 id="hdd1"> Your Details </h3>
         <form method="post">
            <table>

             <tr> <td id="l1"><label >Name</label></td>
                    <td id="l1"><input id="text1" type="text" name="cust_name" placeholder="<?php echo $row["w_name"]; ?>"></td>
             </tr>
             <tr>
                  <td id="l1"><label >Contact</label></td>
                  <td id="l1"><input id="text1" type="text" name="contact" placeholder="<?php echo $row["contact"]; ?>" >
                  </td>
            </tr>
            <tr>
                 <td id="l1"><label >Mail</label></td>
                 <td id="l1"><input id="text1" type="text" name="contact" placeholder="<?php echo $row["mail"]; ?>" >
                 </td>
           </tr>

           <tr>
             <td id="l1" ><label >City</label></td>
             <td id="l1">
             <input id="text1" type="text" name="city" placeholder="<?php echo $row["city"]; ?>" ></td>
           </tr>
           <tr>
             <td id="l1" ><label >Rating</label></td>
             <td id="l1">
             <input id="text1" type="text" name="city" placeholder="<?php echo $row["rating"]; ?>" ></td>
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
