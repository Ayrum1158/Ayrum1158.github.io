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

    $cmdSQL_Select = "SELECT sum(in_traffic), sum(out_traffic) FROM seanse WHERE start >= :startTime AND stop <= :endTime";

    $sth = $dbh->prepare($cmdSQL_Select);

    $sth->execute(array(':startTime' => $_POST['startTime'], ':endTime' => $_POST['endTime']));

    $result = $sth->fetchAll(PDO::FETCH_NUM);


    echo "<table border = '1px'><tr><th>All in traffic</th><th>All out traffic</th></tr>";
    foreach($result as $row)
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
    }
    echo "</table>";
?>
