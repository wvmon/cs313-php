<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */

$username = $_POST['username'];
$password = $_POST['password'];

/*if (empty($username) || empty($passowrd)) {
    $_SESSION['error'] = "Invalid credentials";
    header("Location: signup.php");
    exit;
}*/

require "dbConnect.php";
$db = get_db();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(username, password) VALUES(:username, :password)";
        $statement = $db->prepare($query);

        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hash);

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