<?php
    session_start();
    if ($_COOKIE["Submit"] == "yes") {
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
        
        $pop = (int)$results[0];
        $rock = (int)$results[1];
        $jazz = (int)$results[2];
        $country = (int)$results[3];
        $rap = (int)$results[4];
        $alternative = (int)$results[5];
        $metal = (int)$results[6];
        $bluegrass = (int)$results[7];
        $classical = (int)$results[8];
        $other = (int)$results[9];
        $ny = (int)$results[10];
        $la = (int)$results[11];
        $lv = (int)$results[12];
        $ch = (int)$results[13];
        $se = (int)$results[14];
        $dc = (int)$results[15];
        $other_1 = (int)$results[16];
        $football = (int)$results[17];
        $soccer = (int)$results[18];
        $baseball = (int)$results[19];
        $tennis = (int)$results[20];
        $basketball = (int)$results[21];
        $hockey = (int)$results[22];
        $other_2 = (int)$results[23];
        $cat = (int)$results[24];
        $dog = (int)$results[25];
        $parrot = (int)$results[26];
        $snake = (int)$results[27];
        $shark = (int)$results[28];
        $hamster = (int)$results[29];
        $bunny = (int)$results[30];
        $ponny = (int)$results[31];
        $monkey = (int)$results[32];
        $lizard = (int)$results[33];
        $pig = (int)$results[34];
        $other_3 = (int)$results[35];
        
        $answer = $_POST["Music"];
        if ($answer == "Pop") {
            $pop++;
        } else if ($answer == "Rock") {
            $rock++;
        } else if ($answer == "Jazz") {
            $jazz++;
        } else if ($answer == "Country") {
            $country++;
        } else if ($answer == "Rap") {
            $rap++;
        } else if ($answer == "Alternative") {
            $alternative++;
        } else if ($answer == "Metal") {
            $metal++;
        } else if ($answer == "Bluegrass") {
            $bluegrass++;
        } else if ($answer == "Classical") {
            $classical++;
        } else if ($answer == "Other") {
            $other++;
        }
        
        $answer = $_POST["City"];
        if ($answer == "New York") {
            $ny++;
        } else if ($answer == "Los Angeles") {
            $la++;
        } else if ($answer == "Las Vegas") {
            $lv++;
        } else if ($answer == "Chicago") {
            $ch++;
        } else if ($answer == "Seattle") {
            $se++;
        } else if ($answer == "DC") {
            $dc++;
        } else if ($answer == "Other1") {
            $other_1++;
        }
        
        $answer = $_POST["Sports"];
        if ($answer == "Football") {
            $football++;
        } else if ($answer == "Soccer") {
            $soccer++;
        } else if ($answer == "Baseball") {
            $baseball++;
        } else if ($answer == "Tennis") {
            $tennis++;
        } else if ($answer == "Basketball") {
            $basketball++;
        } else if ($answer == "Hockey") {
            $hockey++;
        } else if ($answer == "Other2") {
            $other_2;
        }
        
        $answer = $_POST["Pets"];
        if ($answer == "Cat") {
            $cat++;
        } else if ($answer == "Dog") {
            $dog++;
        } else if ($answer == "Parrot") {
            $parrot++;
        } else if ($answer == "Snake") {
            $snake++;
        } else if ($answer == "Shark") {
            $shark++;
        } else if ($answer == "Hamster") {
            $hamster++;
        } else if ($answer == "Bunny") {
            $bunny++;
        } else if ($answer == "Ponny") {
            $ponny++;
        } else if ($answer == "Monkey") {
            $monkey++;
        } else if ($answer == "Lizard") {
            $lizard++;
        } else if ($answer == "Pig") {
            $pig++;
        } else if ($answer == "Other3") {
            $other_3++;
        }
        
        $results = $pop."|".$rock."|".$jazz."|".$country."|".$rap."|".$alternative."|".$metal."|".$bluegrass."|".$classical."|".$other."|".$ny."|".$la."|".$lv."|".$ch."|".$se."|".$dc."|".$other_1."|".$football."|".$soccer."|".$baseball."|".$tennis."|".$basketball."|".$hockey."|".$other_2."|".$cat."|".$dog."|".$parrot."|".$snake."|".$shark."|".$hamster."|".$bunny."|".$ponny."|".$monkey."|".$lizard."|".$pig."|".$other_3;
        
        file_put_contents($filename, $results);
        setcookie("Submit", "yes");
        echo "set cookies";
        
        header("Location: https://safe-wildwood-47417.herokuapp.com/results.php");
        exit();
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
                        <input type="checkbox" name="Music" value="Other"> Other<br/><br/>
                        
                        <label>What's your favorite city?</label><br/>
                        <input type="radio" name="City" value="New York"> New York<br/>
                        <input type="radio" name="City" value="Los Angeles"> Los Angeles<br/>
                        <input type="radio" name="City" value="Las Vegas"> Las Vegas<br/>
                        <input type="radio" name="City" value="Chicago"> Chicago<br/>
                        <input type="radio" name="City" value="Seattle"> Seattle<br>
                        <input type="radio" name="City" value="DC"> DC<br/>
                        <input type="radio" name="City" value="Other1"> Other<br/>
                        
                        <label>What's your favorite sport></label><br/>
                        <input type="radio" name="Sports" value="Football"> Football<br/>
                        <input type="radio" name="Sports" value="Soccer"> Soccer<br/>
                        <input type="radio" name="Sports" value="Baseball"> Baseball<br/>
                        <input type="radio" name="Sports" value="Tennis"> Tennis<br/>
                        <input type="radio" name="Sports" value="Basketball"> Basketball<br>
                        <input type="radio" name="Sports" value="Hockey"> Hockey<br/>
                        <input type="radio" name="Sports" value="Other2"> Other<br/><br/>
                        
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
                        <input type="checkbox" name="Pets" value="Other3"> Other<br/><br/>
                        
                        <input type="submit" name="submit" value="Submit"><br/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>