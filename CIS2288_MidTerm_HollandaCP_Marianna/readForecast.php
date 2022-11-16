<!--
Author: Marianna Hollanda
Date: 2021-10-20
Class:CIS2288
Description: MidTerm Practical
-->

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="css/bootstrap.css" rel="stylesheet">
		<title>Forecast</title>
		<style>
			.container-fluid {
				/* This class is used as is from bootstrap. No changes required. */
			}
			/* This class creates the blue boxes of the correct width for each day. */
			.bg-primary {
				width:500px;
				height: auto;
				min-height: 150px;
				padding:10px;
				margin-bottom:2px;
			}
			/* This sets the paragraphs away from the left margin */
			.bg-primary p {
				padding-left:90px;
			}
			/* This floats the image to the left and sets the size. */
			.forecastImage {
				margin-right: 10px;
				width: 80px;
				float:left;
			}
			h5 {
				background-color: yellow;
				width:500px;
				padding: 10px;
			}
		</style>
	</head>
	<body>
    <?php
    // Array for months
    $monthArray = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    //Temperature codes for display
    $degreeCodeCelsius = "&#8451;";
    $degreeCodeFahrenheit = "&#8457;";

    //Variables
    $high = 0;
    $low = 0;
    $days = 0;

    $pathToFile = 'C:\xampp\htdocs\CIS2288\midTerm2019Start\forecastData\forecast.txt';

    //this code will be used in the event the data file is not found or is empty
    if(filesize($pathToFile) == 0 && file_exists($pathToFile)){
        echo "<h2>Forecast is unavailable. Our web team has been notified.</h2>";
    } else {
        $myFileArray = file($pathToFile);
        $fp = fopen($pathToFile, 'r');
        $forecastRecord = fgets($fp);
        $forecast = explode(";", $forecastRecord);

        echo "<div class= 'container-fluid'><h3>5 Day Forecast for ". $forecast[9] . "</h3>";

        foreach ($myFileArray as $forecastRecord){
            $forecast = explode(";", $forecastRecord);

            //Modifying the Array Celsius and Fahrenheit to their codes
            $temperature = "";
            $degree = "";

            if($forecast[8] == "celsius"){
                $degree = $degreeCodeCelsius;
            }

            if($forecast[8] == "fahrenheit"){
                $degree == $degreeCodeFahrenheit;
            }

            //Months array

            $months = $forecast[2] -1;

            echo "<div class='bg-primary'><h4>" . $forecast[0] . ", " . $monthArray[$months] . " " . $forecast[1] . " " . $forecast[3] . "</h4>";

            //Images modifying
            if($forecast[6] == "lightning"){
                echo "<img src='images/lightning.jpg' class='forecastImage'>";
            }elseif ($forecast[6] == "overcast"){
                echo "<img src='images/overcast.jpg' class='forecastImage'>";
            }elseif ($forecast[6] == "partlyCloudy"){
                echo "<img src='images/partlyCloudy.jpg' class='forecastImage'>";
            }elseif ($forecast[6] == "snow"){
                echo "<img src='images/snow.jpg' class='forecastImage'>";
            }elseif ($forecast[6] == "sun") {
                echo "<img src='images/sun.jpg' class='forecastImage'>";
            }elseif ($forecast[6] == "rain"){
                echo "<img src='images/rain.jpg' class='forecastImage'>";
            }
            echo "<p>" . $forecast[7] . "</p>
                  <p>High: " . $forecast[4] .  $degree . " Low: " . $forecast[5] .  $degree . "</p>
                  </div>
                  ";
        }

        //High and Low Average


        $high =+ $forecast[4];
        $low =+ $forecast[5];
        $days++;

        $highAverage = $high/$days; //1.8
        $lowAverage = $low/$days; //4.5

        echo "<h5>Weekly Temperature Averages: High:" . number_format($highAverage,1) . " Low: " . number_format($lowAverage, 1) . "</h5>
              Current as of " . (date('m/d/Y'));

        fclose($fp);
    }
    ?>
    </body>
</html>