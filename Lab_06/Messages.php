<?php
$login = $_GET['login'];

include "dbconnect.php";

$collection = $DB->users;

echo "Messages from user <i>$login</i>:";

$result = $collection->findOne(['login'=>"$login"],['projection'=>['_id'=>0, 'messages'=>1]]);
print_r($result);
echo "<br><br>";

$i = 1;

foreach($result['messages'] as $message)
{
    echo "$i) $message<br>";
    $i+=1;
}