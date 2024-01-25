/*
    Online Exam Portal
    Andrew, Arav, Nikhil
    1/15/2024

    logout.php logs the user out and redirects back to the login page.
*/

<?php
session_start();
// stop the session/logout
session_destroy();
?>
<script type="text/javascript">
    window.location="login.php";
</script>
