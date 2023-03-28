<!-- php script  -->
<?php
include 'config.php'; 
            session_start();
            $candId="";
            $name="";
                    $status="";
                    $position="";

            $id= $_GET['id'];
            $statusMsg ="";

            if($_SESSION['userid']==null)
            {
                header('Location:'.'logout.php');
            }
            else
            {
               $userid=$_SESSION['userid'];
               echo "<h2> Welcome ". $userid."</h2>";
            }
        


          
            
            $result = $con->query("SELECT * FROM `candidates`  where  `candId`='$id'"); 
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                        
                $candId=	$row['candId'];
            $name= $row['name'];
                    $status= $row['status'];
                    
                    //$candId,$name,$status
                    
            }
                       
        
            }  
                



     
            

            if(isset($_POST["submit"]))
            {
            
                    $id= $_GET['id'];
                
                    $name= $_POST['name'];
                    $status= $_POST['status'];
                    
                    $position=$_POST['position'];
                   
                
               
                    
                $sql="UPDATE `candidates` SET `name`='$name',`position`='$position',`status`='$status' WHERE `candId`='$id'";                    
                    
                    
                    
                
                $insert = $con->query($sql); 
                         if($insert){ 
                            $status = 'success'; 
                            echo $statusMsg = "Record is updates successfully."; 
                        }else{ 
                           echo $statusMsg = "Failed, please try again."; 
                        }  
                
                
                
                
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
            
              
            <form action="editCandidate.php?id=<?php echo $candId; ?>" method="post">

<table>
<tr><td>ID</td><td><?php echo $candId; ?></td></tr>
<tr><td>Name</td><td><input type="Text" name="name" value="<?php echo $name; ?>"></td></tr>
<tr><td>Position</td><td><input type="Text" name="position" value="<?php echo $position; ?>"></td></tr>
<tr><td>Status</td><td><input type="Text" name="status" value="<?php echo $status; ?>"></td></tr>
<tr><td></td><td><input class="btn-success" type="submit" name="submit" value="Save Changes"></td></tr>       
</table>

<?php echo $statusMsg ;
?>
    </form>        </div>

        </div>

        <div id="footer">
           Developed By Adnan Manzoor
        </div>


    </div>
</body>

</html>
