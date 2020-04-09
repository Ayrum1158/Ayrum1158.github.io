<?php
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

    $resultPDO_Statement = $dbh->query($cmdSQL_Select, PDO::FETCH_NUM);

    echo "<table border = '1px'><tr><th>Name</th><th>Login</th><th>Balance</th></tr>";
    foreach($resultPDO_Statement as $row)
    {
        echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
    }
    echo "</table>";
