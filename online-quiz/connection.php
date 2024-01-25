/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    11/16/2023

    connection.php connects register.php to a mysqli database called online_quiz.
*/

<?php
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_quiz");
?>