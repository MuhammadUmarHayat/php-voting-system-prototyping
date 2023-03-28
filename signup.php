
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
    empty($data['userid']) ||
    empty($data['retypePassword'])) 
{
    
    die('Please fill all required fields!');
}

	
if ($data['password'] !== $data['retypePassword']) 
{
   die('Password and Confirm password should match!');   
}


	
	
	 $name = $_POST['name'];
	
		 $userid = $_POST['userid'];
		 	 $password = $_POST['password'];
			 	 $retypepassword = $_POST['retypePassword'];
                  $secQuestion = $_POST['secQuestion'];
                  $secAnswer = $_POST['secAnswer'];
                  $status = "active";
	
                                                                                 

		
		$query="INSERT INTO `voters`(`voterId`, `password`, `name`, `secQuestion`, `secAnswer`, `status`) VALUES ('$userid','$password','$name','$secQuestion','$secAnswer','$status')";
	
	$insert = mysqli_query($con,$query);
	
 
 
    $message="Please enter corract user id or password";

	
	
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
               
            <form method="post" action="signup.php">
    <div class="center">
<table>

<tr> <td>Name </td> <td><input type="text" name="name" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>User ID </td> <td><input type="text" name="userid" required> <span class="error" >*</span >   </td>   </tr>
<tr><td> Password </td> <td><input type="password" name="password" required><span class="error" >*</span > </td>   </tr>
<tr><td> Retype Password </td> <td><input type="password" name="retypePassword" required> <span class="error" >*</span ></td>   </tr>
<tr> <td>Secrete Question</td> <td><input type="text" name="secQuestion" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Secrete Answer</td> <td><input type="text" name="secAnswer" required>   <span class="error" >*</span > </td>   </tr>
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
