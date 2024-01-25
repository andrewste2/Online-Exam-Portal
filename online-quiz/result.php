/*
    Online Exam Portal 
    Andrew, Arav, Nikhil
    1/17/2024

    result.php calculates the grade a student got on the exam.
*/

<?php
session_start();
// link to database
include "connection.php";

// track time for test
$date = date("m-d-Y H:i:s");
$_SESSION["end_time"] = date("m-d-Y H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
include "header.php";

?>
<div class = "row" style = "margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class = "col-lg-6 col-lg-push-3" style = "min-height: 500px; background-color: white;">
        <?php
        // track correct and incorrect
        $correct = 0;
        $wrong = 0;

        if(isset($_SESSION["answer"])) {
            for($i = 1;$i <= sizeof($_SESSION["answer"]);$i++) {
                $answer = "";
                $res = mysqli_query($link,"select * from questions where category = '$_SESSION[exam_category]' && question_no = $i");
                while($row = mysqli_fetch_array($res)) {
                    $answer = $row["answer"];
                }

                // check if user selected answer
                if(isset($_SESSION["answer"][$i])) {
                    if($answer == $_SESSION["answer"][$i]) {
                        $correct = $correct+1;
                    }
                    else{
                        $wrong = $wrong+1;
                    }
                }
                // if user didn't select answer 1 is added to wrong total
                else{
                    $wrong = $wrong+1;
                }
            }
        }

        $count = 0;
        $res = mysqli_query($link,"select * from questions where category = '$_SESSION[exam_category]'");
        // num of questions
        $count = mysqli_num_rows($res);
        $wrong = $count-$correct;
        echo "<br>";echo "<br>";
        echo "<center>";
        echo "Total Questions = ".$count;
        echo "<br>";
        echo "Correct Answer = ".$correct;
        echo "<br>";
        echo "Wrong Answer = ".$wrong;
        echo "</center>";
        ?>
    </div>
</div>
<?php

if(isset($_SESSION["exam_start"])) {
    $date = date("m-d-Y");
    mysqli_query($link,"insert into exam_results(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)values(NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')") or die(mysqli_error($link));
}

if(isset($_SESSION["exam_start"])) {
    // only allow user to take a test once
    unset($_SESSION["exam_start"]);
    ?>
    <script type = "text/javascript">
        window.location.href = window.location.href;
    </script>
    <?php
}
?>

<?php
include "footer.php";
?>