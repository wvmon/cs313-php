<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/18/2017
 * Time: 1:44 AM
 */
require "dbConnect.php";
$db = get_db();

session_start();
if ($_SESSION['user']) {
    /*$stm = $db->prepare('SELECT title, entry_date FROM journal WHERE user_id = :user_id');
    $stm->bindValue(':user_id', $_SESSION['user']);
    $stm->execute();
    $outcome = $stm->fetch(PDO::FETCH_ASSOC);*/
    // match the password with the given username

    $q = "SELECT id,title, entry_date FROM journal WHERE user_id='".$_SESSION['user']."'";

    // parse through all passwords in database
    foreach ($db->query($q) as $row) {
        $id = $row['id'];
        $title = $row['title'];
        $date = $row['entry_date'];

        echo "<div id='comment_box'><h3>$title</h3><p>$date</p><p>$id</p><a href='#' name='edit'>Edit</a><a href='#' name='delete'>Delete</a></div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <meta charset="utf-8">
    <meta name="viewort" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheets/stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="loggedin.php">Homepage</a>
</body>
</html>
