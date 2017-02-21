<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/20/2017
 * Time: 11:25 PM
 */
require "dbConnect.php";
$db = get_db();

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
<?php echo $_SESSION['journal']; ?>
</body>
</html>