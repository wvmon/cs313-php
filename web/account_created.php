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

        $password_match = preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password);
        $username_match = preg_match('/^[A-Za-z][A-Za-z0-9]$/', $username);

        if (!empty($username) && !empty($password) && !empty($password2)) {
            if ($password_match) {
                if ($password == $password2) {
                    $username_check = $db->prepare('SELECT username FROM users WHERE username = :username');
                    $username_check->bindValue(':username', $username);
                    $username_check->execute();
                    $fetch = $username_check->fetch(PDO::FETCH_ASSOC);

                    if ($username_match) {
                        if ($username == $fetch['username']) {
                            $_SESSION['error'] = "Username Already Exists.";
                            header("Location: signup.php");
                            exit;
                        }
                    } else {
                        $_SESSION['error'] = "Username Must Start With Letter.";
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
                    $_SESSION['error'] = "Passwords Do Not Match.";
                    header("Location: signup.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "Password Must be 8-20 Characters long and contain Contain Numbers, letters, CAPS.";
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