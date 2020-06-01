<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <title>My orders</title>
  <style>

*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */


  </style>
</head>



<body>
<?php
session_start();
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){


    $user= $_SESSION['USER_ID'];

    $conn=mysqli_connect("localhost","root","","dbms");
    $sql="SELECT * from booking where cust_id='$user'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1){
      echo"<Form method = POST>";
      echo"<h1> Your Order<br></h1>";

      echo"Please give remark<br>";
      echo"<input type='textarea' name='remark' value='remark'>Remark</input><br>";

      echo"please enter the amount paid by You<br>";
      echo"<input type='textarea' name='amount' value='amount'>Paid Amount</input><br>";
?>


  <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="5">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="4">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="3">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="2">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="1">1 star</label>
  </div>



<?php
echo"If your order has been completed Then press yes";
        echo"<input type ='submit' name='confirm'>";








        if(isset($_POST['confirm'])){


          $rmk=$_POST['remark'];
          $amnt=$_POST['amount'];

          $sql="SELECT * from booking where cust_id='$user'";
          $result = mysqli_query($conn,$sql);

          while($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
          {
            $recordid=$row["booking_id"];
            $cust=$row["cust_id"];
            $worker=$row["worker_id"];
            $date=$row["booking_date"];
          }

          $sql1="insert into record values ('$recordid','$cust','$worker','$date','$amnt','$rmk')";
          mysqli_query($conn,$sql1);

          $sql2="delete from booking where cust_id='$user'";
          mysqli_query($conn,$sql2);

     $rating=$_POST['rate'];
    $qry="insert into ratings values('$worker','$rating')";
    $res=mysqli_query($conn,$qry);
    $qry2="select avg(rating) rates from ratings  where worker_id='$worker'";
    $res2=mysqli_query($conn,$qry2);
    
    while($row= mysqli_fetch_array($res2,MYSQLI_ASSOC))
    {

        $ratings=$row['rates'];
        $qry3 = "update worker set rating='$ratings' where worker_id='$worker'";
        $res3=mysqli_query($conn,$qry3);
    }



        }


echo '</form>';
      }
    else {
        echo "u have no order<br>";
    }

}
?>

</body>

</html>
