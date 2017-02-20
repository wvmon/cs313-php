<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/16/2017
 * Time: 8:16 PM
 */

/*ini_set('display_errors', 'On');
error_reporting(E_ALL);*/

require "dbConnect.php";
$db = get_db();

$get_date = date("F j, Y");

$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$entry = filter_var($_POST['entry'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$date = $_POST['date'];

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if ($_SESSION['user']) {
            if (!empty($title) && !empty($entry)) {
                /*$data = $db->prepare('SELECT id FROM journal WHERE title = :title AND entry = :entry');
                $data->bindValue(':title', $title);
                $data->bindValue(':entry', $entry);
                $data->execute();
                $table = $data->fetch(PDO::FETCH_ASSOC);
                if ($table) {
                    $_SESSION['history'] = (int)$table['id'];
                }*/

                $query = "INSERT INTO journal(user_id, title, entry_date, entry) VALUES(:user_id, :title, :entry_date, :entry)";
                $statement = $db->prepare($query);

                $statement->bindValue(':user_id', $_SESSION['user']);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':entry_date', $date);
                $statement->bindValue(':entry', $entry);

                $statement->execute();
            } else {
                header("Location: new_entry.php");
                exit;
            }
        }
    } catch (PDOException $ex) {
        echo "Error connecting to DB. Details: $ex";
        die();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Entry</title>
    <meta charset="utf-8">
    <meta name="viewort" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheets/styling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/b116fe7e2c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--<form method="POST" id="entry" action="<?php /*echo htmlspecialchars($_SERVER['PHP_SELF']);*/?>">
    <label>Enter New Entry</label><br><br>
    <input id="title" type="text" class="login" name="title" placeholder="INSERT TITLE"><br><br>
    <input id="date" type="text" name="date" value="<?php /*echo $get_date; */?>" readonly><br><br>
    <textarea id ="message" name="entry" placeholder="Start your entry" cols="50" rows="10"></textarea><br><br>
    <input type="submit" value="Save">
</form>-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" id="entry" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <fieldset>
                    <legend>Enter New Entry</legend><br><br>
                    <div class="form_stuff">
                        <input id="title" type="text" class="login" name="title" placeholder="INSERT TITLE"><br><br>
                        <input id="date" type="text" class="date" name="date" value="<?php echo $get_date; ?>" readonly><br><br>
                        <textarea id ="message" name="entry" placeholder="START YOUR ENTRY" cols="50" rows="30" style="min-width: 75%"></textarea><br><br>
                        <input type="submit" value="Save">
                    </div>
                </fieldset>
            </form>
            <span class="errorspan"><?php echo $_SESSION['error']; ?></span>
        </div>
    </div>
</div>
<a href="loggedin.php"><i class="fa fa-home" aria-hidden="true"></i></a>
</body>
</html>