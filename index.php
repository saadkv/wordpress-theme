<?php 
include("connection.php");
if(isset($_POST['submit'])){
$result = $myobj->userlogin($_POST['email'],$_POST['password']);
	while($row = mysqli_fetch_assoc($result)){
	 $email = $row['user_email'];
	 $password = $row['user_password'];
	 $user_id = $row['user_id'];
		}
	if(@$email == $_POST['email'] && $password == $_POST['password']){
		$_SESSION['user_id'] = $user_id;
		header("location:add-product.php");
		}
	else{
		echo "invalid password";
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
<h2>Login Here</h2>
<form method="post">
	<label>Email:</label><input type="text" name="email" placeholder="Email" required><br><br>
    <label>Password:</label><input type="pass" name="password" placeholder="Password" required><br><br>
    <input type="submit" name="submit" value="Submit">
    <a href="logout.php">Logout</a>
</form>
</center>
</body>
</html>