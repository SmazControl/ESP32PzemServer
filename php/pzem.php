<?php 
header("Access-Control-Allow-Origin: *");
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'dbusername');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'databasename');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "GET"){
 
    // Check if Username is empty
    if(empty(trim($_GET["username"]))){
        echo "USername not found";
		exit;
    } else{
        $username = trim($_GET["username"]);
    }

    // Check if Volt is empty
    if(empty(trim($_GET["v"]))){
        echo "Volt not found";
		exit;
    } else{
        $v = trim($_GET["v"]);
    }

    // Check if Volt is empty
    if(empty(trim($_GET["a"]))){
        echo "Amp not found";
		exit;
    } else{
        $a = trim($_GET["a"]);
    }

	// Prepare an insert statement
	$sql = "INSERT INTO pzem (volt,amp,username) VALUES ('".$v."','".$a."','".$username."')";
         
	if($link->query($sql)){
		echo "Insert database done";
	} else {
		echo "Can't connect database, Try again later";
	}
        		    
    // Close connection
    $link->close;
}
?>
