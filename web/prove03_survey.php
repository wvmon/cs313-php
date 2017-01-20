<?php
    session_start();
    if ($_COOKIE["submitted"] == "yes") {
        header("Location: https://safe-wildwood-47417.herokuapp.com/results.php");
        exit(); // for security measures use this method
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error_msg = "";
        $valid = true;
        if (empty($_POST["Music"])) {
            $error .= "<li> You did not pick from the Genre catalog.</li>";
            $valid = false;
        }
        if (empty($_POST["City"])) {
            $error .= "<li> You did not pick from the Genre catalog.</li>";
            $valid = false;
        }
        if (empty($_POST["Sports"])) {
            $error .= "<li> You did not pick from the Genre catalog.</li>";
            $valid = false;
        }
        if (empty($_POST["Pets"])) {
            $error .= "<li> You did not pick from the Genre catalog.</li>";
            $valid = false;
        }
    }

    if ($valid) {
        $filename = "db/results.txt";
        $results = file_get_contents($filename);
        $results = explode("|", results);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>William Montesdeoca</title>
        <meta charset="utf-8">
        <meta name="viewort" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php
                        if(!empty($error)) {
                            echo("<p>Something went wrong with the survey.</p>");
                            echo("<ul>" . $error_msg . "</ul>");
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        <label>What music do you like to listen to?</label><br/>
                        <input type="checkbox" name="Music" value="Pop"> Pop
                        <input type="checkbox" name="Music" value="Rock"> Rock
                        <input type="checkbox" name="Music" value="Jazz"> Jazz<br/>
                        <input type="checkbox" name="Music" value="Country"> Country
                        <input type="checkbox" name="Music" value="Rap"> Rap
                        <input type="checkbox" name="Music" value="Alternative"> Alternative<br/>
                        <input type="checkbox" name="Music" value="Metal"> Metal
                        <input type="checkbox" name="Music" value="Bluegrass"> Bluegrass
                        <input type="checkbox" name="Music" value="Classical"> Classical<br/>
                        <input type="checkbox" name="Music" value="Other"> Other
                        <input type="checkbox" name="Music" value="None"> None<br/><br/>
                        
                        <label>What's your favorite city?</label><br/>
                        <input type="radio" name="City" value="New York"> New York<br/>
                        <input type="radio" name="City" value="Los Angeles"> Los Angeles<br/>
                        <input type="radio" name="City" value="Las Vegas"> Las Vegas<br/>
                        <input type="radio" name="City" value="Chicago"> Chicago<br/>
                        <input type="radio" name="City" value="Seattle"> Seattle<br>
                        <input type="radio" name="City" value="DC"> DC<br/>
                        <input type="radio" name="City" value="Other"> Other<br/>
                        <input type="radio" name="City" value="None"> None<br/><br/>
                        
                        <label>What's your favorite sport</label><br/>
                        <input type="radio" name="Sports" value="Football"> Football<br/>
                        <input type="radio" name="Sports" value="Soccer"> Soccer<br/>
                        <input type="radio" name="Sports" value="Baseball"> Baseball<br/>
                        <input type="radio" name="Sports" value="Tennis"> Tennis<br/>
                        <input type="radio" name="Sports" value="Basketball"> Basketball<br>
                        <input type="radio" name="Sports" value="Hockey"> Hockey<br/>
                        <input type="radio" name="Sports" value="I don't play sports"> I don't play sports<br/><br/>
                        
                        <label>What's your favorite pet?</label><br/>
                        <input type="checkbox" name="Pets" value="Cat"> Cat
                        <input type="checkbox" name="Pets" value="Dog"> Dog
                        <input type="checkbox" name="Pets" value="Parrot"> Parrot<br/>
                        <input type="checkbox" name="Pets" value="Snake"> Snake
                        <input type="checkbox" name="Pets" value="Shark"> Shark
                        <input type="checkbox" name="Pets" value="Hamster"> Hamster<br/>
                        <input type="checkbox" name="Pets" value="Bunny"> Bunny
                        <input type="checkbox" name="Pets" value="Ponny"> Ponny
                        <input type="checkbox" name="Pets" value="Monkey"> Monkey<br/>
                        <input type="checkbox" name="Pets" value="Lizard"> Lizard
                        <input type="checkbox" name="Pets" value="Pig"> Pig
                        <input type="checkbox" name="Pets" value="Other"> Other<br/>
                        <input type="checkbox" name="Pets" value="None, I'm allergic to all of them"> None, I'm allergic to all of them<br/><br/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>