<?php

$city = $_GET["city"];

// $city = str_replace(" ", "-", $city);

// $city = "Taiwan";

$apiKey = "86fded9a90b95583126fb2369d7a59f5";

$contents = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . $apiKey);


// preg_match("/\"phrase\">(.*?)<\/span>/i", $contents, $matches);

$contents = json_decode($contents, true);

$cityName = $contents["name"];
$longitude = $contents["coord"]["lon"];
$latitude = $contents["coord"]["lat"];
$description = $contents["weather"][0]["description"];
$temperature = $contents["main"]["temp"] - 273.15;
$temp_min = $contents["main"]["temp_min"] - 273.15;
$temp_max = $contents["main"]["temp_max"] - 273.15;
$humidity = $contents["main"]["humidity"];
$visibility = $contents["visibility"];



// print_r($temperature);

$result = "Location：" . $cityName . "<br>" .
    "Lan_Lat：" . $longitude . ", " . $latitude . "<br>" .
    "Weather：" . $description . "<br>" .
    "Temp：" . $temperature . " °C" . "<br>" .
    "Temp range：" . $temp_min . " °C" . " - " . $temp_max . " °C" . "<br>" .
    "Humidity：" . $humidity . " %" . "<br>" .
    "Visibility：" . $visibility . " M";



if ($cityName != "") {

    echo $result;
}
