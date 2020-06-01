<?php
$conn = mysqli_connect("localhost", "root", "","dbms");
if(mysqli_connect_errno()){
	echo"failed".mysqli_connect_error();
}

$date=$_POST["bookingdate"];
$department=$_POST["department"];

$day = date('l',strtotime($date));


?>

<html>
<head>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script>
function myFunction() {
  alert("Your booking has been confirmed.");
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}



.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 100%;
  margin: auto;
  text-align: center;
  font-family: arial;

}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
	<div  align="center">

<h2 style="text-align:center">Worker Profile Card</h2>



   <?php

   $query = "SELECT worker.w_name,worker.worker_id,worker.contact,worker.mail,worker.image From worker,worksfor,day_of_avail
	  where worker.worker_id=day_of_avail.worker_id and worker.worker_id=worksfor.worker_id and day_of_avail.day='".$day."'   and worksfor.d_name='".$_POST["department"]."'";
      $result = mysqli_query($conn,$query);
if(empty($result))
echo "NO WORKER FOUND GO FUCK YOURSELF";
$g=0;
while($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{  $name=$row["worker_id"];

  ?>
	<form action="booking_order.php" method="GET">
  <div class="row">
  <div class="column">
  <div class="card">
  <img src="<?php echo $row["image"];?>" alt="John" style="width:60%">
  <h1><?php echo $row["w_name"];?></h1>

	<p class="title">Worker ID : <?php echo $row["worker_id"];?></p></input>
  <p class="title"> Contact No. : <?php echo $row["contact"];?></p>
   <p class="title"> Mail ID : <?php echo $row["mail"];?></p>
	<p> <button onclick="myFunction()" name="<?php echo $g;?>" value="<?php echo $name ;?>" type="submit" >Book</button></p>

</div>
</div>
<?php
$g++;
}


?>

</div>
</div>

</form>
</body>
</html>
