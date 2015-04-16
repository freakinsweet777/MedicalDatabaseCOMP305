<?php

function pull($item, $place){
	$sql = "SELECT ".$item." FROM ".$place.";";
	return $sql;
}

function connect(){
	$dbname = 'comp305_3';
	$username = 'comp305_3';
	$password = 'comp305_3';
	$dbhost = 'willy';

	// Create connection
	$con = mysqli_connect($dbhost, $username, $password, $dbname);

    	// check for a successful connection
    	//      connect_error will evaluate to true if there is an error
    	if ( $con->connect_error )
    	{
        	// stop the script and echo an error message
        	echo "<h2>Database Error</h2>\n";
        	die( "<p>MySQLi Connection Error: ".$con->connect_error."</p>\n" );
    	}

	return $con;
}

function closeDB(){
	mysqli_close($con);
	session_destroy();
	header('Location: index.php');
}
?>
