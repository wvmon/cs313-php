<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */

require "dbConnect.php";
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

if ($_SERVER[REQUEST_METHOD] == 'POST') {
    try {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users(username, password) VALUES('" . $username . "', '" . $hash . "')";
        $statement = $db->prepare($query);
        $statement->execute();
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