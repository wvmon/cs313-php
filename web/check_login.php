<!DOCTYPE html>
<html lang="en">
<head>
 <title>Student Budget</title>
 <meta charset="utf-8">
 <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row headerBox">
        <div class="col-sm-12">
            <h1 class="headerText">Student Budget</h1>        
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
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                    $q = "SELECT password FROM users WHERE username='".$username."'";
                    foreach ($db->query($q) as $row) {
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['check_login'] = $username;
                        } else {
                            $_SESSION['error'] = "Invalid credentials";
                            header("Location: login.php");
                            exit;
                        }
                    }
                }
                catch (PDOException $ex) {
                    print "<p>error: $ex->getMessage() </p>\n\n";
                    die();
                }
            }
            echo '<h3 class="headerText2" style="float:right;">Welcome '. $_SESSION['check_login'] . '!</h3>';
            if (!isset($_SESSION['check_login'])) {
                $_SESSION['error'] = "Invalid credentials";
                header("Location: login.php");
                exit;
            }
            ?>
            <p>Hello!</p>
        </div>
    </div>
</body>