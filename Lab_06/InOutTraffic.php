<?php

include "dbconnect.php";

$collection = $DB->sessions;

echo "All traffic from users:<br><br>";

$results = $collection->find([],['projection'=>['_id'=>0, 'inTraffic'=>1, 'outTraffic'=>1]]);

$inTraffic = 0;
$outTraffic = 0;

foreach($results as $item)//fuck the "aggregate()"!
{
    $inTraffic += $item['inTraffic'];
    $outTraffic += $item['outTraffic'];
}

echo "<table border='1pt'>
<tr><th>InTraffic</th><th>OutTraffic</th></tr>
<tr><td>$inTraffic</td><td>$outTraffic</td></tr>
</table>";