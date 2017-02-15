<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require "dbConnect.php";
$db = get_db();

// Variables initialized
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if (!empty($username) && !empty($password) && !empty($password2)) {
            if ($password == $password2) {
                if (strlen($password) >= 7) {
                    $username_check = $db->prepare('SELECT username FROM users WHERE username = :username');
                    $username_check->bindValue(':username', $username);
                    $username_check->execute();
                    $fetch = $username_check->fetch(PDO::FETCH_ASSOC);

                    if ($username == $fetch['username']) {
                        $_SESSION['error'] = "Username already exists.";
                        header("Location: signup.php");
                        exit;
                    }

                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    $query = "INSERT INTO users(username, password) VALUES(:username, :password)";
                    $statement = $db->prepare($query);

                    $statement->bindValue(':username', $username);
                    $statement->bindValue(':password', $hash);

                    $statement->execute();
                } else {
                    $_SESSION['error'] = "Password must be 7 or more characters long.";
                    header("Location: signup.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "Passwords do not match.";
                header("Location: signup.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "Required Field(s) are Empty";
            header("Location: signup.php");
            exit;
        }
    }
    catch(PDOException $ex) {
        print "<p>error: $ex->getMessage() </p>\n\n";
    }
}
if (isset($_POST['new_user'])) {
    header("Location: login.php");
    exit;
}
?>