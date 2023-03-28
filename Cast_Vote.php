<!-- php script  -->
<?php
include 'config.php'; 
            session_start();
            $result = "";
            if($_SESSION['userid']==null)
            {
                header('Location:'.'logout.php');
            }
            else
            {
               $userid=$_SESSION['userid'];
               echo "<h2> Welcome ". $userid."</h2>";
            }

            if(isset($_POST['submit']))
            {
                $position = $_POST['positions'];
                $result = $con->query("SELECT * FROM candidates where position='$position'"); 


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
        <a href="Voter_Dashboard.php">Dashboard </a>|
        <a href="Cast_Vote.php">Cast Vote</a>|
<a href="VoterUpdateProfile.php">Update Profile  </a>

        </div>
        <div id="container">

            <div id="left">
            
<a href="logout.php">Logout</a><br> <br> <br>



            <br> <br> <br>
            </div>
            <div id="right">
            <form method="post" action="Cast_Vote.php">
               <table>
                <tr>
                    <td>
                    <select name="positions" id="positions">
  <option value="MPA">MPA</option>
  <option value="MNA">MNA</option>
  <option value="President">President</option>
  <option value="Vice President">Vice President</option>
</select> </td>
                    <td><button type="submit" name="submit"> Next </button> </td>
        </tr>
        </table>

        <table border=1>
    <tr>
    <th>#</th>
    <th> Complete Name</th>
    <th> Position</th>
    <th> Photo</th>
    <th> </th>
    <th> </th>
    </tr>
            <?php
            if(empty($result))
            {


            }
           
           else if( $result->num_rows > 0)
            { ?> 


	
        <?php while($row = $result->fetch_assoc()){ 
            ?> 
		
			
                <tr>
    <td><?php echo $row['candId']?></td>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['position']?></td>
    <td>  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width=50px height=50px /> </td>
   
    <td><?php  echo '<a style="color: #1BA098; text-decoration: none;"  href="SelectCandidate.php?id=' . $row['candId'] .'">Select Me</a>';
	

?></td>
    
    </tr>
	   <?php



	   } ?> 
    
<?php }else{ ?> 
    <p class="status error">Record  not found...</p> 
<?php } ?>

</table>
















        </form>


















            </div>

        </div>

        <div id="footer">
           Developed By Adnan Manzoor
        </div>


    </div>
</body>

</html>
