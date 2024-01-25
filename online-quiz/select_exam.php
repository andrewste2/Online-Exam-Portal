/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/15/2024

    select_exam.php allows students to select an exam they have been assigned.
*/

// if the user is not logged in send them back to login.php
<?php
session_start();
if(!isset($_SESSION["username"])) {
    ?>
    <script type = "text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
?>

<?php
// link to database
include "connection.php";
include "header.php";
?>
<div class = "row" style = "margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class = "col-lg-6 col-lg-push-3" style = "min-height: 500px; background-color: white;">
        <hr>
        <center>
        <h3>Select Exam Category</h3>
        </center>
        <hr>
        <?php
        $res = mysqli_query($link,"select * from exam_category");
        while($row = mysqli_fetch_array($res)) {
            ?>
            <input type = "button" class = "btn btn-success form-control" value = "<?php echo $row["category"]; ?>" style = "margin-top: 10px; background-color: blue; color: white" onclick = "set_exam_type_session(this.value);">
            <?php
        }
        ?>
    </div>
</div>
<?php

include "footer.php";
?>

// allows user to interact with the portal while requests are running
<script type = "text/javascript">
    function set_exam_type_session(exam_category) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.statuS == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category = "+ exam_category,true);
        xmlhttp.send(null);
    }
</script>
