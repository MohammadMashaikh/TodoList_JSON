<?php


$todoItem = $_POST['todoItem'] ?? '';
$todoItem = trim($todoItem);

if (isset($todoItem) && !empty($todoItem)) {
    if (file_exists('index.json')) {
        $json = file_get_contents('index.json');
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }
    $jsonArray[$todoItem] = ['completed' => false];
    file_put_contents('index.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
    header('location: index.php');
} else {
    header('location: index.php');
}
