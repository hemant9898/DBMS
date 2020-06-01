<?php 
if(isset($_POST['confirm'])){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbms";






        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
          $rmk=$_POST['remark'];
          $amnt=$_POST['amount'];
          $book=$_POST['confirm'];
          
          $sql="SELECT * from booking where booking_id='$book'";
          $result=mysqli_query($conn,$sql);


          
          while($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
          {
            $recordid=$row["booking_id"];
            $cust=$row["cust_id"];
            $work=$row["worker_id"];
            $date=$row["booking_date"];
            
          }

          $sql1="insert into record values ('$recordid','$cust','$work','$date','$amnt','$rmk')";
          mysqli_query($conn,$sql1);

          $sql2="delete from booking where booking_id='$recordid'";
          mysqli_query($conn,$sql2);
          



     $rating=$_POST['rate'];
    $qry="insert into ratings values('$work','$rating')";
    $res=mysqli_query($conn,$qry);
    $qry2="select avg(rating) rates from ratings  where worker_id='$work'";
    $res2=mysqli_query($conn,$qry2);


    while($row= mysqli_fetch_array($res2,MYSQLI_ASSOC))
    {  
        
        $ratings=$row['rates'];
        $qry3 = "update worker set rating='$ratings' where worker_id='$work'";
        $res3=mysqli_query($conn,$qry3);
    }
    header('Location:cust_profile.php');

}

      else{
        echo"popo";
      }
    
?>      