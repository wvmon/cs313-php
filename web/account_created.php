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
        $query = "INSERT INTO users(username, password) VALUES(:username, :password)";
        $statement = $db->prepare($query);

        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);

        $statement->execute();
    }
    catch(PDOException $ex) {
        print "<p>error: $ex->getMessage() </p>\n\n";
    }
}
// ACCESS DENIED!!
if (!isset($_SESSION['registered'])) {
    $_SESSION['error'] = "Required fields are empty";
    header("Location: signup.php");
    exit;
}
if (isset($_POST['new_user'])) {
    header("Location: login.php");
    exit;
}
?>