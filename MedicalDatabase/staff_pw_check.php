<?php
require 'functions.inc';
$con = connect();
session_start();

// check for post data
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $User_Name = $_POST['username'];
	$Password = $_POST['password'];
	
	
	// Checks for User_Name and Password
	
    $query = "SELECT auth FROM login WHERE userName = '$User_Name' AND pw = '$Password'";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);
 	
    

    if ($num_rows == 1) {
        // check for empty result
        
			
            		//sets up Authorization Variable
			$row = mysqli_fetch_row($result);
			$auth = $row[0];

			//Level 1 Authorization Level
			if($auth == 1){
				$_SESSION['auth'] = 1;
				header("Location: patients.php");

			//Level 2 Authorization Level
			} elseif ($auth == 2){
				$_SESSION['auth'] = 2;				
				header("Location: patients.php");

			//Level 3 Authorization Level	
			} elseif ($auth == 3){
				$_SESSION['auth'] = 3;
				header("Location: pcalendar.php");	
			}
        		
            		//Wrong User_Name or Password
			echo '<p> something is wrong;'.$auth.'<p>';
        
			//header("Location: index.php");
	
    } else {
        // no product found
       //header("Location: index.php");
			echo '<p> NPF</p>', PHP_EOL;
    }
} else {
    // required field is missing
   // header("Location: index.php");
				echo '<p> RFM</p>', PHP_EOL;
}
?>
