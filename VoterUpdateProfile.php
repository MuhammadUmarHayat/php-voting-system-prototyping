<!-- php script  -->
<?php
include 'config.php'; 
            session_start();
            $userid="";
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

            $voterId="";
            $name="";
            $secQuestion="";
            $secAnswer="";
            $result = $con->query("SELECT *  FROM `voters`  where  `voterId`='$userid'"); 
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                     
                $voterId=	$row['voterId'];
               
            $name= $row['name'];
                    $secQuestion= $row['secQuestion'];
                    $secAnswer=	$row['secAnswer'];
                    
                   
                    
            }
                       
        
            }  
      if(isset($_POST["submit"]))
            {

               
                   
                   
            
                    $voterId= $_GET['id'];
                    $name= $_POST['name'];
                    $secQuestion= $_POST['secQuestion'];
                    $secAnswer=	$_POST['secAnswer'];
                    
                
               
                    
                $sql="UPDATE `voters` SET  `name`='$name',`secQuestion`='$secQuestion',`secAnswer`='$secAnswer' WHERE `voterId`='$voterId'";                    
                    
                    
                    
                
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
        <a href="Voter_Dashboard.php">Dashboard </a>|

<a href="VoterUpdateProfile.php">Update Profile  </a>

        </div>
        <div id="container">

            <div id="left">
            
<a href="logout.php">Logout</a><br> <br> <br>



            <br> <br> <br>
            </div>
            <div id="right">
           
         
            <form action="VoterUpdateProfile.php?id=<?php echo $voterId; ?>" method="post">

<table>
<tr><td>ID</td><td><?php echo $voterId; ?></td></tr>
<tr><td>Name</td><td><input type="Text" name="name" value="<?php echo $name; ?>"></td></tr>
<tr><td>Secrete Question</td><td><input type="Text" name="secQuestion" value="<?php echo $secQuestion; ?>"></td></tr>
<tr><td>Secrete Answer</td><td><input type="Text" name="secAnswer" value="<?php echo $secAnswer; ?>"></td></tr>
<tr><td></td><td><input class="btn-success" type="submit" name="submit" value="Save Changes"></td></tr>       
</table>

<?php echo $statusMsg ;
?>
    </form>    




            </div>

        </div>

        <div id="footer">
           Developed By Adnan Manzoor
        </div>


    </div>
</body>

</html>
