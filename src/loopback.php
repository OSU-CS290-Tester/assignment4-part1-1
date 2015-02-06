<!DOCTYPE html>
<html>
	<head>
		<meta charset = 'UTF-8'>
		<title>Assignment#4-Part1-loopBack</title>
	</head>
	<body>
		<fieldset>
			<legend>Test Case / GET Test</legend>
			<form action = "loopback.php" method = "GET">
				UserName : <input type = "text" name = "username" > <br>
				E- Mail : <input type = "text" name = "email" > <br>
				<input type = "submit"> <br>
			</form>
		</fieldset>
		<br>
		<fieldset>
			<legend>Test Case / POST Test</legend>
			<form action = "loopback.php" method = "POST">
				UserName : <input type = "text" name = "username" > <br>
				Password : <input type = "password" name = "password" > <br>
				<input type = "submit"> <br>
		</form>
		</fieldset>
		<br>
		<br>
	<?php
	
	$Parameters = $_REQUEST;
	$Type = $_SERVER['REQUEST_METHOD'];
	$Para_Status = 0;

	foreach ($Parameters as $key => $val){ 
		$Para_Status += 1;
	}

	if ($Para_Status == 0){
		$Parameters = null;	
	}

	$JSON_Arr = array(
		'Type' => $Type,
		'Parameters' => $Parameters
		);

	echo json_encode($JSON_Arr);

	?>

	</body>
</html>