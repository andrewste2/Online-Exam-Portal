<?php
session_start();
include "header.php";
include "connection.php";
if (!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
?>
    <style type="text/css">
        .bigtitle {
            margin-top: 250px;
            text-transform: capitalize;
            color: red;
            font-weight: bold;
        }

        .smalltitle {
            margin-top: -30px;
            text-transform: capitalize;
            color: black;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
<?php
$certificate_image = "";
$res = mysqli_query($link, "select * from certificate");
while ($row = mysqli_fetch_array($res)) {
    $certificate_image = "admin/" . $row["certificate"];
}
$username = "";
$name = "";
$exam_name = "";
$id = $_GET["id"];
$res2 = mysqli_query($link, "select * from exam_results where id=$id");
while ($row2 = mysqli_fetch_array($res2)) {
    $username = $row2["username"];
    $exam_name = $row2["exam_type"];
}
$res3 = mysqli_query($link, "select * from registration where username='$username'");
while ($row3 = mysqli_fetch_array($res3)) {
    $name = $row3["firstname"] . " " . $row3["lastname"];
}
$name = strtoupper($name);
$exam_name = strtoupper($exam_name);
?>

    <div id="image2" class="row"
         style="width:959px; height:629px;margin: 0px; padding:0px; margin-bottom: 50px; margin: auto; background-image: url('<?php echo $certificate_image; ?>'); overflow: auto;">
        <center>
            <p style="text-transform: capitalize">

            <h1 class="bigtitle"><?php echo $name; ?></h1>
            </p>
            <br>

            <p style="text-transform: capitalize">

            <h1 class="smalltitle"><?php echo $exam_name; ?></h1>
            </p>

        </center>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<center>
<div id="canvas" style="margin: auto"></div>
</center>

    <script type="text/javascript">


        function aa() {

            html2canvas([document.getElementById('image2')], {
                onrendered: function (canvas) {
                    //document.getElementById('canvas').appendChild(canvas);
                    var data = canvas.toDataURL('image/jpg');
                    //display 64bit imag
                    var image = new Image();
                    image.src = data;
                    //document.getElementById('image1').appendChild(image);
                    document.getElementById('canvas').appendChild(image);
                    document.getElementById('image2').style.display="none";
                }
            });



        }
        setTimeout(function(){
            aa();
            alert("Right Click On Certificate And Save It");
        },1000);

    </script>
<?php
include "footer.php";
?>