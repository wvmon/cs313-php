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

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if (!empty($username) && !empty($password)) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users(username, password) VALUES(:username, :password)";
            $statement = $db->prepare($query);

            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $hash);

            $statement->execute();
        } else {
            $_SESSION['error'] = "Required fields are empty";
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