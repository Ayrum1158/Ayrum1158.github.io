<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="client_stats.php" method="POST"> <!-- 1 -->
        <label>Статистика работы в сети клиента (по имени клиента):</label>
        <br>
        <select name = "username">
        <?php
            include 'db_connect.php';
            $cmdSQL_Select = "SELECT name FROM client";
            $sth = $dbh->prepare($cmdSQL_Select);#preparation not really needed
            $sth->execute();
            
            $result = $sth->fetchAll(PDO::FETCH_NUM);

            echo '<option selected = "selected">Выберите пользователя</option>';

            foreach($result as $name)
            {
                echo "<option>$name[0]</option>";
            }
        ?>
        </select>
        <input type="submit">
    </form>
    <br>
    <form action="network_stats.php" method="POST"><!-- 2 -->
        <label>Статистика работы сети за указанный промужуток времени:</label>
        <br>
        С <input type="datetime-local" name = "startTime">
        <br>
        По <input type="datetime-local" name = "endTime">
        <br>
        <input type="submit">
    </form>
    <br>
    <form action="minus_balance.php" method="POST"><!-- 3 -->
        <label>Список клиентов с отрицательным балансом:</label>
        <br>
        <input type="submit">
    </form>
</body>
