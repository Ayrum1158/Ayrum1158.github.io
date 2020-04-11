<?php
include 'db_connect.php';

//статистика работы клиента это: общее время проведенное в сети, а также входящий и выходящий трафик

$cmdSQL_Select =
"SELECT name, sum(in_traffic), sum(out_traffic),
    SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(stop,start)))) AS Time
        FROM client JOIN seanse ON client.ID_Client = FID_Client
            WHERE client.Name = :username";

$sth = $dbh->prepare($cmdSQL_Select);

$sth->execute(array(':username' => $_REQUEST['username']));

$result = $sth->fetch(PDO::FETCH_NUM);

echo "<table><tr><th>Username</th><th>In traffic</th><th>Out traffic</th><th>Summary session time</th></tr><tr>";
foreach($result as $oneOFResults)
{
    echo "<td>$oneOFResults</td>";
}
echo "</tr></table><br>";
$dbh=null;
