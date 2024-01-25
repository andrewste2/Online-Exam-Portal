/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/20/2024

    load_total_questions.php loads all questions from an exam.
*/

<?php
session_start();
// link to database
include "../connection.php";

$total_questions = 0;
$res1 = mysqli_query($link,"select * from questions where category='$_SESSION[exam_category]'");
$total_questions = mysqli_num_rows($res1);
echo $total_questions;
?>