<?php
	session_start();
	if (isset($_SESSION['loggedin'])) {
		header("Location: check_login.php");
		exit;
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		function check_empty() {
			if (document.getElementById('username').value == "" || document.getElementById('password').value == "" ) {
				//alert("Please fill out all fields.");
				document.getElementById("error").textContent= "Empty fields exist.";
				return false;
			} else {
				document.getElementById('form').submit();
			}
		}
	</script>
</head>
<body>
	<div class="row">
		<div class="col-sm-12 loginTitle">
			<h1>Student Budget</h1>
		</div>
		<div class="col-sm-12 loginbox">
			<h2>Login</h2>
			<div>
				<form onsubmit="return check_empty()" action="check_login.php" id="form" method="post" name="form">
					<input class="login" id="username" name="username" placeholder="Username" type="text"><br/><br/>
					<input class="login" id="password" name="password" placeholder="Password" type="password"><br/><br/>
					<input class="login" type="submit" name="login" value="Login" />
				</form>
				<span id="error" class="errorspan"><?php echo $_SESSION['error']; ?></span>
			</div>
		</div>
	</div>
</body>
</html>
