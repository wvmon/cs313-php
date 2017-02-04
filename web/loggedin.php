<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div class="row headerBox">
        <div class="col-sm-12">
            <h1 class="headerText">Student Budget</h1>        
            <?php
            session_start();
            $dbUrl = getenv('DATABASE_URL');
            if (empty($dbUrl)) {
                $dbUrl = "postgres://postgres:lz3f445r@localhost:5432/cs313db";
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
                    $q = "SELECT password FROM users WHERE username=$username";
                    foreach ($db->query($q) as $row) {
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['loggedin'] = $username;
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
            echo '<h3 class="headerText2" style="float:right;">Welcome '. $_SESSION['loggedin'] . '!</h3>';
            if (!isset($_SESSION['loggedin'])) {
                $_SESSION['error'] = "Invalid credentials";
                header("Location: login.php");
                exit;
            }
            ?>
        </div>
    </div>
    </body>
</html>