<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <form method="get" action="Messages.php"><!-- Task 1 --> 
        Сообщения от выбранного клиента:<br>
        <select name = "login">
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
        <input type="submit">
        <br>
    </form>

    <br><br><br>
    
    <form method="get" action="InOutTraffic.php"><!-- Task 2 -->
        Общий входящий и исходящий траффик:<br>
        <input type="submit">
    </form>
    <br><br><br>
</body>
</html>