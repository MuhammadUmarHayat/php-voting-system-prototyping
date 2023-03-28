

<!-- php scritp  -->

<?php 
include 'config.php';
$message="";

if(isset($_POST['login']))
{
    $userType=$_POST["userType"];
	$userid = $_POST['userid'];
	$password = $_POST['password'];
    
		if($userType=="admin")
		{
	
			$query="SELECT * FROM  `admins` where  `adminid`= '$userid' and  `password`='$password' ";
	
	 		$result = mysqli_query($con, $query);
            	if ($result->num_rows > 0) 
					{
						session_start();
						$_SESSION['userid'] =$userid;
						header('Location:'.'Admin_Dashboard.php');
				
					}
				else{
				
				echo"Wrong user id or password";
					}
		}
		if($userType=="voter")
		{
	
			$query="SELECT * FROM  `voters` where  `voterId`= '$userid' and  `password`='$password' ";
	
	 		$result = mysqli_query($con, $query);
            	if ($result->num_rows > 0) 
					{
						session_start();
						$_SESSION['userid'] =$userid;
						header('Location:'.'Voter_Dashboard.php');
				
					}
				else{
				
				echo"Wrong user id or password";
					}
		}
	

 
 
    $message="You are registered successfully";

	
	
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
               
           
            
            <form method="post" action="login.php">
    <div class="center">
<table>
<tr>
<td></td> 
    <td>
<input type="radio" name="userType"
<?php if (isset($userType) && $userType=="admin") echo "checked";?>
 value="admin">Admin
 <input type="radio" name="userType"
<?php if (isset($userType) && $userType=="voter") echo "checked";?>
 value="voter">Voter<br>
 </td>   </tr>

<tr> <td>User ID </td> <td><input type="text" name="userid" required> <span class="error" >*</span >   </td>   </tr>
<tr><td> Password </td> <td><input type="password" name="password" required><span class="error" >*</span > </td>   </tr>
<tr> <td>   </td>
 <td> <button type="submit" name="login"> login </button>  </td>   </tr>
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
