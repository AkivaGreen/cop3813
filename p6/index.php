<html>
<head>
    <title>Conversions</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/application.css" type="text/css">
</head>
<body>
    <div class="container">
        <div class="col-md-5 col-md-offset-3">
             <form class="form-horizontal" action="index.php" method="POST">
                <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" id="unit" name="unit" class="form-control" required autofocus>
                </div>

                <div class="form-group">
                    <div class="checkbox-inline">
                        <label for="fahrenheit">Fahrenheit to Celsius</label>
                        <input type="radio" name="conversion" id="fahrenheit" value="fahrenheit">
                     </div>

                     <div class="checkbox-inline">
                        <label for="celsius">Celsius to Fahrenheit</label>
                        <input type="radio" name="conversion" id="celsius" value="celsius">
                     </div>
                </div>
                <div class="form-group">
                     <div class="checkbox-inline">
                        <label for="feet">Feet to Meters</label>
                        <input type="radio" name="conversion" id="feet" value="feet">
                     </div>

                     <div class="checkbox-inline">
                        <label for="meters">Meters to Feet</label>
                        <input type="radio" name="conversion" id="meters" value="meters">
                     </div>
                </div>
                <div class="form-group">
                     <div class="checkbox-inline">
                        <label for="gallons">Gallons to Liters</label>
                        <input type="radio" name="conversion" id="gallons" value="gallons">
                     </div>

                     <div class="checkbox-inline">
                        <label for="liters">Liters to Gallons</label>
                        <input type="radio" name="conversion" id="liters" value="liters">
                     </div>
                 </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>

            <?php
            function sanitizeString($str)
            {
                $str = strip_tags($str);
                $str = htmlentities($str);
                $str = stripslashes($str);
                return $str;
            }

            function toFahrenheit($celsius)
            {
                return ((1.8 * $celsius) + 32);
            }

            function toCelsius($fahrenheit)
            {
                return(($fahrenheit - 32) / 1.8);
            }

            function toMeters($feet){
              return($feet*0.3048);
            }

            function toFeet($meters){
              return($meters*3.28084);
            }

            function toLiters($gallons){
              return($gallons*3.78541);
            }

            function toGallons($liters){
              return($liters*0.264172);
            }

            if(isset($_POST['unit']))
            {
                // sanitize temperature
                $unit = sanitizeString($_POST['unit']);

                $output = "Error!";

                // business logic
                if(isset($_POST["conversion"])){
                    if($_POST['conversion'] === 'fahrenheit'){
                        $output = $unit . " F == " . toCelsius($unit) . " C";
                    }
                    else if($_POST['conversion'] === 'celsius'){
                        $output = $unit . " C == " . toFahrenheit($unit) . " F";
                    }
                    else if($_POST["conversion"] == "meters"){
                      $output = $unit . " m == " . toFeet($unit) . " ft";
                    }
                    else if($_POST["conversion"] == "feet"){
                      $output = $unit . " ft == " . toMeters($unit) . " m";
                    }
                    else if($_POST["conversion"] == "liters"){
                      $output = $unit . " L == " . toGallons($unit) . " g";
                    }
                    else if($_POST["conversion"] == "gallons"){
                      $output = $unit . " g == " . toLiters($unit) . " L";
                    }
                }
            }
            ?>
        </div>
    </div>
    <?php if(isset($output)){ ?>
      <div class="container conversion-container">
        <div class="col-md-5 col-md-offset-3">
          <h3>Converting <?php echo ucfirst($_POST["conversion"]) ?></h3>
          <p><?= $output ?></p>
        </div>
      </div>
    <?php } ?>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
