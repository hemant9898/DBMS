
 <?php

session_start();
if(isset($_SESSION['IS_AUTHENTICATED']) ){
$workerid= $_SESSION['worker'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";






// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$dates = date("Y-m-d");
$qry = "Select booking_id,worker_id,cust_id,booking_date,arriving_date
        FROM  booking
        where worker_id='$workerid' and arriving_date>='$dates'";
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
  }

  #main{
    background: linear-gradient(white,#aaa8b5);
    height:80%;
  }
  #tab1{
    background: white;
  }
  </style>
</head>
<body>
<div id="navbar">
  <ul>
    <li><a id="link1" href="worker_profile.php">MY PROFILE</a></li>
    
    <li><a id="link1"href="worker_order.php">MY ORDERS</a></li>

      <li ><a id="link1" href="user_logout.php">LOGOUT</a></li>
  </ul>
</div>
<div id="main">
<?php

echo "<center><h1>My current Orders</h1><br>";
echo "<table  border='1' cellpadding = '10'>
<tr><th>Booking ID</th>
<th>Customer ID</th>
<th>Worker ID</th>
<th>Booking Date</th>
<th>Arriving Date</th>

</tr>";
$count=0;
echo"<form >";
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))

{

echo "<tr><td>" . $row['booking_id'] . "</td>
<td>" . $row['cust_id']."</td>
<td>" . $row['worker_id'] . "</td>
<td>". $row['booking_date']."</td>
<td>". $row['arriving_date']."</td>

</tr>";

$count++;
echo "<br/>";
}
echo "</table></center>";


$qry1 = "Select record_id,worker_id,cust_id,order_date,remark,paid_amount
        FROM  record
        where worker_id='$workerid' ";
  $result1=mysqli_query($conn,$qry1);

echo"</br></br></br></br>";
echo "<center><h1><br>My Orders history</h1>";
echo"<center>";
echo "<table  border='1' cellpadding = '10'>
<tr><th>Record ID</th>
<th>Customer ID</th>
<th>Worker ID</th>
<th>Order date</th>
<th>Remark</th>
<th>Amount</th>
</tr>";
$count=0;
while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC))

{

echo "<tr><td>" . $row['record_id'] . "</td>
<td>" . $row['cust_id']."</td>
<td>" . $row['worker_id'] . "</td>
<td>". $row['order_date']."</td>
<td>". $row['remark']."</td>
<td>".$row['paid_amount']."</td>
</tr>";

$count++;
echo "<br/>";





}

echo "</table></center>";
echo"</form>";

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
