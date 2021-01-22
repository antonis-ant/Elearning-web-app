<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login center">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username"></label>
                <input type="text" name="username" placeholder="Username" id="username" required>
                <br>
				<label for="password"></label>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <br>
				<input type="submit" value="Login">
			</form>
		</div>
</body>
</html>