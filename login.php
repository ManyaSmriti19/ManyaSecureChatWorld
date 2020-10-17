<?php
$conn= new mysqli("localhost","root","","secure_chat");
if($conn)
if(isset($_POST['submit'])) {
$username= $_POST["email"];
$pwd=$_POST["password"];
$sql="select email, password from login where email='$username'";
$result = $conn -> query($sql);
$user2 = $_POST['user2'];
if($username=="manyasmriti")
$user2="shruti";
else
$user2="manyasmriti";
$src = "/proj1/ww.php?email=".$username."&user2=".$user2;
$row = $result -> fetch_assoc();
if($row["password"]== md5($pwd))
{	
	$sql= "create table ".$username."(name varchar(100), file varchar(250), PRIMARY KEY(file))"; 
	$conn-> query($sql);
	header("location: $src");
}
else
echo "Try again";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Log-in</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style type="text/css">
	body {
		font-family: 'Roboto', sans-serif;
	background-image: url("bg1.jpg");
	}
	.navbar {
    -webkit-box-shadow: 0 8px 6px -6px #999;
    -moz-box-shadow: 0 8px 6px -6px #999;
    box-shadow: 0 8px 6px -6px #999;
	}
	.form-control, .form-control:focus, .input-group-addon {
		border-color: #e1e1e1;
	}
    .form-control, .btn {        
        border-radius: 3px;
    }
	.signup-form {
		width: 350px;
		margin: 0 auto;
		padding: 30px 0;
	}
    .signup-form form {
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
	.signup-form .form-group {
		margin-bottom: 20px;
	}
	.signup-form label {
		font-weight: normal;
		font-size: 13px;
	}
	.signup-form .form-control {
		min-height: 38px;
		box-shadow: none !important;
	}	
	.signup-form .input-group-addon {
		max-width: 42px;
		text-align: center;
	}
	.signup-form input[type="checkbox"] {
		margin-top: 2px;
	}   
    .signup-form .btn{        
        font-size: 16px;
		background: #2db482;
        font-weight: bold;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus {
		background: #2db482;
		-webkit-box-shadow: 2px 2px 2px 2px #2bd482;
        outline: none;
	}
	.signup-form a {
		color: #fff;	
		text-decoration: underline;
	}
	.signup-form a:hover {
		text-decoration: none;
	}
	.signup-form form a {
		color: #247921;
		text-decoration: none;
	}	
	.signup-form form a:hover {
		text-decoration: underline;
	}
	.signup-form .fa {
		font-size: 21px;
	}
	.signup-form .fa-paper-plane {
		font-size: 18px;
	}
	.signup-form .fa-check {
		color: #fff;
		left: 17px;
		top: 18px;
		font-size: 7px;
		position: absolute;
	}
	.top{
		padding-top: 15px;
		padding-bottom: 10px;
		background-color: white;
		font-size: 18px;
		font-weight: 700;
	}
	#err{
		color: red;
		display: none;
	}
	.navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > li > a {
	color: black;
	}
	.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: black;
    }
	
</style>
</head>
<body>
	<br><br><br><br><br>
	<div class="content" align="center">
<div class="signup-form">
<form action="login.php" method="post" id="myForm">
		<h2>Login</h2>
		<p>Please fill in this form to login to FilmFestival!</p>
		<hr>
        <div id="err">*Invalid email/password<br></div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="text" class="form-control" name="email" placeholder="Username" required="required" id="email">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
			</div>
        </div>
		
		<div style="margin-bottom: 5px;">
		<a href="forgot-password.php">Forgot Password?</a>
		</div>
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
        </div>
    </form>
	<div class="text-center" style="color: white;">Don't have an account? <a href="sign-up.php">Sign-Up here</a></div>
</div>
</div>
</body>
</html>                            