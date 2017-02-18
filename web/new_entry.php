<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/16/2017
 * Time: 8:16 PM
 */
require "dbConnect.php";
$db = get_db();

$get_date = date("F j, Y");

$title = $_POST['title'];
$entry = $_POST['entry'];
$date = $_POST['date'];
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" id="entry" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label>Enter New Entry</label><br><br>
    <input id="title" type="text" name="title" placeholder="INSERT TITLE"><br><br>
    <input id="date" type="date" name="date" value="<?php echo $get_date; ?>" readonly><br><br>
    <textarea id ="message" name="entry" placeholder="Start your entry" cols="50" rows="10"></textarea><br><br>
    <input type="submit" value="Save">
</form>
</body>
</html>
