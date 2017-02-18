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
    $q = "SELECT title, entry_date FROM journal WHERE user_id='".$_SESSION['user']."'";

    // parse through all passwords in database
    foreach ($db->query($q) as $row) {
        $title = $row['title'];
        $date = $row['entry_date'];

        echo "<h3>$title <br> $date</h3>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>History</title>
</head>
<body>

</body>
</html>
