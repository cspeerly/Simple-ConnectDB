<!DOCTYPE html>
<html lang="en">
<head>
	<title>Simple-ConnectDB</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

require_once 'includes/db_Config.php';
require_once 'includes/db_Language.php';
require_once 'includes/db_Connection.php';
$db_Page = "db_List";
require_once 'includes/db_Functions.php';
?>

<link rel="stylesheet" type="text/css" href="assets/tablesorter-master/css/theme.<?php echo $appTheme ?>.css">
<link rel="stylesheet" type="text/css" href="assets/css/db_Style.css">

<!-- jquery -->
<script type='text/javascript' src='assets/jquery/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='assets/jquery/jquery-migrate-1.1.1.min.js'></script>

<!-- fancyBox -->
	<link rel="stylesheet" type="text/css" href="assets/fancybox/source/jquery.fancybox.css?v=2.1.4" media="screen" />
	<script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.js?v=2.1.4"></script>

<!-- momentjs -->
<script src="assets/momentjs/moment.min.js"></script>

<!-- bootstrap -->
 	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<script src="assets/bootstrap/js/bootstrap.js"></script>

<!-- bootstrap modal-->
	<link href="assets/model/css/bootstrap-modal.css" rel="stylesheet">
	<script src="assets/model/js/bootstrap-modalmanager.js"></script>
	<script src="assets/model/js/bootstrap-modal.js"></script>

<!-- x-editable (bootstrap) -->
	<link href="assets/x-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
	<script src="assets/x-editable/bootstrap-editable/js/bootstrap-editable.js"></script>

<!-- css bootstrap pager-->
	<link rel="stylesheet" type="text/css" href="assets/tablesorter-master/addons/pager/jquery.tablesorter.pager.css">

<!-- select2 -->
	<link href="assets/select2/select2.css" rel="stylesheet">
	<script src="assets/select2/select2.js"></script>

<!-- wysihtml5 -->
	<link href="assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
<link href="assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/wysiwyg-color.css" rel="stylesheet">
	<script src="assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/wysihtml5-0.3.0.min.js"></script>
	<script src="assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.min.js"></script>
	<script src="assets/x-editable/inputs-ext/wysihtml5//wysihtml5.js"></script>

<!-- TableSorter -->
	<script type='text/javascript' src="assets/tablesorter-master/js/jquery.tablesorter.js"></script>
	<script type='text/javascript' src="assets/tablesorter-master/js/jquery.tablesorter.widgets.js"></script>
	<script type='text/javascript' src="assets/tablesorter-master/addons/pager/jquery.tablesorter.pager.js"></script>

</head>

<script type="text/javascript">
	$(document).ready(function () {

		$("#fancybox").fancybox({
			helpers: {
				title : {
					type : 'outside'
				},
				overlay : {
					speedOut : 0
				}
			}
		});

		$("#fancybox-view").fancybox({
					type : 'iframe',
					padding : 10,
					scrolling : 'no',
					minHeight: '530',
					width : 565,
					closeClick : false
		});

		$("#fancybox-add")
			.fancybox({
				type : 'iframe',
				padding : 10,
				scrolling : 'no',
				autoSize :  true,
				Height: '600',
				closeClick : false,
				closeBtn : false,
				afterClose : function() {
					location.reload();
					return;
				}
		});
	});
</script>

<style type="text/css">
.tablesorter-filter.disabled {
    display: none;
}
.main {
	float:left;
	border: <?php echo $cssTheme ?> 0px solid;
	padding: 5px 3px 5px 3px ;
	margin: 5px 3px 1px 10px ;
	border-radius: .5em;
	-moz-border-radius: .5em;
	-webkit-border-radius: .5em;
	background: <?php echo $cssTheme ?>;
	min-width:400px;
}
.contents{
	border: <?php echo $cssTheme ?> 0px solid;
	padding: 5px 5px 5px 5px ;
	margin: 2px 3px 5px 3px ;
	border-radius: .5em;
	-moz-border-radius: .5em;
	-webkit-border-radius: .5em;
	background: #cdcdcd;
	min-width:400px;
}
.title {
	border: #cdcdcd 6px solid;
	padding: 5px -15px 5px 5px ;
	margin: 5px 10px 5px 10px ;
	border-radius: .4em;
	-moz-border-radius: .4em;
	-webkit-border-radius: .4em;
	background: #fff;
	font-size: 1.5em;
	text-align: center;
	vertical-align: middle;
}

