<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="ajax.js"></script>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <!-- 1 -->
        <label>Статистика работы в сети клиента (по имени клиента):</label>
        <br>
        <select name = "username" id="username">
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
        <input class="input" type="button" value="Submit" onclick="getClientStats()">
    <br>

    <div id="placeholder-clientStats"></div>
    
    <!-- 2 -->
        <label>Статистика работы сети за указанный промужуток времени:</label>
        <br>
         С <input type="datetime-local" name="startTime" id="startTime">
        <br>
        По <input type="datetime-local" name="endTime" id="endTime">
        <br>
        <input class="input" type="button" value="Submit" onclick="getNetworkStats()">
    
    <br>

    <div id="placeholder-networkStats"></div>

    <!-- 3 -->
        <label>Список клиентов с отрицательным балансом:</label>
        <br>
        <input class="input" type="button" value="Submit" onclick="getMinusBalance()">
    
    <br>
    <div id="placeholder-minusBalance"></div>
</body>
