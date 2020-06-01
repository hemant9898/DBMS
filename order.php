
 <?php

session_start();
if(isset($_SESSION['IS_AUTHENTICATED']) ){
$user_id= $_SESSION['USER_ID'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";






// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$qry = "Select booking_id,cust_id,worker_id,booking_date,arriving_date
        FROM  booking
        where cust_id='$user_id'";
  $result=mysqli_query($conn,$qry);
?>

<html>
<head>
  <style>
  *{
    margin:0;
  }
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
    padding:30px;
  }

  #main{
    background: linear-gradient(white,#aaa8b5);
    height:75%;
  }
  #tab1{
    background:linear-gradient(white,#aaa8b5); 
    padding:30px;
  }
  #btn1{
    background:orange;
    color:black;
  }
  #btn1:hover{
    cursor:pointer;
  }
  #hdd5{
    margin-top: 50px;
    background:#27303a;
    color:orange;
    padding:10px;
    width:630px;
    align:center;
  }
  </style>
</head>
<body>
<div id="navbar">
  <ul>
    <li><a id="link1" href="cust_profile.php">MY PROFILE</a></li>
    <li><a id="link1" href="home_page.php"> HOME</a></li>
    <li><a id="link1"href="order.php">MY ORDERS</a></li>

      <li ><a id="link1" href="user_logout.php">LOGOUT</a></li>
  </ul>
</div>
<div id="main">

<?php

echo "<center><h1 id='hdd5'>My orders</h1>";
echo "<table  border='1' cellpadding = '10'>
<tr><th>Booking ID</th>
<th>Customer ID</th>
<th>Worker ID</th>
<th>Booking Date</th>
<th>Arriving Date</th>
<th>Remarks</th>
</tr>";
$count=0;
echo"<form action='Remark.php' method=POST >";
$count++;
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))

{
    $book=$row['booking_id'];
echo "<tr><td>" . $row['booking_id'] . "</td>
<td>" . $row['cust_id']."</td>
<td>" . $row['worker_id'] . "</td>
<td>". $row['booking_date']."</td>
<td>". $row['arriving_date']."</td>
<td><button type='submit' id='btn1' name='$count' value='$book'>Remarks</button></td>
</tr>";

$count++;
echo "<br/>";
}
echo"</form>";
echo "</table></center>";
}

else{

	header('Location:newlogin.php');
}


?>
</div>

<footer id="main-footer" class="text-center p-4" >
  <div class="container">
    <div class="row">
      <div class="col">
        <p align=center>Copyright 2019 &copy; LetMeHelp</p>
      </div>
    </div>
  </div>


</footer>

</body>
</html>
