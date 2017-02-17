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
    <?php
    session_start();

    $msg_array = [
        'Username and Password are Required',
        'Invalid Username or Password'
    ];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {

            // check to see if fields are empty
            if (!empty($username) && !empty($password)) {

                // confirm the user exists in the database
                $q = $db->prepare('SELECT password FROM users WHERE username = :username');
                $q->bindValue(':username', $username);
                $q->execute();
                $results = $q->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $results['password'])) {
                    $_SESSION['loggedin'] = $username;
                }
            } else {
                $_SESSION['error'] = $msg_array[0];
                header("Location: login.php");
                exit;
            }
        }
        catch (PDOException $ex) {
            echo "Error connecting to DB. Details: $ex";
            die();
        }
    }

    // Display the welcome page to user who successfully logged in
    echo '<h3 class="welcome">Welcome '. $_SESSION['loggedin'] . '!</h3>';

    // ACCESS DENIED!!
    if (!isset($_SESSION['loggedin'])) {
        $_SESSION['error'] = $msg_array[1];
        header("Location: login.php");
        exit;
    }
    ?>
    <a href="logout.php">Logout</a>
    <form method="POST" id="entry" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <label>Enter New Entry</label><br><br>
        <input id="title" type="text" placeholder="INSERT TITLE"><br><br>
        <b><?php
            // outputs e.g. 'Last modified: March 04, 1998.'
            echo date("F j, Y");
            ?>
        </b><br><br>
        <textarea id ="message" type="text" placeholder="Start your entry" cols="50" rows="10"></textarea><br><br>
        <input type="submit" value="Save">
    </form>
</body>
</html>
