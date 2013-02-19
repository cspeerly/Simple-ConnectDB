<?php

// This is Temporay
// It is used only to add a new Record
// Once I figure the array thing out in MeekroDB for adding new record
// This file will be deleted and a new new.php file will be created

session_start();

define('DB_SERVER', 'localhost:3307');
define('DB_USER', 'user');
define('DB_PASS', 'password');
define('DB_NAME', 'a1-sales');
define('DB_TABLE', 'customers');

//Functions

// Connect to Database
function dbOpen(){
	$Conn = mysql_connect(DB_SERVER, DB_USER, DB_PASS)
	or die ("Could not connect to server ... \n" . mysql_error ());
	mysql_selectDB(DB_NAME)
	or die ("Could not connect to database ... \n" . mysql_error ());
} //end function dbOpen


function DBInfo(){

global $intFieldCount;
global $field_name;
global $field_type;

	$fields = mysql_query("SHOW COLUMNS FROM " . DB_TABLE );
	while ($row = mysql_fetch_array($fields)){
	$fields2[] = array('Name' => $row[0]);
	$types2[] = array('type' => $row[1]);
	}
	while (list($keyname, $sts_data) = each($fields2)) {
	$field_name[] = $sts_data['Name'];
	}
	mysql_free_result($fields);

	while (list($keyname, $sts_data) = each($types2)) {
	$field_type[] = substr($sts_data['type'],0,4);
	}
	//$_SESSION['RealFieldTypes'] = $field_type;
	$intFieldCount = count($field_name);
//lets change Field_Types from names to a numbers
for ($i = 0; $i <= $intFieldCount-1; $i++){
$field_type[$i] = str_replace('(', '', $field_type[$i]);

if ($field_type[$i] == 'int') $field_type[$i] = 3;
if ($field_type[$i] == 'varc') $field_type[$i] = 202;
if ($field_type[$i] == 'char') $field_type[$i] = 202;
if ($field_type[$i] == 'text') $field_type[$i] = 202;
if ($field_type[$i] == 'long') $field_type[$i] = 203;
if ($field_type[$i] == 'blob') $field_type[$i] = 203;
if ($field_type[$i] == 'date') $field_type[$i] = 7;
if ($field_type[$i] == 'time') $field_type[$i] = 7;
if ($field_type[$i] == 'tiny') $field_type[$i] = 11;
if ($field_type[$i] == 'bit') $field_type[$i] = 11;
}
	//put into sessions to return
	$_SESSION['db_FieldCount'] = $intFieldCount;
	$_SESSION['db_FieldNames'] = $field_name;
	$_SESSION['db_FieldTypes'] = $field_type;
}


// Returns the proper RFC 822 formatted date.
if(empty($_SESSION['dbTimeZone']))$TimeZone = 'America/Chicago';
if(!empty($_SESSION['dbTimeZone']))$TimeZone = $_SESSION['dbTimeZone'];

$date = RFCDate(date_default_timezone_set($TimeZone) );

function RFCDate() {
$tz = date('Z');
$tzs = ($tz < 0) ? '-' : '+';
$tz = abs($tz);
$tz = (int)($tz/3600)*100 + ($tz%3600)/60;
$date = sprintf(date('Y-m-d'), $tzs, $tz);
return $date;
} // end Returns the proper RFC 822

$_SESSION['date'] = $date;

?>
