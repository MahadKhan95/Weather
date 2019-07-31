
<!DOCTYPE html>
<html>
    <head>

    <title>
        Weather App
    </title>    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
     .topnav {
  overflow: hidden;
  background-color:blueviolet;
}  
h1, h3, h4{
  color: white;
} 
#sd{
    padding: 10px;
}
.column {
  float: left;
  width: 50%;
  padding: 10px;
}
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }}
    </style>

<script>
  <?php

if(isset($_GET)){

$user_city=$_GET['City'];
$user_country=$_GET['Country'];

$urlxv = "api.openweathermap.org/data/2.5/weather?q=".$user_city.",".$user_country."&APPID=0f888bfead863468b8ed635abda76a02";
function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
    }
$con_Data = file_get_contents_curl($urlxv);    
$Display_data = json_decode($con_Data,TRUE);

$temp = $Display_data['main']['temp'];
$humid = $Display_data['main']['humidity'];
$wind = $Display_data['wind']['speed'];
$wind_dir = $Display_data['wind']['deg'];
$condition = $Display_data['weather'][0]['main'];

};
?>
</script>

    </head>

    <body style="background-image:url(weath.jpg) ">
        <div class="container">
            <div class="header" id="sd">
                <h1>Online Weather App</h1>
                <h3>Fill the form below, choose the type of data and get your weather forecast</h3>
            </div>
        
        <br><br> 
        <div class="row">
        <div class="topnav"></div>
        
            <div class="column">

            <form id='CC' action='weather.php' method='GET'>
            <h4>City Name: &nbsp; <input type='text'  name='City' placeholder='City'></h4>
            <br><br>
            <h4>Country: &nbsp; &nbsp;<input type='text'  name='Country' placeholder='Country'></h4>
            <br><br>
            <input type='submit' class='btn btn-primary' id='res' value='Get Weather'>
            </form>
        </div> 
        </div>
        <br><br><br>
        <h4>Temperature: <?php echo $temp-273.15 ?> Deg Celsius </h4>
        <h4>Humidity: <?php echo $humid ?> % </h4>
        <h4>Wind: <?php echo $wind ?> m/s </h4>
        <h4>Wind Direction: <?php echo $wind_dir ?> degrees </h4>
        <h4>Condition: <?php echo $condition ?> </h4>
        </div>

    </body>
</html>



