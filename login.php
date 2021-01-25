<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login center">
			<h1>Login</h1>
			<form action="authenticate.php" method="POST">
                <input type="text" name="loginame" placeholder="Username" id="loginame">
                <br>
                <input type="password" name="password" placeholder="Password" id="password">
                <br>
				<button type="submit" name="Login">Login</button>
			</form>
		</div>
</body>
</html>