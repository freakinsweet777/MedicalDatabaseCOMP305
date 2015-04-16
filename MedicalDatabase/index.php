<?php
include_once "functions.inc";
?>
<html>
<head>
  <title>Login</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="style_sheet.css">
</head>

<body>
<?php

$inValid;
$userName;
$passWord;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if ((empty($userName)) || (empty($passWord))) {
     $inValid = "Name is required";
   }

   if (empty($_POST["username"])) {
     $userName = "Name is required";
   }

   if (empty($_POST["password"])) {
     $passWord = "Password is required";
   }
}

?>

  <div id="screenContainer" name="screenContainer">
    <div id="title" name="titleContainer">
      Login
    </div>
    <div id="sidebarContainer" name="sidebarContainer">
      <div id="notificationBox" name="notificationsBox">
        Notifications
      </div>
    </div>
    <div id="contentContainer" name="contentContainer">

      <div id="loginContent" name="loginContent">
	<span class="error">* required field.<?php echo $inVaild;?></span>

		<form action = "staff_pw_check.php" method = "post">
        Username: <input type="text" id="username" name="username">
	 <span class="error">* <?php echo $userName;?></span></br>
        Password: <input type="password" id="password" name="password">
	 <span class="error">* <?php echo $passWord;?></span><br/></br>
        <button type="submit" name="loginButton" style="width:20%">
          Login
        </button>
		</form>

      </div>
    </div>
  </div>
</body>

</html>
