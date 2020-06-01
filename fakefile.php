if(isset($_POST['contact'])){
  $query= " UPDATE customer set contact= '".$_POST["contact"]."'  where
            user_name= '".$user_name."' ";
mysqli_query($mysqli, $query);
}
if(isset($_POST['address'])){
  $query= " UPDATE customer set address= '".$_POST["address"]."'  where
            user_name= '".$user_name."' ";
mysqli_query($mysqli, $query);
}
if(isset($_POST['city'])){
  $query= " UPDATE customer set city= '".$_POST["city"]."'  where
            user_name= '".$user_name."' ";
mysqli_query($mysqli, $query);
}
if(isset($_POST['pincode'])){
  $query= " UPDATE customer set pincode= '".$_POST["pincode"]."'  where
            user_name= '".$user_name."' ";
mysqli_query($mysqli, $query);
}
if(isset($_POST['image'])){
  $file= addslashes(file_get_contents($_FILES["image"]["tmp_image"]));
  $query= " UPDATE customer set user= '".$file."'  where
            user_name= '".$user_name."' ";
mysqli_query($mysqli, $query);
}

               header('location:cust_profile.php');


 }
