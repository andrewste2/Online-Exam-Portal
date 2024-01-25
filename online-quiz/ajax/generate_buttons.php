/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/15/2024

    generate_buttons.php generates buttons for user response.
*/

<br>
<center><h4>Total Questions</h4></center>
<?php
$total = $_GET["total"];
for($i = 1;$i<=$total;$i++) {
    ?>
    <div class = "col-lg-3 col-xs-2" style = "height: 40px;"><input type = "button" class = "abc" id = "<?php echo $i ?>" value = "<?php echo $i; ?>" onclick = "move_que(this.id);"> 
    </div>
    <?php
}
?>

