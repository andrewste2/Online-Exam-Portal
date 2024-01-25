/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/15/2024

    load_timer.php loads a timer set on local time in Seattle.
*/

<?php
session_start();
// set timezone to Seattle
date_default_timezone_set('America/Los_Angeles');

// display time left on exam
if(!isset($_SESSION["end_time"])) {
    echo "00:00:00";
}
else {
    $time1=gmdate("H:i:s", strtotime($_SESSION["end_time"]) - strtotime(date("m-d-Y H:i:s")));
    if(strtotime($_SESSION["end_time"])<strtotime(date("m-d-Y H:i:s"))) {
        echo "00:00:00";
    }
    else {
        echo $time1;
    }
}
?>