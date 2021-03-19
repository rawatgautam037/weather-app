<?php

$city_name = 'New Delhi';
$api_key = '44f45de657fcc05ce97b7e1d1990f875';

$api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;

$weather_data = json_decode(file_get_contents($api_url), true);

$location = $weather_data['name'];

$temperature = $weather_data['main']['temp'];

$description = $weather_data['weather'][0]['description'];

$humidity = $weather_data['main']['humidity'];

$pressure = $weather_data['main']['pressure'];

$wind_speed = $weather_data['wind']['speed'];

$con = mysqli_connect('localhost', 'root', '', 'weather_database');


if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$str="insert into weather set location='$location',temperature='$temperature',description='$description',humidity='$humidity',pressure='$pressure', wind_speed='$wind_speed'";

if((mysqli_query($con,$str))) 
	echo "<center><h3><script>alert('Congrats.. Data saved successfully !!');</script></h3></center>";

else {
	echo "Error:" .$sql . "<br>" . $con->error;
}

$con->close();
?>