<!DOCTYPE html>
<html lang="en">
<head>
	<title>Simple-ConnectDB</title>
	<!-- Add jQuery library -->
<script type='text/javascript' src='includes/assets/jquery/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='includes/assets/jquery/jquery-migrate-1.1.1.js'></script><?php
// get id of record from db_List.php
$key = $_GET['id'];

require_once 'includes/db_Config.php';
require_once 'includes/db_Language.php';
require_once 'includes/db_Connection.php';
$db_Page = 'db_View';
require_once 'includes/db_Functions.php';
if (empty($dbCanView))$dbCanView = 1;
if($dbCanView == 1){

if (empty($strDisplayView)){
$strDisplayView = '';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
       $strDisplayView .= '1';
    }
}

if (empty($strFieldType)){
	$strFieldType ='';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
		$strFieldType .= 'text,';
	}
}
?>

<link rel="stylesheet" type="text/css" href="includes/css/db_Style.css">
	<style type="text/css">
		.main-view {
			border: <?php echo $cssTheme ?> 0px solid;
			padding: 5px 5px 5px 5px ;
			margin: 5px 5px 5px 5px ;
			border-radius: .5em;
			-moz-border-radius: .5em;
			-webkit-border-radius: .5em;
			background: <?php echo $cssTheme ?>;
			min-width:400px;
		}

		.contents-view {
			border: <?php echo $cssTheme ?> 0px solid;
			padding: 5px 5px 5px 5px ;
			margin: 5px 5px 5px 5px ;
			border-radius: .5em;
			-moz-border-radius: .5em;
			-webkit-border-radius: .5em;
			background: #eeeeee;
			min-width:400px;
		}


		.fieldname{
			border: <?php echo $cssTheme ?> 1px solid;
		    background: #eee;
		    width:25%;
		    text-align: right;
			padding: 0px 5px 0px 5px ;
			font: bold 13px/20px Arial, Sans-serif;
	      }
        .fieldvalue{
		    background: #fff;
		     width:50%;
		     font: .8em Arial, Sans-serif;
        }
	</style>

<?php

$record = DB::queryFirstRow("SELECT * FROM $db_Table WHERE $arrFieldNames[0]=%i", $key);

$FieldType = explode(',',$strFieldType);
if(empty($appTitle))$appTitle = $db_Table;
echo "<body>";
echo "<div  class='main-view'>";
echo "<div  class='contents-view'>";
echo "<div  class='title'>";
echo "<h3>" . $txtViewing . " " . $appTitle. "</h3>";
echo "</div>";
echo "</div>";

echo "<div  class='contents-view'>";
echo "<table width='500pk'>";

	for ($i=0; $i<=$intFieldCount-1; $i++ ) {

			if (substr($strDisplayView,$i,1) == 1){



				if(!empty($FieldType[$i]) && $FieldType[$i] == 'checklist'){
					$data = @unserialize($record[$arrFieldNames[$i]]);
					if($data !== false || $record[$arrFieldNames[$i]] === 'b:0;'){
						//echo $x . " ok" . "<br>";
						$record[$arrFieldNames[$i]] = json_encode(unserialize($record[$arrFieldNames[$i]]));
						$remove = array('[', ']', '"');
						$record[$arrFieldNames[$i]] = str_replace($remove, "", $record[$arrFieldNames[$i]]);
					}
				}


				// lets show as ***** if it is a password field
					if(!empty($FieldType[$i]) && $FieldType[$i] == 'password'){
						$record[$arrFieldNames[$i]] = '*****';

					}

					if ($arrFieldNames[$i] == $db_ImageFieldName){
						if ($record[$arrFieldNames[$i]] == '')$record[$arrFieldNames[$i]] = 'includes/images/Pic-NA.png';
						$record[$arrFieldNames[$i]]='<img class="displayed" src="'.$record[$arrFieldNames[$i]].'" width="50">';
					}









					echo "<tr><td class='fieldname'>". $arrFieldNames[$i] . ":</td><td class='fieldvalue'>" . $record[$arrFieldNames[$i]] . "</td></tr>";

			}
	}

echo "</table>";
echo "</div>";
echo "</div>";
echo "</body>";
}
else
{
header("Location: noRights.php");
}


?>

