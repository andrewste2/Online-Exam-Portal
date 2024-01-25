/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/13/2024

    delete_option.php allows admin to delete questions that were created.
*/

<?php
session_start();
// link to database
include "../connection.php";

if(!isset($_SESSION["admin"])) {
    ?>
    <script type = "text/javascript">
        window.location = "index.php";
    </script>
    <?php
}

$id = $_GET["id"];
$id1 = $_GET["id1"];

// delete question from database
mysqli_query($link,"delete from questions where id = $id");

?>
// show updated page
<script type = "text/javascript">
    window.location = "add_edit_questions.php?id = <?php echo $id1 ?>";
</script>