.pager {
        height: 5px;
        line-height: 1em;
    }

</style>
<body>
<?php

// *** Set some defaults if not set in Config ***
// if $strDisplayList NOT SET IN CONFIG all records will show
if (empty($strDisplayList)){
$strDisplayList = '';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
       $strDisplayList .= '1';
    }
}

if (empty($strDisplayInlineEdit)){
$strDisplayInlineEdit = '';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
       $strDisplayInlineEdit .= '0';
    }
}

if (empty($strDisplayViewEdit)){
	$strDisplayViewEdit ='';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
		$strDisplayViewEdit .= '1';
	}
}

if (empty($strSortable)){
$strSortable = '';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
       $strSortable .= '1';
    }
}

if (empty($strResizable)){
$strResizable = '';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
       $strResizable .= '0';
    }
}

if (empty($strRequired)){
$strRequired = '';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
       $strRequired .= '0';
    }
}

if (empty($db_PageSize))$db_PageSize = '';
if (empty($db_Pager))$db_Pager = 1;
if (empty($dbCanView))$dbCanView = 1;
if (empty($dbCanEdit))$dbCanEdit = 0;
if (empty($dbCanAdd))$dbCanAdd = 0;
if (empty($dbCanDelete))$dbCanDelete = 0;
if (empty($db_WidgetOptions))$db_WidgetOptions = '';
if (empty($ImageFieldName))$ImageFieldName = '';

if (empty($strFilter)){
$strFilter = '';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
       $strFilter .= '0';
    }
}

if (!empty($db_WidgetOptions )){
	if (empty($strFilter)){
		$db_WidgetOptions = str_replace("'filter',","", $db_WidgetOptions);
	}
}

if (empty($strFilterSelect)){
$strFilterSelect = '';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
       $strFilterSelect .= '0';
    }
}

// Builds the Filter Wigth if $strFilter exist
if(!empty($strFilter)){
$strFilterWidth='';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
		if (substr($strDisplayList,$i,1) == 1 || substr($strDisplayList,$i,1) == 2 || substr($strDisplayList,$i,1) == 4){
			if (substr($strFilter,$i,1) == 1){
				if (substr($strFilterSelect,$i,1) == 1){
					$strFilterWidth .= "'60%',";
				}
				else
				{
					$strFilterWidth .= "60,";
				}
			}
			else
			{
			$strFilterWidth .= ',';
			}
		}
	}
}

if (empty($strFieldType)){
	$strFieldType ='';
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
		$strFieldType .= 'text,';
	}
}
$FieldType = explode(',',$strFieldType);
// Set Pager Select options
$SelectCount='';
if (empty($db_PageSize)){
	$db_PageSize = 10;
}
if (!empty($db_PageSelector)){
	$arrPageSelect = explode(',',$db_PageSelector);
}
else
{
	$db_PageSelector = "10,20,30,40,50,100,ALL";;
}
$arrPageSelect = explode(',',$db_PageSelector);
$SelectCount = count($arrPageSelect);
if(empty($db_StartPage))$db_StartPage = 0;

if(empty($appTitle))$appTitle = $db_Table;
?>
<div  class="main">
	<div  class="title">
	<?php echo $appTitle ?>
	</div> <!-- END div Title -->
