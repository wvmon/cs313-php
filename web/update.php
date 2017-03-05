<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 3/5/2017
 * Time: 1:49 PM
 */
require "dbConnect.php";
$db = get_db();

$get_date = date("F j, Y");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modify Entry</title>
    <meta charset="utf-8">
    <meta name="viewort" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheets/styling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/b116fe7e2c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "SELECT title, entry FROM journal WHERE id='" . $id . "'";

// parse through all passwords in database
    foreach ($db->query($q) as $row) {
        $title = $row['title'];
        $entry = $row['entry'];
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" id="entry" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <fieldset>
                    <legend class="entry_legend">Enter New Entry</legend><br><br>
                    <div class="form_stuff">
                        <input id="title" type="text" class="login" name="title" placeholder="INSERT TITLE" value="?php echo $title; ?>">
                        <br><br>
                        <input id="date" type="text" class="date" style="min-width: 75%" name="date" value="<?php echo $get_date; ?>" readonly>
                        <br><br>
                        <textarea id ="message" name="entry" class="login" placeholder="START YOUR ENTRY" cols="50"
                                  rows="30" style="min-width: 75%" value="?php echo $entry; ?>"></textarea>
                        <br><br>
                        <div class="sub"><input type="submit" class="btn" name="update" value="Update"></div><br>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"><?php echo $_SESSION['message']; ?></div>
        <div class="col-lg-4"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a href="new_entry.php"><div class="boxes"><a href="loggedin.php"><i class="fa fa-home" aria-hidden="true"><p>Homepage</p></i></div></a>
        </div>
    </div>
</div>
</body>
</html>
