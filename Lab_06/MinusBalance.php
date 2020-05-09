<?php
include "dbconnect.php";

$collection = $DB->users;

echo "All users with negative balance:<br><br>";

$range = array('balance' => array('$lt' => 0));
$results = $collection->find($range, ['projection'=>['_id'=>0, 'login'=>1,'balance'=>1]])->toArray();
?>

<table>
    <tr>
        <th>Login</th>
        <th>Balance</th>
    </tr>
    <?php foreach($results as $result): ?>
        <tr>
            <td><?= $result['login'] ?></td>
            <td><?= $result['balance'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