<?php
if ($db_Pager == 1){
?>
<div  id="pager" class="pager">
	<form>
		<img src="assets/tablesorter-master/addons/pager/icons/first.png" class="first"/>
		<img src="assets/tablesorter-master/addons/pager/icons/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="assets/tablesorter-master/addons/pager/icons/next.png" class="next"/>
		<img src="assets/tablesorter-master/addons/pager/icons/last.png" class="last"/>
		<select class="pagesize">
		<?php
		for ($i=0; $i<=$SelectCount-1; $i++ ) {
			 $UseValue = $arrPageSelect[$i];
			 $ShowValue = $arrPageSelect[$i];
			 if ($ShowValue == 'ALL')$UseValue = '2000';
			 echo '<option value="'. $UseValue .'">'. $ShowValue .'</option>';
		}
		?>
		</select>
		Page: <select class="gotoPage"></select>
		<?php
		if ($dbCanAdd == 1)  echo "<a id='fancybox-add' class='btn btn-mini' type='button' href='db_Add.php'> ".$txtAddNew."</a>";
		?>
	</form>
</div>
<?php
} // end if Pager on Top
?>
<div class="contents">
	<table id="user" class="tablesorter">
	<THEAD>
	<tr>
	<?php
	for ($i=0; $i<=$intFieldCount-1; $i++ ) {
		if (substr($strDisplayList,$i,1) == 1 || substr($strDisplayList,$i,1) == 2 || substr($strDisplayList,$i,1) == 4){

		?>
			<th><?php echo $FieldNames[$i] ?></th>
		<?php
		}
	}
	// colspan is not used yet, but  will be in the next version
	// I just left it here
	$colspan = 0;
	if ($dbCanView == 1)$colspan++;
	if ($dbCanEdit == 1)$colspan++;
	if ($dbCanDelete == 1)$colspan++;
	//calculate # of Columns
		for ($i=0; $i<=$intFieldCount-1; $i++ ) {
			if (substr($strDisplayList,$i,1) == 1 || substr($strDisplayList,$i,1) == 2  || substr($strDisplayList,$i,1) == 4){
			$colspan++;
			}
		}
	if ($dbCanView == 1)echo "<th></th>";
	if ($dbCanEdit == 1)echo "<th></th>";
	if ($dbCanDelete == 1)echo "<th></th>";
	// End of colspan
	echo "</tr>";
	echo "</THEAD>";
	echo "<TBODY>";
	// Print the FieldData
	foreach ($results as $row) {
		echo "<tr>";
		for ($i=0; $i<=$intFieldCount-1; $i++ ) {
			// Displays the field if strDisplayList = 1, 2 or 4
			if (substr($strDisplayList,$i,1) == 1 || substr($strDisplayList,$i,1) == 2 || substr($strDisplayList,$i,1) == 4){

				$curFieldValue = $row[$arrFieldNames[$i]];

				// check if field type is checkkist or select2 and see if it needs to be unserialized
				if(!empty($FieldType[$i]) && $FieldType[$i] == 'checklist' || $FieldType[$i] == 'select2'){
					$data = @unserialize($curFieldValue);
					if($data !== false || $curFieldValue === 'b:0;'){
						$curFieldValue = json_encode(unserialize($curFieldValue));
						$remove = array('[', ']', '"');
						$curFieldValue = str_replace($remove, "", $curFieldValue);
				        $row[$arrFieldNames[$i]] = $curFieldValue;
					}
				}
				// Check if image
				if ($arrFieldNames[$i] == $ImageFieldName){
				if ($row[$arrFieldNames[$i]] == '')$row[$arrFieldNames[$i]] = 'includes/images/not_available_icon.jpg';
					$curFieldValue = '<td><a id="fancybox" href="' . $row[$arrFieldNames[$i]] . '"><img class="img-rounded" src="' . $row[$arrFieldNames[$i]] . '" alt="" width="10px"></a></td>';
				}
				else
				{
					$curFieldValue = '<td><a href="#" class-"myeditable" id="'. $arrFieldNames[$i].$row[$arrFieldNames[0]] .'">'.$curFieldValue.'</a></td>';
				}
				//Displays a field as a Child Link if strDisplayList $i = 2
				if (substr($strDisplayList,$i,1) == 2){
					$curFieldValue = '<td><a href="#" class="toggle" title="Click to View Child">' . $row[$arrFieldNames[$i]] . '</a></td>';
				}

			echo $curFieldValue;

			// if can inline edit then attach it to the field to edit
			if (substr($strDisplayInlineEdit,$i,1) == 1 || substr($strDisplayInlineEdit,$i,1) == 2){
			?>
			<script>
			<?php
			if (substr($strDisplayInlineEdit,$i,1) == 1)$mode = 'popup';
			if (substr($strDisplayInlineEdit,$i,1) == 2)$mode = 'inline';
			?>
			$('#<?php echo $arrFieldNames[$i].$row[$arrFieldNames[0]] ?>').editable({
				mode: '<?php echo $mode ?>',
				type: '<?php echo $FieldType[$i] ?>',
				pk: <?php echo $row[$arrFieldNames[0]] ?>,
				url: 'post.php',
				name:'<?php echo $arrFieldNames[$i] ?>',
				value: '<?php echo $row[$arrFieldNames[$i]] ?>',
				<?php
				if ($FieldType[$i] == 'textarea'){
				?>
				rows: <?php echo $TextareaRows[$i] ?>,
				<?php
				}
				if (!empty($strPopupPlacement)){

					if (substr($strPopupPlacement,$i,1) == 0)$placement = "top";
					if (substr($strPopupPlacement,$i,1) == 1)$placement = "right";
					if (substr($strPopupPlacement,$i,1) == 2)$placement = "bottom";
					if (substr($strPopupPlacement,$i,1) == 3)$placement = "left";
				}
				if (empty($placement))$placement = "top";
				?>
				placement: '<?php echo $placement ?>',
				<?php
				if ($FieldType[$i] == 'combodate'){
					if (!empty($DateType[$i]) && $DateType[$i] == 'combodate'){

						if (!empty($DateFormat[$i])){
						?>
						format: '<?php echo $DateFormat[$i] ?>',
						<?php
						} // End if DateFormat

						if (!empty($ComboDateTemplate[$i])){
						?>
							template: '<?php echo $ComboDateTemplate[$i] ?>',
						 <?php
						 } // End if DateComdoTemplate
						 ?>
							combodate: {
							firstItem: 'name',
							<?php
							if (!empty($ComboDateMinYear[$i])){
							?>
								minYear: '<?php echo $ComboDateMinYear[$i] ?>',
							<?php
							} // End minYear

							if (!empty($ComboDateMaxYear[$i])){
							?>
								maxYear: '<?php echo $ComboDateMaxYear[$i] ?>',
							<?php
							} // End maxYear

							if (!empty($ComboTimeMinuteStep[$i])){
							?>
								minuteStep: <?php echo $ComboTimeMinuteStep[$i] ?>,
							<?php
							} // End if TimeComboMinuteStep
							?>
						},
				<?php
					} // End DateType = combodate
				} // End FieldType combodate

				if ($FieldType[$i] == 'date'){
					if (!empty($DateType[$i]) && $DateType[$i] == 'date'){

					if (!empty($DateFormat[$i])){
					?>
					format: '<?php echo $DateFormat[$i] ?>',
						<?php
					} // End if DateFormat
					?>
						    datepicker: {
						    <?php
						    if (!empty($DateWeekStart[$i])){
						    ?>
					        weekStart: <?php echo $DateWeekStart[$i] ?>,
					        <?php
					        }
						    if (!empty($DateStartDate[$i])){
						    ?>
					        startDate: '<?php echo $DateStartDate[$i] ?>',
					        <?php
					        }
						    if (!empty($DateEndDate[$i])){
						    ?>
					        endDate: '<?php echo$DateEndDate[$i] ?>',
					        <?php
					        }
						    if (!empty($DateWeekDaysDisabled[$i])){
						    ?>
					        daysOfWeekDisabled: [<?php echo $DateWeekDaysDisabled[$i] ?>],
					        <?php
					        }
						    if (!empty($DateStartView[$i])){
						    ?>
					        startView: <?php echo $DateStartView[$i] ?>,
					        <?php
					        }
					        ?>
							todayBtn: false,
							clear: true,
					    },

					<?php
					} // End DateType = date
				} // End if FieldType date
				if(!empty($arrSelect2[$i])){
				?>
				select2: {
					tags: <?php echo $arrSelect2[$i] ?>,
					<?php
					if(!empty($AutoTokenSeparators2[$i])){
					?>
					tokenSeparators: <?php echo $AutoTokenSeparators2[$i] ?>,
					<?php
					}
					if(!empty($MaxSelectionSize2[$i])){
					?>
					maximumSelectionSize: <?php echo $MaxSelectionSize2[$i] ?>,
					<?php
					}
					if(!empty($MinInputLength2[$i])){
					?>
					minimumInputLength: <?php echo $MinInputLength2[$i] ?>,
					<?php
					}
					if(!empty($MaxInputLength2[$i])){
					?>
					maximumInputLength: <?php echo $MaxInputLength2[$i] ?>,
					<?php
					}
					if(!empty($CustomMatcher2[$i])){
					?>
					matcher: function(term, text) { return text.toUpperCase().indexOf(term.toUpperCase())==0; },
					<?php
					}
					?>
					},
					<?php
					}
					if(!empty($FieldType[$i]) && $FieldType[$i] == 'checklist'){
					}
					if(!empty($FieldType[$i]) && $FieldType[$i] == 'password'){
					}
					if(empty($FieldType[$i]) || empty($FieldType[$i])){
					}
					?>
					title: 'Enter <?php echo $arrFieldNames[$i] ?>',
					<?php
					if(!empty($arrSelect[$i])){
					?>
					source: "<?php echo $arrSelect[$i] ?>",
					<?php
					}
					if(!empty($arrSelectgroups[$i])){
					?>
					source: "<?php echo $arrSelectgroups[$i] ?>",
					<?php
					}
					if (substr($strRequired,$i,1) == 1){
					?>
					validate: function(value) {
					if($.trim(value) == '') return 'This field is required';
					}
				<?php
				}
				?>
			});
			</script>
			<?php
			} // End of if cam inline edit
		} // End if substr $strDisplayList = 1 or 4
	} // End for intFieldCount
		// Get a key value for the VIEW,EDIT and DELETE links
		$key = $row[$arrFieldNames[0]];
		if ($dbCanView == 1)echo "<td class='dbviewlink'><a id='fancybox-view' href='db_View.php?id=".$key . "'>".$txtView."</a></td>";
		if ($dbCanEdit == 1)echo "<td class='dbeditlink'><a id='fancybox-add' href='db_Edit.php?id=".$key . "'>".$txtEdit."</a></td>";
		if ($dbCanDelete == 1)echo "<td class='dbdeletelink'><a href='db_Delete.php?id=".$key . "'>".$txtDelete."</a></td>";
	    // End of row
		echo "</tr>";
		if(!empty($db_ChildTemplate)){
			$strTemplateText = implode( ' ', file($db_ChildTemplate));
			for ($i=0; $i<=$intFieldCount-1; $i++ ) {
				if (substr($strDisplayList,$i,1) == 3 || substr($strDisplayList,$i,1) == 4){
					if ($Field_Names[$i] == 'IMGPhoto' && $row[$arrFieldNames[$i]] == '')$row[$arrFieldNames[$i]] = 'includes/images/PicNotAvaliable.png';
					//if field is empty add a spqce for formatting in template
					if(empty($row[$arrFieldNames[$i]]))$row[$arrFieldNames[$i]]='&nbsp;';
					$strTemplateText = str_replace('{'.$Field_Names[$i].'}', $row[$arrFieldNames[$i]], $strTemplateText);
				}
			}
			// If Child Template then use it.
			echo '<tr class="tablesorter-childRow">';
				echo '<td colspan="' . ($colspan-1) .'">';
					echo '<div class="bold" >';
							echo $strTemplateText ;
					echo '</div>';
				echo '<td>';
			echo '</tr>';
		}
		else
		{
		echo '<tr class="tablesorter-childRow">';
			echo '<td colspan="' . ($colspan-1) .'">';
			if(!empty($ChildRowHeader)){
				echo '<div><h4>' . $ChildRowHeader . ':</h4></div>';
			}
			for ($i=0; $i<=$intFieldCount-1; $i++ ) {
				if (substr($strDisplayList,$i,1) == 3 || substr($strDisplayList,$i,1) == 4){
					if ($Field_Names[$i] == 'IMGPhoto' && $row[$arrFieldNames[$i]] == '')$row[$arrFieldNames[$i]] = 'includes/images/PicNotAvaliable.png';

					// Check if image
					if ($arrFieldNames[$i] == $ImageFieldName){
						if ($row[$arrFieldNames[$i]] == '')$row[$arrFieldNames[$i]] = 'includes/images/Pic-NA.png';
							 $row[$arrFieldNames[$i]]='<img class="displayed" src="'.$row[$arrFieldNames[$i]].'" width="50">';
					}

					// lets show as ***** if it is a password field
					if(!empty($FieldType[$i]) && $FieldType[$i] == 'password'){
						$row[$arrFieldNames[$i]] = '*****';
					}
						echo '<div>';
						echo $row[$arrFieldNames[$i]] .'<br>';
						echo '</div>';
				}
			}
			echo '</td>';
		echo '</tr>';
		}
	} // End foreach
	?>
	</TBODY>
	</table>
