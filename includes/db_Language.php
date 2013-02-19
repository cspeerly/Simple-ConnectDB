<?php

// db_Language.php
// with button images
$txtView = "view";
$txtEdit = "edit";
$txtDelete = "delete";
$texPage = "Page";
$txtRecord = "Record";
$txtAddNew = "Add New";
$txtViewing = "Viewing";
$txtEditView = "View/Edit";
$txtEnableButton = "enable/disable Edit";
$txtDoc = "Documation";  // for Demo only

$Selectpagenumber = "Select page number";
$Selectpagesize = "Select page size";
// load the button images if set in config
if (empty($dbButtons))$dbButtons = 0;
if ($dbButtons == 1){
// for button images
$txtView    	= "<img src='includes/images/Vieweye.png'border='0' height='12' title='View'";
$txtEdit 		= "<img src='includes/images/edit.png' border='0' height='12' title='Edit'";
$txtDelete 		= "<img src='includes/images/Delete.png' border='0' height='12' title='Delete'";



}

?>




