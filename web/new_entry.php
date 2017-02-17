<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/16/2017
 * Time: 8:16 PM
 */
require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" id="entry" action="<?php echo htmlspecialcharas($_SERVER['PHP_SELF']);?>">
    <label>Enter New Entry</label><br><br>
    <input id="title" type="text" placeholder="INSERT TITLE"><br><br>
    <b><?php
        // outputs e.g. 'Last modified: March 04 1998.'
        echo date("F j, Y");
        ?>
    </b><br><br>
    <textarea id ="message" type="text" placeholder="Start your entry" cols="50" rows="10"></textarea><br><br>
    <input type="submit" value="Save">
</form>
</body>
</html>
