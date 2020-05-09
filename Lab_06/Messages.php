<?php
header('Content-Type: application/json');

$login = $_GET['login'];

include "dbconnect.php";

$collection = $DB->users;

$result = $collection->findOne(['login'=>"$login"],['projection'=>['_id'=>0, 'messages'=>1]]);

echo json_encode($result['messages']);