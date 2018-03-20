<?php

require_once('Core/Db.php');

$response = true;

//Get values of plants from GET request
$plant[0] = $_GET['plant0'];
$plant[1] = $_GET['plant1'];
$plant[2] = $_GET['plant2'];
$plant[3] = $_GET['plant3'];

//validate inputs (0-100)
foreach ($plant as $p){
    if ($p > 100 || $p < 0){
        $response = false;
    }
}



//save data to database
$db = new Db();

$sql = "INSERT INTO plant_data (plant, moisture, temperature, light) VALUES (?,?,?,?), (?,?,?,?), (?,?,?,?), (?,?,?,?)";
$rows = $db->insert($sql, ['1', $plant[0], '0','0','2', $plant[1], '0','0','3', $plant[2], '0','0','4', $plant[3], '0','0']);

var_dump($rows, $response);
?>