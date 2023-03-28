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
<!-- php scritp  -->

<?php 
include 'config.php';
$message="";

if(isset($_POST['signup']))
{
//register now	
	
	 $data = $_POST;
	
	if (empty($data['name']) ||
    empty($data['password']) ||
    empty($data['userid']) || empty($data['position']) ||
    empty($data['retypePassword'])) 
{
    
    die('Please fill all required fields!');
}

	
if ($data['password'] !== $data['retypePassword']) 
{
   die('Password and Confirm password should match!');   
}

if(!empty($_FILES["image"]["name"])) { 
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)){ 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
	
	
	 $name = $_POST['name'];
	
		 $userid = $_POST['userid'];
         $position = $_POST['position'];
		 	 $password = $_POST['password'];
			 	 $retypepassword = $_POST['retypePassword'];
                  $secQuestion = $_POST['secQuestion'];
                  $secAnswer = $_POST['secAnswer'];
                  $status = "active";
	
                                                                                 

		
	$query="INSERT INTO `candidates`(`candId`, `password`, `name`,  `image`, `secQuestion`, `secAnswer`, `status`, `position`) VALUES ('$userid','$password','$name','$imgContent','$secQuestion','$secAnswer','$status','$position')";
	
	$insert = mysqli_query($con,$query);
	
 
 
    $message="Record is added successfully";

    }
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
               
            <form method="post" action="AddCandidate.php" enctype="multipart/form-data">
    <div class="center">
<table>

<tr> <td>Name </td> <td><input type="text" name="name" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Position </td> <td><input type="text" name="position" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>User ID </td> <td><input type="text" name="userid" required> <span class="error" >*</span >   </td>   </tr>
<tr><td> Password </td> <td><input type="password" name="password" required><span class="error" >*</span > </td>   </tr>
<tr><td> Retype Password </td> <td><input type="password" name="retypePassword" required> <span class="error" >*</span ></td>   </tr>
<tr> <td>Secrete Question</td> <td><input type="text" name="secQuestion" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Secrete Answer</td> <td><input type="text" name="secAnswer" required>   <span class="error" >*</span > </td>   </tr>

<tr> <td>   
<label>Select Image File:</label></td>
<td> <input type="file" name="image">
     </td>
</tr>
<tr> <td>   </td>
 <td> <button type="submit" name="signup"> Register Now </button>  </td>   </tr>
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
