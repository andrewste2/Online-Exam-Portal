// link to a mysqli database
<?php
$link = mysqli_connect("localhost","root", "");
mysqli_select_db($link,"online_quiz");
?>