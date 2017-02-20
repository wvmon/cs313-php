<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */

session_start();
if (isset($_SESSION['loggedin'])) {
    header("Location: loggedin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Page</title>
        <meta charset="utf-8">
        <meta name="viewort" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheets/styling.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action="loggedin.php" id="form" method="POST">
                        <fieldset>
                            <legend class="legend">Login</legend>
                            <div class="form_stuff">
                                <input id="username" type="text" name="username" class="login" placeholder="Username"><br><br>
                                
                                <input id="password" type="password" name="password" class="login" placeholder="Password"><br><br>
                                
                                <input type="submit" name="login" class="btn" value="Login"><br><br>
                                
                                <a href="signup.php">Register for an account</a>
                            </div>                                
                        </fieldset>                    
                    </form>
                    <?php echo $_SESSION['error']; ?>
                </div>
            </div>                   
        </div>           
    </body>
</html>