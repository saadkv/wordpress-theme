<?php 
include("connection.php");
if(isset($_POST['submit'])){
	$result = $myobj->email_exits($_POST['email']);
	if(mysqli_num_rows($result) >= 1){
			echo "record exists";
		}
	else{
		$myobj->registration($_POST['l_name'],$_POST['gender'],$_POST['dob'],$_POST['f_name'],$_POST['email'],$_POST['password']);	
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<center>
<h2>Registration Form</h2>
<form method="post">
	<input type="text" name="f_name" placeholder="First Name" required ><br><br>
    <input type="text" name="l_name" placeholder="Last Name" required ><br><br>
    <input type="email" name="email" placeholder="Email" required ><br><br>
    <input type="password" name="password" placeholder="Password" required ><br><br>
    <input type="radio" name="gender" value="male" required >Male
    <input type="radio" name="gender" value="female" required >Female<br><br>
    <input type="date" name="dob" placeholder="Date Of Birth" required ><br><br>
    <input type="submit" name="submit" value="Submit">
</form>
</center>
</body>
</html>