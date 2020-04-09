<?php
header("Content-Type: text/xml");

include 'db_connect.php';

$cmdSQL_Select = "SELECT sum(in_traffic), sum(out_traffic) FROM seanse WHERE start >= :startTime AND stop <= :endTime";

$sth = $dbh->prepare($cmdSQL_Select);
$sth->execute(array(':startTime' => $_REQUEST['startTime'], ':endTime' => $_REQUEST['endTime']));

$result = $sth->fetch(PDO::FETCH_NUM);

$dbh = null;
?>

<stats>
    <inTraffic><?=$result[0]?></inTraffic>
    <outTraffic><?=$result[1]?></outTraffic>
</stats>