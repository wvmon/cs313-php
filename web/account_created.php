<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);

print_r("jhfgh");
require "dbConnect.php";
$db = get_db();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users(username, password) VALUES('" . $username . "', '" . $hash . "')";

        //$statement = $db->prepare($query);
        $db->exec($query);
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