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
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Check for log in</title>
        <meta charset="utf-8">
        <meta name="viewort" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheets/styling.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://use.fontawesome.com/b116fe7e2c.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {

                // check to see if fields are empty
                if (!empty($username) && !empty($password)) {
                    /*// match the password with the given username
                    $q = "SELECT password FROM users WHERE username='".$username."'";

                    // parse through all passwords in database
                    foreach ($db->query($q) as $row) {

                        // validate the user's password
                        // WELCOME USER!!!
                        if (isset($password) && $password == $row['password']){
                            $_SESSION['loggedin'] = $username;
                        }
                    }*/

                    $id = $db->prepare('SELECT id FROM users WHERE username = :username');
                    $id->bindValue(':username', $username);
                    $id->execute();
                    $row = $id->fetch(PDO::FETCH_ASSOC);
                    if ($row) {
                        $_SESSION['user'] = (int)$row['id'];
                    }

                    // confirm the user exists in the database
                    $q = $db->prepare('SELECT password FROM users WHERE username = :username');
                    $q->bindValue(':username', $username);
                    $q->execute();
                    $results = $q->fetch(PDO::FETCH_ASSOC);

                    if (password_verify($password, $results['password'])) {
                        $_SESSION['loggedin'] = $username;
                    }
                } else {
                    $_SESSION['error'] = "<div class='errorspan''>Username and Password are Required</div>";
                    header("Location: login.php");
                    exit;
                }
            }
            catch (PDOException $ex) {
                echo "Error connecting to DB. Details: $ex";
                die();
            }
        }
        
        // Display the welcome page to user who successfully logged in
        echo '<h3 class="welcome">Welcome '. $_SESSION['loggedin'] . '!</h3>';

        // ACCESS DENIED!!
        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['error'] = "<div class='errorspan''>Invalid Username or Password</div>";
            header("Location: login.php");
            exit;
        }
        ?>
        <div class="icon"><a href="new_entry.php"><i class="fa fa-file" aria-hidden="true"></i></a></div>
        <div class="icon"><a href="history.php"><i class="fa fa-history" aria-hidden="true"></i></a></div>
        <div class="icon"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></div>
    </body>
</html>