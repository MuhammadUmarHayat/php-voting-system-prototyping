<?php include 'config.php'; 
 
// Get image data from database 
$result = $con->query("SELECT * FROM candidates"); 

?>
<!-- php script  -->
<?php
            session_start();
     
            if($_SESSION['userid']==null)
            {
                header('Location:'.'logout.php');
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
           
<table border=1>
    <tr>
    <th>#</th>
    <th> Complete Name</th>
    <th> Position</th>
    <th> Photo</th>
    <th> </th>
    <th> </th>
    </tr>
            <?php if($result->num_rows > 0){ ?> 


	
        <?php while($row = $result->fetch_assoc()){ ?> 
		
			
                <tr>
    <td><?php echo $row['candId']?></td>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['position']?></td>
    <td>  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width=50px height=50px /> </td>
   
    <td><?php  echo '<a style="color: #1BA098; text-decoration: none;"  href="editCandidate.php?id=' . $row['candId'] .'">Edit Details</a>';
	

?></td>
    <td> <?php echo '<a style="color: #1BA098; text-decoration: none;" href="deleteCandidate.php?id=' . $row['candId'] .'">Delete Details</a>';
?></td>
    </tr>
	   <?php



	   } ?> 
    
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>

</table>

















</div>
        </div>
           

        
        
        <div id="footer">
           Developed By Adnan Manzoor
        </div>
        
    </div>
</body>

</html>
