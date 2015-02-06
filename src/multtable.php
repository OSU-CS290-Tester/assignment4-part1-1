<!DOCTYPE html>
<html>
	<head>
		<meta charset = 'UTF-8'>
		<title>Assignment#4-Part1</title>
	</head>
	<body>
	<form action = "multtable.php" method = "GET" >
		<fieldset>
			<legend>Test Cases</legend>
			min_multiplicand: <input type="text" name = "min-multiplicand"><br/>
			<br/>
			max_multiplicand: <input type="text" name = "max-multiplicand"><br/>
			<br/>
			min_multiplier: <input type="text" name = "min-multiplier"><br/>
			<br/>
			max_multiplier: <input type="text" name = "max-multiplier"><br/>
			<br/>
			<input type="submit" value="submit" /> 
		</fieldset>
		<br/>
		<br/>
	</form>
	<?php
	error_reporting(E_ALL); 
	ini_set("display_errors",'off'); 

	$status = true;

		$min_multiplicand = htmlspecialchars($_GET["min-multiplicand"]);
		$max_multiplicand = htmlspecialchars($_GET["max-multiplicand"]);
		$min_multiplier = htmlspecialchars($_GET["min-multiplier"]);
		$max_multiplier = htmlspecialchars($_GET["max-multiplier"]);

	if (!is_numeric ($min_multiplicand) && $_GET["min-multiplicand"] != '' ){
		echo "<h4>min_multiplicand must be an integer!</h4>" ;
		$status = false; }
	if (!is_numeric ($max_multiplicand) && $_GET["min-multiplicand"] != ''){
		echo "<h4>max_multiplicand must be an integer!</h4>" ;
		$status = false;  ; }
	if (!is_numeric ($min_multiplier) && $_GET["min-multiplicand"] != ''){
		echo "<h4>min_multiplier must be an integer!</h4>" ;
		$status = false;  }
	if (!is_numeric ($max_multiplier) && $_GET["min-multiplicand"] != ''){
		echo "<h4>max_multiplier must be an integer!</h4>" ;
		$status = false;  }
	if (!$_GET["min-multiplicand"]){
		echo "<h4>Missing parameter min_multiplicand!</h4>" ; 
		$status = false; }
	if (!$_GET["max-multiplicand"]){
		echo "<h4>Missing parameter max_multiplicand!</h4>" ; 
		$status = false; }
	if (!$_GET["min-multiplier"]){
		echo "<h4>Missing parameter min-multiplier!</h4>" ; 
		$status = false; }
	if (!$_GET["max-multiplier"]){
		echo "<h4>Missing parameter max-multiplier!</h4>" ; 
		$status = false; }
	if (is_numeric($min_multiplicand) && is_numeric($max_multiplicand)){
		if ($min_multiplicand > $max_multiplicand ) {
		echo "<h4>min_multiplicand is greater than the maximum!</h4>";
		$status = false;
		}
	}
	if (is_numeric($min_multiplier) && is_numeric($max_multiplier)){
		if ($min_multiplier > $max_multiplier ) {
			echo "<h4>min_multiplier is greater than the maximum!</h4>";
			$status = false;
		}
	}

	?>
	<table border="1">
	<?php
	if ($status){
		$col = $max_multiplier - $min_multiplier + 2;
		$row = $max_multiplicand - $min_multiplicand + 2;

		for($i = 1 ; $i <= $col ; $i++) {  
			echo "<tr>";
			
			for ( $j = 1 ; $j <= $row ; $j++) { 
				if(($i == 1) && ($j == 1)){
					echo "<td></td>"; }
				if (($i == 1) && ($j > 1)){
					echo "<td>". ($min_multiplier + ($j-2))."</td>"; 
				}
				if (($j == 1) && ($i > 1)){
					echo "<td>". ($min_multiplicand + ($i-2))."</td>"; 
				}
  				else if (($j > 1) && ($i > 1)){
  					echo "<td>". ( ($min_multiplier + ($j-2)) * ($min_multiplicand + ($i-2)) )."</td>"; 
  				}
 			}  
  			echo "</tr>";  
 	 	} 
	}
	?>
	</table>



	</body>
</html>