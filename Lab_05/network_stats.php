<?php
include 'db_connect.php';

$cmdSQL_Select = "SELECT sum(in_traffic), sum(out_traffic) FROM seanse WHERE start >= :startTime AND stop <= :endTime";

$sth = $dbh->prepare($cmdSQL_Select);
$sth->execute(array(':startTime' => $_POST['startTime'], ':endTime' => $_POST['endTime']));

$result = $sth->fetch(PDO::FETCH_NUM);

echo "<table border = '1px'><tr><th>All in traffic</th><th>All out traffic</th></tr>";
echo "<tr><td>$result[0]</td><td>$result[1]</td></tr></table>";
$dbh = null;
