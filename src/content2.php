<?php
session_start();

// Checks if the user try to access before loging in
if (!isset($_SESSION['Logged_in'])){
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
	header("Location: {$redirect}/login.php" , true);
	}
	else {

		// create a nother variable for sub_visits to content2.php
		if (!isset($_SESSION['sub_visits'])){
		$_SESSION['sub_visits'] = 0;
		}
		echo "Hello " . $_SESSION['Username'] . ", you have visited this page " . $_SESSION['sub_visits'] . " times before.
		 Click " . "<a href ='content1.php'>here</a>". " to go back to content1.php page.";
		$_SESSION['sub_visits'] ++;			
		}
?>
