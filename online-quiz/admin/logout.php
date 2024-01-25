/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/15/2024

    logout.php logouts out the admin when requested, redirecting to the admin login page.
*/

<?php
session_start();
// redirect admin to adming login page
session_destroy();
?>
<script type="text/javascript">
    window.location="index.php";
</script>
