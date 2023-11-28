// connects registration form to a database
<?php
include("connections.php");
?>

<!doctype html>
<html class = "no-js" lang = "en">

<head>
    <meta charset = "utf-8">
    <meta http-equiv = "x-ua-compatible" content = "ie=edge">
    <title>Register Now</title>
    <meta name = "description" content = "">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <link href = "https://fonts.googleapis.com/css?family=Play:400,700" rel = "stylesheet">
       <link rel = "stylesheet" href = "css1/bootstrap.min.css">
       <link rel = "stylesheet" href = "css1/font-awesome.min.css">
      <link rel = "stylesheet" href = "css1/owl.carousel.css">
    <link rel = "stylesheet" href = "css1/owl.theme.css">
    <link rel = "stylesheet" href = "css1/owl.transitions.css">
      <link rel = "stylesheet" href = "css1/animate.css">
      <link rel = "stylesheet" href = "css1/normalize.css">
      <link rel = "stylesheet" href = "css1/main.css">
      <link rel = "stylesheet" href = "style.css">
       <link rel = "stylesheet" href = "css1/responsive.css">
      <script src = "js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

	<div class = "error-pagewrap">
		<div class = "error-page-int">
			<div class = "text-center custom-login">
				<h3>Register Now</h3>

			</div>
			<div class = "content-error">
				<div class = "hpanel">
                    <div class = "panel-body">
                        <form action = "" name = "form1" method = "post">
                            <div class = "row">
                                <div class = "form-group col-lg-12">
                                    <label>FirstName</label>
                                    <input type = "text" name = "firstname" class = "form-control">
                                </div>
                                <div class = "form-group col-lg-12">
                                    <label>LastName</label>
                                    <input type = "text" name = "lastname" class = "form-control">
                                </div>
                                <div class = "form-group col-lg-12">
                                    <label>Username</label>
                                    <input type = "text" name = "username" class = "form-control">
                                </div>
                                <div class = "form-group col-lg-12">
                                    <label>Password</label>
                                    <input type = "password" name = "password" class = "form-control">
                                </div>
                                <div class = "form-group col-lg-12">
                                    <label>Email</label>
                                    <input type = "text" name = "email" class = "form-control">
                                </div>
                                <div class = "form-group col-lg-12">
                                    <label>Number</label>
                                    <input type = "text" name = "number" class = "form-control">
                                </div>
                              </div>
                            <div class = "text-center">
                                <button type = "submit" name = "submit1" class = "btn btn-success loginbtn">Register</button>
                            </div>

                            // alert user that the registration has been Successful
                            <div class = "alert alert-success" id = "success" style = "margin-top: 12px display = none">
                                <strong>Success!</strong> Successful Account Registration.
                            </div>

                            // alert user that their username has already been registered
                            <div class = "alert alert-failure" id = "failure" style = "margin-top: 12px display = none">
                                <strong>Invalid Username!</strong> This Username is already in use.
                            </div>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>

// check if the username has already been registered
<?php 
if (isset($_POST("submit1"))) {
    
    $count = 0;
    $res = mysqli_query("SELECT * from registration where username = '".$_POST("username)'") or die (mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        ?>
        <script type = "text/javascript">
            document.getElementById("success").style.display = "none";
            document.getElementById("failure").style.display = "block";
        </script>
        <?php
    }
    else {
        mysqli_query($link, "insert into registration values (Null,'$_POST(firstname)','$_POST(lastname)','$_POST(username)','$_POST(password)','$_POST(email)','$_POST(number)'") or die (mysqli_error($link));
        ?>
        <script type = "text/javascript">
            document.getElementById("success").style.display = "block";
            document.getElementById("failure").style.display = "none";
        </script>
        <?php
    }

}
?>

<script src = "js/vendor/jquery-1.12.4.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/wow.min.js"></script>
<script src = "js/jquery-price-slider.js"></script>
<script src = "js/jquery.meanmenu.js"></script>
<script src = "js/owl.carousel.min.js"></script>
<script src = "js/jquery.sticky.js"></script>
<script src = "js/jquery.scrollUp.min.js"></script>
<script src ="js/plugins.js"></script>
<script src = "js/main.js"></script>

</body>

</html>