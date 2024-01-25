/*
    Online Exam Portal 
    Andrew, Arav, Nikhil
    1/17/2024

    File allows the users answer to be saved while in the same session.
*/
<?php
session_start();

$questionNo = $_GET["questionNo"];
$value1 = $_GET["value1"];
$_SESSION["answer"][$questionNo] = $value1;
?>