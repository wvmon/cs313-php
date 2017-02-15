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
        <link rel="stylesheet" href="stylesheets/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action="account_created.php" method="POST">
                        <fieldset>
                            <legend class="legend2">Signup</legend>
                            <div class="form_stuff">
                                <input type="text" name="username" class="login" placeholder="Username"><br><br>
                                
                                <input type="password" name="password" class="login" placeholder="Password"><br><br>

                                <input type="password" name="password2" class="login" placeholder="Confirm Password"><br><br>
                                
                                <input type="submit" name="submit" class="btn" value="Create"><br><br>

                                <input type="hidden" name="new_user" value="true">

                                <a href="login.php">Already have an account?</a>
                            </div>                            
                        </fieldset>                    
                    </form>
                    <span class="errorspan"><?php echo $_SESSION['error']; ?></span>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>           
    </body>
</html>