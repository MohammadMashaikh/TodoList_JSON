<?php
$todoName = $_POST['todo_name'];

$json = file_get_contents('index.json');
$jsonArray = json_decode($json, true);

$jsonArray[$todoName]['completed'] = !$jsonArray[$todoName]['completed'];
file_put_contents('index.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
header('location: index.php');
