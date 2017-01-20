<?php
	$filename = "db/results.txt";
	$results = file_get_contents($filename);
	$results = explode("|", $results);
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
        <div class="container-fluid backgd">
		<div class="row">
			<div class="col-sm-12 text-center oldGloryRed">
				<h1>2016 Political Survey Results</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 survey">
			<?php
			 echo("<p>Here are the results for favorite Music:</p><br/>"):
                echo "Pop: "; echo $results[0];
				echo "<br/>";
				echo "Rock: "; echo $results[1];
				echo "<br/>";
                echo "Country: "; echo $results[2];
				echo "<br/>";
				echo "Jazz: "; echo $results[3];
				echo "<br/>";
				echo "Rap: "; echo $results[4];
				echo "<br/>";
                echo "Alternative: "; echo $results[5];
				echo "<br/>";
				echo "Metal: "; echo $results[6];
				echo "<br/>";
				echo "Bluegrass: "; echo $results[7];
				echo "<br/>";
				echo "Classical: "; echo $results[8];
                echo "<br/>";
                echo "Other: "; echo $results[9];
				echo "<br/><br/>";
                
                echo("<p>Here are the results for favorite City:</p><br/>"):
                echo "New York: "; echo $results[10];
				echo "<br/>";
				echo "Los Angeles: "; echo $results[11];
				echo "<br/>";
				echo "Las Vegas: "; echo $results[12];
				echo "<br/>";
				echo "Chicago: "; echo $results[13];
				echo "<br/>";
                echo "Seattle: "; echo $results[14];
				echo "<br/>";
				echo "DC: "; echo $results[15];
				echo "<br/>";
                echo "Other: "; echo $results[16];
				echo "<br/><br/>";
                
                echo("<p>Here are the results for favorite City:</p><br/>"):
                echo "Football: "; echo $results[17];
				echo "<br/>";
				echo "Soccer: "; echo $results[18];
				echo "<br/>";
				echo "Baseball: "; echo $results[19];
				echo "<br/>";
				echo "Tennis: "; echo $results[20];
				echo "<br/>";
                echo "Basketball: "; echo $results[21];
				echo "<br/>";
				echo "Hockey: "; echo $results[22];
				echo "<br/>";
                echo "Other: "; echo $results[23];
				echo "<br/><br/>";
                
                echo "Cat: "; echo $results[24];
				echo "<br/>";
				echo "Dog: "; echo $results[25];
				echo "<br/>";
				echo "Parrot: "; echo $results[26];
				echo "<br/>";
				echo "Snake: "; echo $results[27];
				echo "<br/>";
                echo "Shark: "; echo $results[28];
				echo "<br/>";
				echo "Hamster: "; echo $results[29];
				echo "<br/>";
				echo "Bunny: "; echo $results[30];
				echo "<br/>";
				echo "Ponny: "; echo $results[31];
                echo "<br/>";
                echo "Monkey: "; echo $results[32];
				echo "<br/>";
				echo "Lizard: "; echo $results[33];
				echo "<br/>";
				echo "Pig: "; echo $results[34];
                echo "<br/>";
                echo "Other: "; echo $results[35];
				echo "<br/><br/>";               
			?>
			</div>
            <div class="col-sm-12 text-center oldGloryRed">
				<h7>Thank you for your responses!</h7>
			</div>
			<div class="col-sm-12 text-center oldGloryRed">
				<h7>Thank you for your responses!</h7>
			</div>
		</div>
	</div>
    </body>
</html>