<?php

require 'functions.inc';
$con = connect();
session_start();

if (!isset($_SESSION['auth'])){
	header("Location: index.php");
}

?>
<html>
<head>
  <title>Calendar</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="style_sheet.css">
  <link rel="stylesheet" href="calendar/fullcalendar.css">
  <link rel="stylesheet" href="alertify/alertify.css">

  <script src='calendar/jquery.min.js'></script>
  <script src='calendar/moment.min.js'></script>
  <script src='calendar/fullcalendar.js'></script>
  <script src='alertify/alertify.min.js'></script>

  <script>
    $(document).ready(function()
    {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var events_array = [
        {
            title: 'Appointment',
            start: '2015-02-27T10:30:00',
            patient: 'Cassandra Broyle',
            attendant: 'Kimberly Savage, PA',
            reason: 'Follow-up',
            time: '10:30am'
        }
        ];


        // put options and callbacks here
        $('#calendar').fullCalendar({
            header:
            {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },

            selectable: true,
            editable: true,
            events: events_array,

            eventRender: function(event, element)
            {
                element.attr('title');
            },

            eventClick: function(event, jsEvent, view)
            {
                $(this).css('background-color', '2B9FFE');
                alertify.alert('Appointment Information',
                      'Patient: ' + event.patient + "<br/>" +
                      'Attendant: ' + event.attendant + "<br/>" +
                      'Reason: ' + event.reason + "<br/>" +
                      'Time: ' + event.time
                );

            },

            dayClick: function(date, jsEvent, view)
            {
                $(this).css('background-color', '81feff');
            }
        })
    });
  </script>
</head>

<body>
  <div id="screenContainer" name="screenContainer">
    <div id="title" name="titleContainer">
      Calendar
      <div id="logoutButton" name="logoutButtonContainer" onclick="location.href='logout.php';">
        <button type="button" name="logoutButton">
            Logout
          </button>
      </div>
    </div>
    <div id="sidebarContainer" name="sidebarContainer">
      <div id="calendarButton" name="calendarButton" onclick="location.href='pcalendar.php';">
        Calendar
      </div>
      <div id="notificationBox" name="notificationBox">
        Notifications
      </div>
    </div>
    <div id="contentContainer" name="contentContainer">
      <div id="calendar"></div>
      </div>
    </div>
  </div>
</body>

</html>
