<?php
// *** db_Functions.php ***

// THis is the The Main Page SQL Only. see post.php, etc for other individual page routines
// Using meekrodb for connecting to mySQL server for better security.
// You can specify string, integer, and decimal parameters
// by using %s, %i, and %d placeholders in the query,
// and attaching the parameters as shown below.
// The library will run all needed safety checks,
// such as escaping strings and making sure integers are really integers
if (empty($db_Where))$db_Where = '';

if ($db_Page == 'db_List'){
	if ($db_Where){
		$arrWhere = explode(',',$db_Where);
		$where = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
		$where->add($arrWhere[0], $arrWhere[1]);
		//$results = DB::query("SELECT * FROM $db_Table WHERE %l ", $where->text());
		$results = DB::query("SELECT * FROM $db_Table WHERE $arrWhere[0]", $arrWhere[1]);
	}
	else
	{
		if (!empty($db_OrderBy)){
			$results = DB::query("SELECT * FROM $db_Table ORDER BY $db_OrderBy");
		}
		else
		{
			$results = DB::query("SELECT * FROM $db_Table");
		}
	}
}



// SETTING DEFAULTS IF NOT SET IN CONFIG
//Lets get the FieldNames, FieldCount and RcordCount
$arrFieldNames = DB::columnList($db_Table);
$intFieldCount = count($arrFieldNames);
$intRecordCount = DB::count();

// The Real_Field Names from the db
// Used for Readinf Writting To and From the db
$Field_Names = $arrFieldNames;


//Defined FIELD NAMES from Config
// Used for display onlu
if (!empty($strFieldNames)){
	$FieldNames = explode(',',$strFieldNames);
}
else
{
	$FieldNames = $Field_Names;
}

if (empty($db_ImageFieldName))$db_ImageFieldName=null;





// COLUMN SORT if empty then default is column 1 asc
if (empty($db_ColumnSort)){
	$db_ColumnSort = "0,0";
}


// default to blue theme in not set in config
if (empty($appTheme))$appTheme = 'blue';

if ($appTheme == 'blue')$cssTheme = '#99bfe6';
if ($appTheme == 'green')$cssTheme = '#99e6a6';
if ($appTheme == 'bootstrap')$cssTheme = '#D4D4D4';
if ($appTheme == 'black-ice')$cssTheme = '#232323';
if ($appTheme == 'dark')$cssTheme = '#232323';
if ($appTheme == 'default')$cssTheme = '#eeeeee';
if ($appTheme == 'grey')$cssTheme = '#3c3c3c';
if ($appTheme == 'dropbox')$cssTheme = '#B8ECFF';
if ($appTheme == 'ice')$cssTheme = '#f6f8f9';
if ($appTheme == 'jui')$cssTheme = '#f6f8f9';



?>