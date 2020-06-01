<?php
session_start();
//Check if the session variable for user authentication is set, if not redirect to login page.
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){


$user_name= $_SESSION['USER_ID'];
include("config.php");


}


?>
<html>
<head>
  <title>Booking Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style>
#navbar{
  padding: 30px;
  background: black;

}
#container{
  padding: 30px;
  width:50%;
  align:center;
  margin-top: 50px;
}
footer#main-footer {
  margin-top: 10%;
  padding:20px;
  height:60px;
  background: #000;
  color: #fff; }
li{
  float:left;
  margin-left:50px;
  list-style-type:none;
  color:white;
}
#link1{
  text-decoration: none;
  font-family: tahoma;
  color:white;
}
#link1 :hover{
  color:grey;
}
#hdd2{
  background: #383550;
  color:orange;
  padding:20px;
}
#container{
  border:1px;
}
</style>
</head>
<body>

<div id="navbar">
  <ul>
    <li  ><a id="link1" href="cust_profile.php">MY PROFILE</a></li>
    <li><a id="link1" href="home_page.php"> HOME</a></li>
    <li><a id="link1"href="order.php">MY ORDERS</a></li>

      <li ><a id="link1" href="user_logout.php">LOGOUT</a></li>
  </ul>
</div>





<div class="container bg-light text-danger" align="center" id="container" >
  <h2 id="hdd2" align=center>Booking form</h2>
  <form action="worker_filter.php" style="width:40%;" method="post">
        <div class="form-group">
             <label for="choose">Date</label>
             <input type="date" class="form-control" id="date" placeholder="Enter date" name="bookingdate">
        </div>
        <div class="form-group">
             <label for="pwd">Description</label>
             <input type="textarea" class="form-control" id="textarea" placeholder="detail" name="detail">
        </div>
        <div class="dropdown">
          <label for="choose Department">Department</label>



           <select  name="department">
                <option value="mason">select</option>
                <option value="mason">Mason</option>
                <option  value="electrician">Electrician</option>
                <option  value="Mechanic">Mechanic</option>
                <option  value="Painter">Painter</option>
                <option  value="Carpenter">Carpenter</option>
                <option  value="Plumber">Plumber</option>
           </select>
     </div>
     <div>
          <button type="submit" class="btn btn-warning" >BOOK</button>

    </div>
   </form>
 </div>

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
