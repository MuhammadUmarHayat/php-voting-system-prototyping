<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web based Online Voting System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="wrapper">


        <div id="header">
            <h3>Web based Online Voting System</h3>
        </div>
        <div id="navbar">
        <a href="index.php">Dashboard </a>|
<a href="login.php">Login</a>|
<a href="signup.php">Signup   </a>|


        </div>
        <div id="container">

            <div id="left">
            <a href="index.php">Dashboard </a><br> <br> <br>
<a href="login.php">Login</a><br> <br> <br>
<a href="signup.php">Signup  </a><br> <br> <br>


            <br> <br> <br>
            </div>
            <div id="right">
            <h2>

Your session has been expired..........

            </h2>   
            <?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>
            </div>

        </div>

        <div id="footer">
           Developed By Adnan Manzoor
        </div>


    </div>
</body>

</html>
