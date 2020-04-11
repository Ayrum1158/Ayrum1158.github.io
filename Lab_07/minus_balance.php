<?php

header('Content-Type: application/json');

include 'db_connect.php';

try
{
    $dbh = new PDO($dsn, $username, $password, $options);
}
catch (PDOException $e)
{
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

    $cmdSQL_Select = "SELECT name, login, balance FROM client WHERE balance < '0'";

    $result = $dbh->query($cmdSQL_Select, PDO::FETCH_OBJ)->fetchAll();

    echo(json_encode($result));
