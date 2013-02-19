<?php
require_once 'includes/db_Config.php';
$FieldType = explode(',',$strFieldType);
// This code needs to be converted to MeekroDB
include('MySQLConnect.php');

dbOpen();
dbInfo();
$Fields = '';
$Values = '';

$intFieldCount = $_SESSION['db_FieldCount'];
$field_name = $_SESSION['db_FieldNames'];
$field_type = $_SESSION['db_FieldTypes'];

for ($i=0; $i<=$intFieldCount-1; $i++) {
	if (!empty($_POST[$field_name[$i]])){
		$Insert[$i] = $_POST[$field_name[$i]];

    }
	else
	{
	   if ($field_type[$i] == 7){
	   		$Insert[$i] = $_SESSION['date'] ;
	    }
	 else
	    {
			$Insert[$i] = '';
		}
	}

// check if field type is checkkist and see if it needs to be unserialized
if(!empty($FieldType[$i]) && $FieldType[$i] == 'checklist' || !empty($FieldType[$i]) && $FieldType[$i] == 'select2'){
		$Insert[$i] = serialize($Insert[$i]);
}

if (!empty($Insert[$i])){
	$Fields .= $field_name[$i] . ",";
	$Values .= "'". mysql_escape_string($Insert[$i])."',";
}

}

$Fields = substr($Fields,0,strlen($Fields)-1);
$Values = substr($Values,0,strlen($Values)-1);

echo "Fields = " . $Fields . "<br>";
echo "Values  = " . $Values  . "<br>";


$sql = "insert into customers ($Fields) values($Values)";
echo "sql  = " . $sql  . "<br>";

$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
	echo json_encode(array('msg'=>$sql));
} else {
	echo json_encode(array('msg'=>$sql.' Some errors occured.'));
}


?>