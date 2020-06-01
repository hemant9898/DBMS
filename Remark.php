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

$book="abc";
$i=0;
for($i=0;$i<5;$i++){
if(isset($_POST[$i]))
{
 $book=$_POST[$i];
}
}

    $conn=mysqli_connect("localhost","root","","dbms");
    $sql="SELECT * from booking where booking_id='$book'";
    $result=mysqli_query($conn,$sql);

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
  #btn1{
    background:#27303a;
    color:orange;
    padding:5px;
    
    font-family:tahoma;
    border-style: ridge;
    border-radius: 4px;
    width:320px;

  }
  #btn1:hover{
    cursor:pointer;

  }
  #container1{
    margin-left:35%;
    width:25%;
    padding:50px;
    margin-top:50px;20
  }

  #hdd3{
    background:#27303a;
    color:orange;
    padding:10px;

    

  }
  #inp1{
    border-style: ridge;
    width:200px;
    padding:5px;
    border-radius:3px;
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
  <div id="container1">

    <?php


      echo"<Form method = POST action='afterremark.php'>";
      echo"<h1 id='hdd3'> FeedBack Form<br></h1> <hr><br>";

      echo"<h4>Please give remark</h4>";
      echo"<input  id='inp1' type='textarea' name='remark' Placeholder='remark'></input><br><br>";

      echo"<h4>please enter the amount paid by You</h4>";
      echo"<input  id='inp1' type='textarea' name='amount' placeholder='amount'></input><br><br>";


     echo"<h4>Give rating</h4>";
 echo" <div class='rate'>
    <input type='radio' id='star5' name='rate' value='5' />
    <label for='star5' title='5'>5 stars</label>
    <input type='radio' id='star4' name='rate' value='4' />
    <label for='star4' title='4'>4 stars</label>
    <input type='radio' id='star3' name='rate' value='3' />
    <label for='star3' title='3'>3 stars</label>
    <input type='radio' id='star2' name='rate' value='2' />
    <label for='star2' title='2'>2 stars</label>
    <input type='radio' id='star1' name='rate' value='1' />
    <label for='star1' title='1'>1 star</label>
  </div> ";



    echo"<br><br>If your order has been completed Then confirm<br>";
    echo"</br>";
       echo"<button  id='btn1' type ='submit' name='confirm' value='$book'>Remark</button>";
       
        
        echo"</form>";
      }

?>


</div>
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
