<?php
    $db_driver="mysql";
    $host="localhost";
    $database="itech_lb1";
    $dsn = "$db_driver:host=$host;dbname=$database";

    $username="root";
    $password="";
    $options = array(PDO::ATTR_PERSISTENT => true, PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    try
    {
        $dbh = new PDO($dsn, $username, $password, $options);
    }
    catch (PDOException $e)
    {
        echo "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

//статистика работы клиента это: общее время проведенное в сети, а также входящий и выходящий трафик

    $cmdSQL_Select =
    "SELECT name, sum(in_traffic), sum(out_traffic),
     SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(stop,start)))) AS Time
    FROM client JOIN seanse ON client.ID_Client = FID_Client
        WHERE client.Name = :username";

    $sth = $dbh->prepare($cmdSQL_Select);

    $sth->execute(array(':username' => $_POST['username']));

    $result = $sth->fetch(PDO::FETCH_NUM);

    echo "<table border = '1px'<tr><th>Username</th><th>In traffic</th><th>Out traffic</th><th>Summary session time</th></tr><tr>";
    foreach($result as $oneOFResults)
    {
        echo "<td>$oneOFResults</td>";
    }
    echo "</tr></table>";
    $dbh=null;
?>
