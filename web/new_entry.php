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
require "loggedin.php";

$get_date = date("F j, Y");

$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$entry = filter_var($_POST['entry'], FILTER_SANITIZE_STRING);
$date = $_POST['date'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if (!empty($title) && !empty($entry)) {
            /*$username_check = $db->prepare('SELECT username FROM users WHERE username = :username');
            $username_check->bindValue(':username', $username);
            $username_check->execute();
            $fetch = $username_check->fetch(PDO::FETCH_ASSOC);*/

            $query = "INSERT INTO journal(title, entry_date, entry) VALUES(:title, :entry_date, :entry)";
            $statement = $db->prepare($query);

            $statement->bindValue(':title', $title);
            $statement->bindValue(':entry_date', $date);
            $statement->bindValue(':entry', $entry);

            $statement->execute();
        } else {
            header("Location: new_entry.php");
            exit;
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
    <title></title>
</head>
<body>
<?php echo "Username is: " . $username; ?>
<form method="POST" id="entry" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label>Enter New Entry</label><br><br>
    <input id="title" type="text" name="title" placeholder="INSERT TITLE"><br><br>
    <input id="date" type="text" name="date" value="<?php echo $get_date; ?>" readonly><br><br>
    <textarea id ="message" name="entry" placeholder="Start your entry" cols="50" rows="10"></textarea><br><br>
    <input type="submit" value="Save">
</form>
</body>
</html>
