<!-- php script  -->
<?php
            session_start();
     
            if($_SESSION['userid']==null)
            {
            }
            else
            {
               $userid=$_SESSION['userid'];
               echo "<h2> Welcome ". $userid."</h2>";
            }
        
?>

<!-- GUI  -->



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
        <a href="Admin_Dashboard.php">Dashboard </a>|
<a href="AddCandidate.php">Add Candidate</a>|
<a href="CandidateList.php">Candidate List</a>|
<a href="UpdatePassword.php">Update Password  </a>|
<a href="UpdateProfile.php">Update Profile  </a>|

        </div>
        <div id="container">

            <div id="left">
            
<a href="logout.php">Logout</a><br> <br> <br>



            <br> <br> <br>
            </div>
            <div id="right">
               
            <img src="gui.bmp"   style=" display: block;margin-top: 50px;margin-left: auto; margin-right: auto; width: 50%;height:300px;">

            </div>

        </div>

        <div id="footer">
           Developed By Adnan Manzoor
        </div>


    </div>
</body>

</html>
