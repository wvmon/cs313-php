<?php

/*require "dbConnect.php";
$db = get_db();*/

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
        <h1>Are you logged in?</h1>
        <?php
        session_start();
        $dbUrl = getenv('DATABASE_URL');
            if (empty($dbUrl)) {
                $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
            }
            $dbopts = parse_url($dbUrl);
            $dbHost = $dbopts["host"];
            $dbPort = $dbopts["port"];
            $dbUser = $dbopts["user"];
            $dbPassword = $dbopts["pass"];
            $dbName = ltrim($dbopts["path"],'/');
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                    $username = $_POST['username'];
                    $password = $_POST['password'];
        
                    $q = "SELECT password FROM users WHERE username='".$username."'";
                    foreach ($db->query($q) as $row) {
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['loggedin'] = $username;
                        } else {
                            /*$_SESSION['error'] = "Invalid credentials";
                            header("Location: login.php");
                            exit;*/
                            echo "Your welcome $username and $password and " . print_r($row);
                        }
                    }
                }
                catch (PDOException $ex) {
                    print "<p>error: $ex->getMessage() </p>\n\n";
                    die();
                }
        }
        echo '<h3 class="headerText2" style="float:right;">Welcome '. $_SESSION['loggedin'] . '!</h3>';
            /*if (!isset($_SESSION['loggedin'])) {
                $_SESSION['error'] = "Invalid credentials";
                header("Location: login.php");
                exit;
            }*/
        echo "<p>" . print_r($_SERVER) . "</p>";
        echo "<p>" . print_r($SESSION) . "</p>";
        echo "<p>" . print_r($dbUrl) . "</p>";
        echo "<p>" . print_r($db) . "</p>";
        ?>
    </body>
</html>