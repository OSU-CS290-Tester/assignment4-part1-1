<?php
session_start();

// Checks if the user try to access before loging in
if (!isset($_POST['username']) && !isset($_SESSION['Logged_in'])){
	$_SESSION = array();
	session_destroy();
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
	header("Location: {$redirect}/login.php" , true);
	die();
}

// checks if the user try to login without entering username
if(!isset($_POST['username']) || $_POST['username'] == null ){
	if (!isset($_SESSION['Logged_in'])){
		echo "A username must be entered. 
		Click". " <a href ='login.php'>here</a>"." to return to the login screen.";
		session_destroy();
		die();
	}
}
// assure Username var has value
if (!isset($_SESSION['Username'])){
	$_SESSION['Username'] = htmlspecialchars($_POST["username"]);
    }
    $_SESSION['Logged_in'] = 0;

    // create a variable to count the number of visits
	if (!isset($_SESSION['visits'])){
		$_SESSION['visits'] = 0;
	}
	
	
	echo "Hello " . $_SESSION['Username'] . ", you have visited this page " . $_SESSION['visits'] . " times before.
	 Click " . " <a href ='content1.php?logout=true'>here</a>" . " to logout.<br>";
	echo "<br>Please click " . "<a href ='content2.php'>here</a>". " to direct you to content2.php page.\n";
	
	$_SESSION['visits'] ++ ;
	

// log the user out when clicking the logout link
if(isset($_GET['logout'])){
	$_SESSION = array();
	session_destroy();
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
	header("Location: {$redirect}/login.php" , true);
	die();
}

?>