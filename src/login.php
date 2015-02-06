<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = 'UTF-8'>
		<title>Login.php</title>
	</head>
	<body>
	<form action = "content1.php" method = "POST">
 		User Name : <input type = "text" name = "username" > <br> 
 		<input type ="submit" value ="Login">
	</form>
	</body>
</html>