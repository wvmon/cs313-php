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

    $q = "SELECT id,title, entry_date, entry FROM journal WHERE user_id='".$_SESSION['user']."'";

    // parse through all passwords in database
    foreach ($db->query($q) as $row) {
        $id = $row['id'];
        $title = $row['title'];
        $date = $row['entry_date'];
        $entry = $row['entry'];

        echo "<div id='comment_box'><h3>$title</h3><p>$date</p><p>$entry</p><a href='#' name='edit'><i class='fa fa-pencil icon edit' 
aria-hidden='true'></i></a><a href='#' name='delete'><i class='fa fa-trash icon delete' aria-hidden='true'></i></a></div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <meta charset="utf-8">
    <meta name="viewort" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheets/styling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/b116fe7e2c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a href="new_entry.php"><div class="boxes"><a href="loggedin.php"><i class="fa fa-home" aria-hidden="true"><p>Homepage</p></i></div></a>
        </div>
    </div>
</div>
</body>
</html>