</div> <!-- END CONTENTS -->
<?php
if ($db_Pager == 2){
?>
<div  id="pager" class="pager">
	<form>
		<img src="assets/tablesorter-master/addons/pager/icons/first.png" class="first"/>
		<img src="assets/tablesorter-master/addons/pager/icons/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="assets/tablesorter-master/addons/pager/icons/next.png" class="next"/>
		<img src="assets/tablesorter-master/addons/pager/icons/last.png" class="last"/>
		<select class="pagesize">
		<?php
		for ($i=0; $i<=$SelectCount-1; $i++ ) {
			 $UseValue = $arrPageSelect[$i];
			 $ShowValue = $arrPageSelect[$i];
			 if ($ShowValue == 'ALL')$UseValue = '2000';
			 echo '<option value="'. $UseValue .'">'. $ShowValue .'</option>';
		}
		?>
		</select>
		Page: <select class="gotoPage"></select>
		<?php
		if ($dbCanAdd == 1)  echo "<td class='dbeditlink'><a id='fancybox-add' href='db_Add.php'> ".$txtAddNew."</a></td>";
		?>
	</form>
</div>
<?php
} // End if Pager on BOTTOM
?>
</div> <!-- END MAIN -->
<!-- ************ TableSorter Script ************************************** -->
<script type="text/javascript">
$(function() {
    $('.myeditable').editable({
		 url: 'post.php',
		 mode: 'inline'
    });

   $('#user .editable').on('hidden', function(e, reason){
        if(reason === 'save' || reason === 'nochange') {
            var $next = $(this).closest('tr').next().find('.editable');
            if($('#autoopen').is(':checked')) {
                setTimeout(function() {
                    $next.editable('show');
                }, 300);
            } else {
                $next.focus();
            }
        }
   });
   <?php
   if(!empty($strFilter)){
   ?>

 	var filter_widths = [ <?php echo $strFilterWidth ?> ];
   <?php
   }
   ?>
   $("table")
    .bind('filterInit', function () {
        $(this).find('.tablesorter-filter').each(function(i){
            // set filter widths
            $(this).width( filter_widths[i] || 0 );
        });
    })
	// hide child rows
	$('.tablesorter-childRow td').hide();

	$(".tablesorter")
	.tablesorter({
		sortList: [<?php echo $db_ColumnSort ?>],
		 theme : '<?php echo $appTheme ?>',
		 widgets: ['zebra', <?php echo $db_WidgetOptions ?>],
		 headerTemplate : '{content} {icon}',
		 cssChildRow: "tablesorter-childRow",
		 headers: {
	<?php
		$x = 0;
		for ($i=0; $i<=$intFieldCount-1; $i++ ) {
		if (substr($strDisplayList,$i,1) == 1 || substr($strDisplayList,$i,1) == 2  || substr($strDisplayList,$i,1) == 4){

		if (substr($strSortable,$i,1) == 1){$sorter[$i] = 'true';}else{$sorter[$i] = 'false';}
		if (substr($strFilter,$i,1) == 1){$filter[$i] = 'true';}else{$filter[$i] = 'false';}
		if (substr($strResizable,$i,1) == 1){$resize[$i] = 'true';}else{$resize[$i] = 'false';}
		?>
		<?php echo $x ?>: { sorter: <?php echo $sorter[$i]?>, filter: <?php echo $filter[$i]?>, resizable: <?php echo $resize[$i]?> },
		<?php
		$x++;
		} // End $strDisplayList
		} //End for $intFieldCount

		if ($dbCanView == 1){
		?>
		<?php echo $x ?>:{ sorter: false, filter: false, resizable: false },
		<?php
		$x++;  // Add 1 to $x for next column
		} //End canView
		if ($dbCanEdit == 1){
		?>
		<?php echo $x ?>:{ sorter: false, filter: false, resizable: false },
		<?php
		$x++;  // Add 1 to $x for next column
		} //End canEdit
		if ($dbCanDelete == 1){
		?>
		<?php echo $x ?>:{ sorter: false, filter: false, resizable: false },
		<?php
		$x++;  // Add 1 to $x for next column
		} //End canDelete
		?>
		}, // End headers
		widgetOptions : {
			<?php
			if(!empty($db_HideFilter)){
			?>
				filter_hideFilters : <?php echo $db_HideFilter ?>,
			<?php
			} // End if!empty $db_HideFilter
				if(!empty($strFilterSelect)){
			?>
					filter_functions : {
						<?php
						$x = 0;
						for ($i=0; $i<=$intFieldCount-1; $i++ ) {
						if (substr($strDisplayList,$i,1) == 1 || substr($strDisplayList,$i,1) == 2 || substr($strDisplayList,$i,1) == 4 ){
						if (substr($strFilterSelect,$i,1) == 1){$FilterSelect = 'true';}else{$FilterSelect = 'false';}
						?>
						<?php echo $x ?>: <?php echo $FilterSelect ?>,
						<?php
						$x++;
						} // End $strDisplayList,
						} //End for $intFieldCount
						if ($dbCanView == 1){
						?>
						<?php echo $x ?>: false,
						<?php
						$x++;  // Add 1 to $x for next column
						} //End canView
						if ($dbCanEdit == 1){
						?>
						<?php echo $x ?>: false,
						<?php
						$x++;  // Add 1 to $x for next column
						} //End canEdit
						if ($dbCanDelete == 1){
						?>
						<?php echo $x ?>: false,
						<?php
						$x++;  // Add 1 to $x for next column
						} //End canDelete
						?>
					} // End filter_functions

				<?php
				} // End if!empty $strFilterSelect
				?>
		} // End widgetOptions
 	}) // End tablesorter
	.tablesorterPager({
		size:<?php echo $db_PageSize ?>,
		page: <?php echo $db_StartPage ?>,
		container: $("#pager"),
		positionFixed: false,
		fixedHeight: true
	}) // End tablesorterPager
	.bind('pagerChange', function(){
		// hide child rows after pager update
		$('.tablesorter-childRow td').hide();
	}); // End bind
	$('.tablesorter').delegate('.toggle', 'click' ,function(){
		// use "nextUntil" to toggle multiple child rows
		// toggle table cells instead of the row
		$(this).closest('tr').nextUntil('tr:not(.tablesorter-childRow)').find('td').toggle();
		return false;
	});  // End  $_tablesorter
	$('button').click(function(){
	    $('table').trigger('sortReset');
 	});
}); // End Of This Function
</script>
</body>
</html>