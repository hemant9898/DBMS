<?php
session_start();

if(isset($_SESSION['IS_AUTHENTICATED']) ){
$user_name= $_SESSION['USER_ID'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";






// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//taking arriving date
$arr="select arrive from arrives where worker_id IS null";
$arrres=mysqli_query($conn,$arr);

while($row= mysqli_fetch_array($arrres,MYSQLI_ASSOC))
{
	$arrdate=$row["arrive"];
}


for($i=0;$i<5;$i++){
if(isset($_GET[$i]))
{$random = mt_rand(1, 10000);
 $worker_id=$_GET[$i];

$dat=date("Y-m-d");



$sql = "INSERT INTO booking (booking_id,cust_id,worker_id,booking_date,arriving_date) VALUES('$random','$user_name','$worker_id','$dat','$arrdate')";




if (mysqli_query($conn, $sql))
{


	//deleting arriving date
	$delete="delete from arrives ";
	$deleteres=mysqli_query($conn,$delete);

header('location:booking_worker.php');

}
else {
  echo "NO";
}
}
}


}
 ?>
