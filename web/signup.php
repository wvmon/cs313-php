<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */
session_start();
if (isset($_SESSION['registered'])) {
    header("Location: account_created.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create New Account</title>
        <meta charset="utf-8">
        <meta name="viewort" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheets/styling.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function validUsername(username) {
                var valUsername = /^[A-Za-z][a-zA-Z0-9]+$/;
                if (username.match(valUsername)) {
                    document.getElementById('error_msg').innerText = "";
                }
                else {
                    document.getElementById('error_msg').innerText = "Username Must Start With Letter and Have No Spaces.";
                }
            }

            function validPassword(password) {
                var valPassword = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,20})");
                if (password.match(valPassword)) {
                    document.getElementById('error_msg2').innerText = "";
                }
                else {
                    document.getElementById('error_msg2').innerText = "Password Must Be 8-20 Characters Long and Contain " +
                        "Numbers, letters, CAPS.";
                }
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action="account_created.php" method="POST">
                        <fieldset>
                            <legend class="signup_legend">Signup</legend>
                            <div class="form_stuff">
                                <input id="username" type="text" name="username" class="login" placeholder="Username"
                                       onkeyup="validUsername(document.getElementById('username').value)"><br>

                                <span id="error_msg"></span><br>
                                
                                <input id="password" type="password" name="password" class="login" placeholder="Password"
                                       onkeyup="validPassword(document.getElementById('password').value)"><br>

                                <span id="error_msg2"></span><br>

                                <input type="password" name="password2" class="login" placeholder="Confirm Password"><br><br>
                                
                                <div class="sub"><input type="submit" name="submit" class="btn" value="Create"></div><br>

                                <input type="hidden" name="new_user" value="true">

                                <a href="login.php">Already have an account?</a>
                            </div>                            
                        </fieldset>                    
                    </form>
                    <?php echo $_SESSION['error']; ?>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>           
    </body>
</html>