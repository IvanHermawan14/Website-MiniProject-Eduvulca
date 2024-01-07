<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Wrong Went')</script>";
			}
		} else {
			echo "<script>alert(Email Already Exists')</script>";
		}

	} else {
		echo "<script>alert('Password Not Matched')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVulca</title>
    <link reL="Stylesheet" href="register.css">
    <link rel="icon" href="logoweb1.png" type="image/icon type">
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 850;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>"></div>
            <div class="input-group">
                <input type="email" placeholder="Email Address" name="email" value="<?php echo $email;?>"></div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST["password"];?>" required></div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST["cpassword"];?>" required></div>
            <div class="input-group">
				<button name="submit" class="btn">Register</button>
            <p class="login-register-text">Have an Account ?<a href="index.php">Log In</a></p>
        </form>    
    </div>
</body>
</html>