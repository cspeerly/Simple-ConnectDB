<?php

require_once 'includes/db_Config.php';
require_once 'includes/db_Language.php';
require_once 'includes/db_Connection.php';
$db_Page = "db_List";
require_once 'includes/db_Functions.php';

$pk = $_POST['pk'];
$name = $_POST['name'];

// lets serialize if FieldType = checkliat
for ($i=0; $i<=$intFieldCount-1; $i++ ) {
	if(!empty($FieldType[$i]) && $FieldType[$i] == 'checklist' || !empty($FieldType[$i]) && $FieldType[$i] == 'select'){
		$value = serialize($_POST['value']);
	}
	else
	{
		if (!empty($_POST['value']))$value = $_POST['value'];
		if (empty($_POST['value']))$value = '';
	}
}

//DB::debugMode();
DB::update($db_Table, array(
  $name => $value
  ), "Cust_id=%i", $pk);
 ?>