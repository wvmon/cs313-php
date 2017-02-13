<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/8/2017
 * Time: 6:09 PM
 */
require "dbConnect.php";
$db = get_db();

// variables initialized
$username = $_POST['username'];
$password = $_POST['password'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Check for log in</title>
        <meta charset="utf-8">
        <meta name="viewort" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheets/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        session_start();

        $msg_array = [
            'Username and Password are Required',
            'Invalid Username or Password'
        ];

        $msg = print_r('<div class="modal fade" id="myModal" role="dialog"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Modal Header</h4></div><div class="modal-body"><p>This is a small modal.</p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>');

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                if (!empty($username) && !empty($password)) {
                    /*// match the password with the given username
                    $q = "SELECT password FROM users WHERE username='".$username."'";

                    // parse through all passwords in database
                    foreach ($db->query($q) as $row) {

                        // validate the user's password
                        // WELCOME USER!!!
                        if (isset($password) && $password == $row['password']){
                            $_SESSION['loggedin'] = $username;
                        }
                    }*/
                    $q = $db->prepare('SELECT password FROM users WHERE username = :username');
                    $q->bindValue(':username', $username);
                    $q->execute();
                    $results = $q->fetch(PDO::FETCH_ASSOC);

                    if (count($results) > 0 && $password == $results['password']) {
                        $_SESSION['loggedin'] = $username;
                    }
                } else {
                    $_SESSION['error'] = $msg_array[0];
                    header("Location: login.php");
                    exit;
                }

            }
            catch (PDOException $ex) {
                print "<p>error: $ex->getMessage() </p>\n\n";
                die();
            }
        }
        
        // Display the welcome page to user who successfully logged in
        echo '<h3 class="welcome">Welcome '. $_SESSION['loggedin'] . '!</h3>';

        // ACCESS DENIED!!
        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['error'] = $msg;
            header("Location: login.php");
            exit;
        }
        ?>
        <a href="logout.php">Logout</a>
    </body>
</html>