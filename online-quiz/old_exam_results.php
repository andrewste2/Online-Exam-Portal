/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/20/2024

    old_exam_results.php displays the past results from users tests in a table.
*/

<?php
session_start();
include "header.php";
// link to database
include "connection.php";

if(!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}

?>
<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <center>
        <h1>Old Exams Results</h1>
        </center>

        <?php
        $count=0;
        // take users results from database
        $res=mysqli_query($link,"select * from exam_results where username='$_SESSION[username]' order by id desc");
        $count=mysqli_num_rows($res);

        // if there are no results return No Results Found
        if($count==0) {
            ?>
            <center>
                <h1>No Results Found</h1>
            </center>
            <?php
        }
        // if there is at least one exam taken, display in a table
        else {
            echo "<table class='table table-bordered'>";
            echo "<tr style='background-color: #006df0; color:white'>";
            echo "<th>"; echo "username"; echo "</th>";
            echo "<th>"; echo "exam type"; echo "</th>";
            echo "<th>"; echo "total question";  echo "</th>";
            echo "<th>"; echo "correct answer";  echo "</th>";
            echo "<th>"; echo "wrong answer";  echo "</th>";
            echo "<th>"; echo "exam time"; echo "</th>";
            echo "<th>"; echo "certificate"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>"; echo $row["username"]; echo "</td>";
                echo "<td>"; echo $row["exam_type"]; echo "</td>";
                echo "<td>"; echo $row["total_question"];  echo "</td>";
                echo "<td>"; echo $row["correct_answer"];  echo "</td>";
                echo "<td>"; echo $row["wrong_answer"];  echo "</td>";
                echo "<td>"; echo $row["exam_time"]; echo "</td>";
                echo "<td>"; ?> <a href="generate_certificate.php?id=<?php echo $row["id"]; ?>">Certificate</a> <?php  echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        ?>
    </div>
</div>

<?php
include "footer.php";
?>