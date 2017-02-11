<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($passowrd)) {
    header("Location: signup.php");
    $_SESSION['error'] = "Invalid credentials";
    exit;
}

require "dbConnect.php";
$db = get_db();

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
        die();
    }
}

//
if (isset($_POST['new_user'])) {
    header("Location: login.php");
    exit;
}
?>