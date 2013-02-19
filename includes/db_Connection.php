<?php

// Using meekrodb for connection and better security
require_once 'includes/MeekroDB/meekrodb.2.1.class.php';

if ($db_port == '')$db_port = '3306';

DB::$user = $db_user;
DB::$password = $db_password;
DB::$dbName = $db_Name;
$dbTable = $db_Table;
DB::$port = $db_port;

// the sql for indfex.php is in dbFunctions.php

?>