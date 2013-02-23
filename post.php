<?php

require_once 'includes/db_Config.php';
require_once 'includes/db_Language.php';
require_once 'includes/db_Connection.php';
$db_Page = "db_List";
require_once 'includes/db_Functions.php';

$FieldType = explode(',',$strFieldType);

$pk = $_POST['pk'];
$name = $_POST['name'];


		if (!empty($_POST['value']))$value = $_POST['value'];
		if (empty($_POST['value']))$value = null;


//DB::debugMode();
DB::update($db_Table, array(
  $name => $value
  ), "Cust_id=%i", $pk);
 ?>