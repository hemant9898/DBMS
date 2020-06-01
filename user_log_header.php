<?php
session_start();
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
$user_name= $_SESSION['USER_ID'];
include("config.php");
$query= "SELECT cust_name from customer where user_name= '".$user_name."' ";
 $result=mysqli_query($mysqli,$query);
 while($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
   {
     $name=$row["cust_name"];
   }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>my project </title>

</head>
<body>
  <header class= " bg-dark p-1">
     <h1 class="text-center text-light">Let ME HELP</h1>

  </header>


<!--navbar with dropdown-->
<nav class="navbar navbar-expand-sm navbar-light bg-light mt-3">
  <div class="container">
    <a class="navbar-brand text-italic" href="#">Navbar</a>
    <ul class="navbar-nav">
      <li class="navbar-item">
        <a  class="nav-link text-warning" href="#">home</a>
      </li>

      <li class="navbar-item">
        <a class="nav-link text-info" href="#">Articles</a>
      </li>
      <li class="navbar-item">
        <a  class="nav-link text-dark" href="#">Author</a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle text-success" data-toggle="dropdown"><?php echo "$name"; ?></a>
        <div class="dropdown-menu">
          <a href="#" class="dropdown-item">My Profile</a>
          <a href="#" class="dropdown-item">My Orders</a>
          <a href="#" class="dropdown-item"></a>
          <a href="#" class="dropdown-item">Phtography</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<br><br>






  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
