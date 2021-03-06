<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */

/*ini_set('display_errors', 'On');
error_reporting(E_ALL);*/

require "dbConnect.php";
$db = get_db();

// Variables initialized
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$password2 = $_POST['password2'];

// BEGIN SESSION!
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        // regular expressions declared for verification purposes
        // password will be more complex and harder to crack
        $password_match = preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password);
        $username_match = preg_match("#^[a-zA-Z][a-zA-Z0-9]{5,20}#", $username);

        // check for empty fields
        if (!empty($username) && !empty($password) && !empty($password2)) {
            // validate passwords against regex
            if ($password_match) {
                // confirm both passwords match
                if ($password == $password2) {
                    $username_check = $db->prepare('SELECT username FROM users WHERE username = :username');
                    $username_check->bindValue(':username', $username);
                    $username_check->execute();
                    $fetch = $username_check->fetch(PDO::FETCH_ASSOC);

                    // validate username against regex
                    if ($username_match) {
                        // check for existing usernames in the database
                        if ($username == $fetch['username']) {
                            $_SESSION['error'] = "<div class='errorspan'>Username Already Exists</div>";
                            header("Location: signup.php");
                            exit;
                        }
                    } else {
                        $_SESSION['error'] = "<div class='errorspan'>Username Must Start With Letter and No Spaces</div>";
                        header("Location: signup.php");
                        exit;
                    }

                    // fortify the password
                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    // insert new user credentials
                    $query = "INSERT INTO users(username, password) VALUES(:username, :password)";
                    $statement = $db->prepare($query);

                    // bind values to match what we are looking for
                    $statement->bindValue(':username', $username);
                    $statement->bindValue(':password', $hash);

                    $statement->execute();
                } else {
                    $_SESSION['error'] = "<div class='errorspan'>Passwords Do Not Match</div>";
                    header("Location: signup.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "<div class='errorspan'>Password Must be 8-20 Characters Long and Contain Numbers, letters, CAPS</div>";
                header("Location: signup.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "<div class='errorspan'>Required Field(s) are Empty</div>";
            header("Location: signup.php");
            exit;
        }
    }
    catch(PDOException $ex) {
        print "<p>error: $ex->getMessage() </p>\n\n";
    }
}

// after new user was successfully created return back to login page
if (isset($_POST['new_user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Account Created</title>
    <meta charset="utf-8">
    <meta name="viewort" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheets/styling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
</body>
</html>
