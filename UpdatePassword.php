<!-- php script  -->
<?php
 $userid="";
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

<?php 
include 'config.php';
$message="";

if(isset($_POST['update']))
{
//register now	
	
	 $data = $_POST;
	
	if (empty($data['code']) ||
    empty($data['password']) ||
    empty($data['userid']) ||
    empty($data['retypePassword'])) 
{
    
    die('Please fill all required fields!');
}

	
if ($data['password'] !== $data['retypePassword']) 
{
   die('Password and Confirm password should match!');   
}


	
	
	 $code = $_POST['code'];
	
		 $userid = $_POST['userid'];
		 	
			 	 $password = $_POST['password'];
                 
	
                                                                                 

		
		 $query="UPDATE `admins` SET `password`='$password' WHERE `adminid`='$userid' and `secCode`='$code'";
	
	 $insert = mysqli_query($con,$query);
	
 
 
    $message="your password has been changed successfully";

	
	
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
               
            <form method="post" action="UpdatePassword.php">
    <div class="center">
<table>

<tr> <td>Entr your sereate code </td> <td><input type="text" name="code" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>User ID </td> <td><input type="text" name="userid" value="<?php echo  $userid ?>">  </td>   </tr>
<tr><td> Password </td> <td><input type="password" name="password" required><span class="error" >*</span > </td>   </tr>
<tr><td> Retype Password </td> <td><input type="password" name="retypePassword" required> <span class="error" >*</span ></td>   </tr>

<tr> <td>   </td>
 <td> <button type="submit" name="update"> Save changes </button>  </td>   </tr>
</table>
<?php
echo $message;
?>
</div>
</form>

            </div>

        </div>

        <div id="footer">
           Developed By Adnan Manzoor
        </div>


    </div>
</body>

</html>
