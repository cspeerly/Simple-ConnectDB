<title>Info w/MeekroDB</title>

<style type="text/css">
.details {
	font-weight: bold;
	text-decoration: underline;
}
.table {
border:solid 1px #336699;
}
</style>


<?php
require_once 'includes/MeekroDB/meekrodb.2.1.class.php';
DB::debugMode();

DB::$user = 'root';
DB::$password = 'muffin';
DB::$dbName = 'a1-sales';
$dbTable = 'customers';
DB::$port = '3307';



$mysqli_result = DB::queryRaw("SELECT * FROM " . $dbTable);
$row = $mysqli_result->fetch_assoc();

$field_cnt = count($row );


echo "FieldCount = " . $field_cnt . "<br>";

$columns = DB::columnList('customers');
echo "COPY THIS STRING FOR THE FIELD NAMES: ";
foreach ($columns as $column) {
  echo "$column\n,";
}

echo "<br>";


    /* Get field information for all columns */
$finfo = $mysqli_result->fetch_fields();

echo "1) length is the Max-length allowed in that field"."<br>";
echo "2) Max-length is the longest string in that field"."<br>";
echo "3) Type is the mySQLi Field Tyoe"."<br>";
echo "<table class='table'>";
echo "<tr class='details'>";
echo "<td>#</td><td>NAME</td><td>length</td><td>Max-length</td><td>Type</td>";
echo "</tr>";
$a=1;
    foreach ($finfo as $val) {
    echo "<tr>";
    	echo"<td>". $a . "</td>";
        echo"<td>". $val->name . "</td>";
        echo"<td>". $val->length . "</td>";
        echo"<td>". $val->max_length . "</td>";
        echo"<td>". $val->type . "</td>";
    echo "</tr>";
    $a++;
    }
echo "</table>";



/* close connection */
$mysqli_result->close();
?>

