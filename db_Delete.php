<!DOCTYPE html>
<html lang="en">
<head>
	<title>Simple-ConnectDB</title><?php
// get id of record from db_List.php
$key = $_GET['id'];
require_once 'includes/db_Config.php';
require_once 'includes/db_Language.php';
require_once 'includes/db_Connection.php';
$db_Page = 'db_Delete';
require_once 'includes/db_Functions.php';
if (empty($dbCanDelete))$dbCanDelete = 0;
if($dbCanDelete == 1){


// lets get the Record ID Field
$names = DB::columnList($db_Table);

echo "Key = " , $key , "<br>";

echo "ID = " , $names[0] , "<br>";


//DB::debugMode();
// delete the Record
DB::delete($db_Table, $names[0]."=%i", $key);
header("Location: index.php");
}
else
{
header("Location: noRights.php");
}

?>
