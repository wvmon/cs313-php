<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        <label>What music do you like to listen to?</label>
                        <input type="checkbox"> Pop
                        <input type="checkbox"> Rock
                        <input type="checkbox"> Jazz<br/>
                        <input type="checkbox"> Country
                        <input type="checkbox"> Rap
                        <input type="checkbox"> Alternative<br/>
                        <input type="checkbox"> Metal
                        <input type="checkbox"> Bluegrass
                        <input type="checkbox"> Classical<br/>
                        <input type="checkbox"> Christian
                        <input type="checkbox"> Other
                        <input type="checkbox"> None<br/><br/>
                        
                        <label>What's your favorite city?</label>
                        <input type="radio"> New York<br/>
                        <input type="radio"> Los Angeles<br/>
                        <input type="radio"> Las Vegas<br/>
                        <input type="radio"> Chicago<br/>
                        <input type="radio"> Seattle<br>
                        <input type="radio"> DC<br/>
                        <input type="radio"> Other<br/>
                        <input type="radio"> None<br/><br/>
                        
                        <label>What's your favorite sport</label>
                        <input type="radio"> Football<br/>
                        <input type="radio"> Soccer<br/>
                        <input type="radio"> Baseball<br/>
                        <input type="radio"> Tennis<br/>
                        <input type="radio"> Basketball<br>
                        <input type="radio"> Hockey<br/>
                        <input type="radio"> I don't play sports<br/><br/>
                        
                        <label>What's your favorite pet?</label>
                        <input type="checkbox"> Cat
                        <input type="checkbox"> Dog
                        <input type="checkbox"> Parrot<br/>
                        <input type="checkbox"> Snake
                        <input type="checkbox"> Shark
                        <input type="checkbox"> Hamster<br/>
                        <input type="checkbox"> Bunny
                        <input type="checkbox"> Ponny
                        <input type="checkbox"> Monkey<br/>
                        <input type="checkbox"> Lizard
                        <input type="checkbox"> Pig
                        <input type="checkbox"> Other<br/>
                        <input type="checkbox"> None, I'm allergic to all of them<br/><br/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>