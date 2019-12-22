<?php

$count = @file_get_contents("counter.txt");

if(!$count)
$count = 1;

file_put_contents("counter.txt", $count+1);

echo "<br>Эта страница была посещена $count раз<br>";

?>