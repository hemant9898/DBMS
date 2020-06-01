
<?php

?>
<html>
<head>
<title>Customersignup_page</title>
    <link rel="stylesheet" type="text/css" href="css/user_signup.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<body background="img/pic5.jpg">
    <div class="loginbox">

        <h1>Fill your details</h1>

        <form method="post" action="user_registration.php">

            <input id="text1" type="text" name="user_name" placeholder="Create Username" required>
            <input id="text1" type="text" name="cust_name" placeholder="Name" required>
            <input id="text1" type="text" name="contact" placeholder="Mobile Number" required>
            <input id="text1" type="text" name="address" placeholder="Address" required>
            <input id="text1" type="text" name="city" placeholder="City" required>
            <input id="text1" type="text" name="pincode" placeholder="Pincode" required>

            <input id="text1" type="password" name="password" placeholder="Create Password" required>
         <p id="text1"> Gender  <select  name="gender" id="select1">
                  <option value="">Select</option>
                 <option value="male">Male</option>
                 <option value="female">Female</option>
                 <option value="other">Other</option>


            </select></p><hr>
          </input>
            <input type="submit" name="submit" value="SIGN UP">

            <p id="link2">Already have an Account  <a id="link2" href="newlogin.php">Sign IN</a></p>
        </form>

    </div>

</body>
</head>
</html>
