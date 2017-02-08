<?php

require "dbConnect.php";
$db = get_db();

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
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                $username = $_POST['username'];
                $password = $_POST['password'];
        
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
        }
        
        // Display the welcome page to user who successfully logged in
        echo '<h3 class="welcome">Welcome '. $_SESSION['loggedin'] . '!</h3>';
        
        // ACCESS DENIED!!
        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['error'] = "Invalid credentials";
            header("Location: login.php");
            exit;
        }
        ?>
    </body>
</html>