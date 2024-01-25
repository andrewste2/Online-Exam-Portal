/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/12/2024

    dashboard.php presents the framework of the exam to the student like the timer. Ajax is used to provide
    continued access while requests are being processed.
*/

<?php
session_start();
include "header.php";
if(!isset($_SESSION["username"])) {
    ?>
    <script type = "text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
?>

<div class = "row" style = "margin: 0px; padding: 0px; margin-bottom: 50px;">
    <div class = "col-lg-6 col-lg-push-1" style = "min-height: 500px; background-color: white;">
        <br>
        <div class = "row">
            <br>
            <div class = "col-lg-2 col-lg-push-10">
                <div id = "current_que" style = "float:left">0</div>
                <div style = "float:left">/</div>
                <div id = "total_que" style = "float:left">0</div>
            </div>

            <div class = "row" style = "margin-top: 30px">
                <div class = "row">
                    <div class = "col-lg-10 col-lg-push-1 col-xs-8" style = "min-height: 300px; background-color: white; padding-left:50px;" id = "load_questions">
                    </div>
                </div>
            </div>

            <div class = "row" style = "margin-top: 10px">
                <div class = "col-lg-6 col-lg-push-3 col-xs-12" style = "min-height: 50px">
                    <div class = "col-lg-12 text-center">
                        <input type = "button" class = "btn btn-warning" value = "Previous" onclick = "load_previous();">&nbsp;
                        <input type = "button" class = "btn btn-success" value = "Next" onclick = "load_next();">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class = "col-lg-3 col-lg-push-2" id = "que_buttons" style = "min-height: 500px; background-color: white;">
    </div>
</div>

// allows for student to stay on page while updates are being processed
<script type = "text/javascript">
    var tot_que = 0;
    function load_total_que() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                tot_que = xmlhttp.responseText;
                load_que_buttons(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET","forajax/load_total_que.php",true);
        xmlhttp.send(null);
    }

    var questionNo = "1";
    load_questions(questionNo);

    // loads questions w/o reloading the page
    function load_questions(questionNo) {
        document.getElementById("current_que").innerHTML = questionNo;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if(xmlhttp.responseText == "over") {
                    window.location = "result.php";
                }
                else {
                    document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET","forajax/load_questions.php?questionNo = "+ questionNo,true);
        xmlhttp.send(null);
    }

    // saves user selection in the session
    function radioclick(V,questionNo) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            }
        };
        xmlhttp.open("GET","forajax/save_answer_in_session.php?questionNo = "+ questionNo +"&value1 = "+radioValue,true);
        xmlhttp.send(null);

    }

    function load_previous() {
        if(questionNo == "1") {
           load_questions(questionNo);
        }
        else {
           questionNo = eval(questionNo)-1;
           load_questions(questionNo);
        }
    }

    function load_next() {
        questionNo = eval(questionNo)+1;
        load_questions(questionNo);
    }

    function load_que_buttons(total) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("que_buttons").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/generate_buttons.php?total = "+total,true);
        xmlhttp.send(null);
    }

    function move_que(id) {
        questionNo = id;
        load_questions(id);
        setTimeout(function()) {
            for(var i = 1;i <= tot_que; i++) {
                document.getElementById(id).style.backgroundColor = "grey";
                document.getElementById(id).style.color = "black";
            }

            document.getElementById(id).style.backgroundColor = "green";
            document.getElementById(id).style.color = "white";
        }
    }
</script>


<?php
include "footer.php";
?>