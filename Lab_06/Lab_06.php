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
    <br>
    <!-- Task 1 --> 
    Сообщения от выбранного клиента:<br>
    <select id = "login_select">
        <?php
            include "dbconnect.php";            
            $collection = $DB->users;           
            $result = $collection->find([],['projection'=>['_id'=>0,'login'=>1]]);          
            echo '<option selected = "selected">Выберите пользователя</option>';
            foreach($result as $login)
            {
                echo "<option>{$login['login']}</option>";
            }
            ?>
    </select>
    <br>
    From DB:
    <input type="button" value="Send" onclick="ClientMsgs()"><br>
    From LocalStorage:
    <input type="button" value="Send" onclick="ClientMsgsLocal()"><br><br>
    <div id="MSGS_PH"></div>      
    <br><br>

    <!-- Task 2 -->
    Общий входящий и исходящий траффик:<br>
    <input type="button" value="Send" onclick="TotalIOTraffic()"><br><br>
    <div id="IOTRAFFIC_PH"></div>
    <br><br>

    <!-- Task 3 -->
    Список клиентов с отрицательным балансом:<br>
    <input type="button" value="Send" onclick="MinusBalance()"><br><br>
    <div id="NEGBALANCE_PH"></div>
</body>
</html>
