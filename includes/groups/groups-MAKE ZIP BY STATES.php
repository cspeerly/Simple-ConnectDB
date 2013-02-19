<?php

sleep(1);

require_once '../MeekroDB/meekrodb.2.1.class.php';

DB::$user = 'user';
DB::$password = 'password';
DB::$dbName = 'zipcodes';
$dbTable = 'zips';
DB::$port = '3307';

$db_Name = 'zipcodes';
$db_Table = 'zips';

$results = DB::query("SELECT * FROM zips WHERE state='TN'");

$count = count($results);
//echo "Count = " . $count . "<br>";

foreach ($results as $row) {

$city[] = $row['city'];
$state[] = $row['state'];
$zip[] = $row['zip'];

}

for ($i=0; $i<=$count-1; $i++ ) {
echo "array('value' => " . $zip[$i] . ", 'text' => " .  $city[$i] . " " . $state[$i] . " " . $zip[$i] . ")," . "<br>";
}







