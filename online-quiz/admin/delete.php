/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    12/3/2023

    delete.php allows admins to delete created exams when they are on the exam_category page.
*/

<?php
session_start();
// link delete.php to the database
include "../connection.php";

if(!isset($_SESSION["admin"])) {
    ?>
    <script type = "text/javascript">
        window.location = "index.php";
    </script>
    <?php
}

$id = $_GET["id"];
mysqli_query($link,"delete from exam_category where id = $id");
?>

<script type = "text/javascript">
    window.location = "exam_category.php";
</script>