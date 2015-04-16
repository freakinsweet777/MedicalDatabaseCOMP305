<?php

require 'functions.inc';
$con = connect();
session_start();

if (!isset($_SESSION['auth'])){
	header("Location: index.php");
}
if ($_SESSION['auth'] == 3){
	header("Location: pcalendar.php");
}

?>
<html>
<head>
  <title>Patients</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="style_sheet.css"
</head>

<body>
  <div id="screenContainer" name="screenContainer">
    <div id="title" name="titleContainer">
      Patients
      <form>
        <div id="patientsSearchbar">
          <input type="text" name="patientSearch" placeholder="Search for a patient...">
        </div>
        <div id="patientsSearchButton" name="patientsSearchButton">
          <button type="button" name="patientSearchButton">
            Go
          </button>
        </div>
      </form>
      <div id="logoutButton" name="logoutButtonContainer" onclick="location.href='logout.php';">
          <button type="button" name="logoutButton">
            Logout
          </button>
      </div>
    </div>
    <div id="sidebarContainer" name="sidebarContainer">
      <div id="calendarButton" name="calendarButton" onclick="location.href='calendar.php';">
        Calendar
      </div>
      <div id="patientsButton" name="patientsButton" onclick="location.href='patients.php';">
        Patients
      </div>
      <div id="notificationBox" name="notificationsBox">
        Notifications
      </div>
    </div>
    <div id="contentContainer" name="contentContainer">
      Patients list goes here
    </div>
  </div>
</body>

</html>
