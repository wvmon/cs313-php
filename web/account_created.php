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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO users(username, password) VALUES('" . $username . "', '" . $password . "')";

        $statement = $db->prepare($query);
        $statement->execute();
    }
    catch(PDOException $ex) {
        print "<p>error: $ex->getMessage() </p>\n\n";
    }
}
//
if (isset($_POST['new_user'])) {
    header("Location: login.php");
    exit;
}
?>