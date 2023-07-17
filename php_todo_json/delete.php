<?php

$deleteItem = $_POST['delete-item'];

$json = file_get_contents('index.json');
$jsonArray = json_decode($json, true);

unset($jsonArray[$deleteItem]);
file_put_contents('index.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
header('location: index.php');
