<!DOCTYPE html>
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div id="header"><h1 class="headings" >(MH2)Cities </h1></div>
<?php
    $city_array = array('Tokyo', 'Mexico City', 'New York City', 'Mumbai', 'Seoul', 'Shanghai', 'Lagos', 'Buenos Aires', 'Cairo', 'London');
?>
<div style="margin-top: 20%; margin-left: 10px;margin-right: 10px; text-align: left">
<?php
    echo "<h3>Unsorted cities:</h3>";
    foreach($city_array as $city){
        echo $city.", ";
    }
    echo "</div> <div style='margin-left: 10px;margin-right: 10px; text-align: left'> <h3> Sorted cities: </h3>";
    sort($city_array);
    foreach($city_array as $city){
        echo $city.", ";
    }
    echo "</div>
    <div style='margin-left: 10px;margin-right: 10px; text-align: left'><h3>Unordered HTML list: </h3><ul>";
        foreach($city_array as $city){
            echo "<li>".$city."</li>";
        }
        echo "</ul>
    </div>";
    echo "
    <div style='margin-left: 10px; margin-right: 10px; text-align: left'><h3>Unordered HTML list plus: </h3><ul>";
        $city_array[] = 'Los Angeles';
        $city_array[] = 'Calcutta';
        $city_array[] = 'Osaka';
        $city_array[] = 'Beijing';
        sort($city_array);
        foreach($city_array as $city){
            echo "<li>".$city."</li>";
        }
        echo "</ul>
    </div>";

?>

</body>
</html>
