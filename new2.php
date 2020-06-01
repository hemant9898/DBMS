<?php



session_start();

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){


$workerid= $_SESSION['worker'];
include("config.php");



	if(isset($_POST["upload"]))
    {

        if(isset($_POST["subject"]))
        {   	$h=$_POST['subject'];
		         	if($h[0]=="All"){}

		  	     else{
                   foreach ($_POST['subject'] as $subject)
		   	            {
				          $sql1="insert into day_of_avail values ('$workerid','$subject')";
				         mysqli_query($mysqli,$sql1);

			               }
		   	}
				header('location:worker_profile.php');

        }

	}
}

?>
