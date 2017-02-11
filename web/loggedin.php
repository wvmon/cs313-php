<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */
require "dbConnect.php";
$db = get_db();

// variables initialized
$username = $_POST['username'];
$password = $_POST['password'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Check for log in</title>
        <meta charset="utf-8">
        <meta name="viewort" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheets/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        session_start();
        if (!empty($_POST[$email]) && !empty($_POST[$password])) {
            try {
                // match the password with the given username
                $q = "SELECT password FROM users WHERE username='".$username."'";
                
                // parse through all passwords in database
                foreach ($db->query($q) as $row) {
                    
                    // validate the user's password
                    // WELCOME USER!!!
                    if (isset($password) && $password == $row['password']) {
                        $_SESSION['loggedin'] = $username;
                    }
                }
            }
            catch (PDOException $ex) {
                print "<p>error: $ex->getMessage() </p>\n\n";
                die();
            }
        } else {
            $_SESSION[$error] = "Required fields are empty.";
        }
        
        // Display the welcome page to user who successfully logged in
        echo '<h3 class="welcome">Welcome '. $_SESSION['loggedin'] . '!</h3>';
        
        // ACCESS DENIED!!
        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['error'] = "Invalid Username or Password";
            header("Location: login.php");
            exit;
        }
        ?>
        <a href="logout.php">Logout</a>
    </body>
</html>