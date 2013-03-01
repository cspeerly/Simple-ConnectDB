<?php

// READ ALL REPARKS BEFORE YOU START.
// THIS WAY YOU WILL KNOW HOW TO SET EACH SETTING INCONJUCTION WITH THE OTHER

//****** CUSTOMERS ***************************
// Database Connection
$db_user = 'user';
$db_password = 'password';
$db_Name = 'a1-sales';
$db_Table = 'customers';
$db_port = '3307';   // Change to match the port # for your mySQL

// NOTE: Everthing below here is optional
// Althought to Add/Edit and customize you will need to set some of them
// REFER TO THE DOC.PHP FOR HELP

// Sets the Main Title name for the application
$appTitle = 'Customers';

// Theme
$appTheme = 'blue';   // blue,green,bootstrap,dropbox,dark,ice,black-ice,default,grey

// Widgets
// options = filter, columns, resizable
$db_WidgetOptions = "'filter','resizable'";

// Defined Field Names
$strFieldNames  = "ID,COMPANY,FIRSTNAME,LASTNAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIP,PHONE,EMAIL,PASSWORD,SALESREP,ENTERED,MEMO,LIMIT,LEVEL,COLOR,STATUS,Photo,Languages,Date,Time,Year,DateTime,TimeStamp,Notes";

// Field Types
// defines the field type in db_edit.php and db_add.php
// four ****'s require $arrSelect settings below
// Options = 	text. 		***
//				textarea,	***
//				email, 		***  validation only
//				date, 		***
//				combodate,	***
//				select, 	****
//				password, 	***
//				url, 		***  validation only
//				number, 	***  0- etc.
//				range, 		***  slider 0-100
//				checklist, 	****
//				typeahead, 	****
//				wysihtml5.	***
//				select2    	---  Does not work rith ir set to id shows s ref test box, if set to value shows dropdown but no options
$strFieldType  	= 'text,select,text,text,text,text,text,select,select,text,email,password,select,combodate,wysihtml5,text,select,checklist,select,text,select2,date,combodate,combodate,combodate,combodate,textarea';

// Order by
$db_OrderBy = "CompanyName";

// Where
$db_Where = '';

// Column Sort
// example sort on column 3 then column2 column = "[3,0],[2,0]"
$db_ColumnSort = "[2,0],[1,0]";

// BUTTONS, VIEW, EDIT, ADD and DELETE
$dbButtons = 1;
$dbCanView = 1;
$dbCanEdit = 1;
$dbCanAdd = 1;
$dbCanDelete = 1;

// DISPLAY LIST
// 0 = No Show
// 1 = Show on Table List only
// 2 = Show on Table List as the Link to Child Row
// 3 = Show on Child Row only
// 4 = Show on Table List and Child Row
//                       012345678901234567890123456
$strDisplayList =       "214430333330343341041000000";

// Display View
$strDisplayView  =      "111111111111111111111111111";

// Display VIEW/EDIT
//                       012345678901234567890123456
$strDisplayViewEdit =   "322222222222222222222222222";

// Display ADD
$strDisplayAdd =        "022222222222222222222222222";

// Inline Edit
// 0=no edit, 1=popup edit and 2=inline edit
//                       012345678901234567890123456
$strDisplayInlineEdit = "011112222222212222222222222";
$strPopupPlacement    = "011200000000020000033200330";

//Required
$strRequired =          "011100000000000000000000000";

//Sortable
$strSortable =          "111111111110010011001000000";

// Resizable
$strResizable =         "011111111111111111111111111";

//Filter
$strFilter =            "011100000000010011001000000";
$strFilterSelect =      "011100000000010010000000000";

$db_HideFilter = 'true';

// Pager
// 0 = NO Pager, 1 = Display on Top, 2 = Bottom, 3 = both
$db_Pager = 3;
$db_PageSelector = "5,10,15,20,50,100,ALL";
$db_PageSize = 5;
$db_StartPage = 0;

$TextareaRows[26] = 2;

// Child Row Header
$ChildRowHeader = 'Child Header';

// Child Row Template
$db_ChildTemplate = 'Customers-Child-Template.html';

//Define if using the selerct options
$arrSelect = array();

//select
$arrSelect[1] = "{'': 'Select Company', 'A1-SALES': 'A1-SALES', 'A2-SALES': 'A2-SALES', 'A3-SALES': 'A3-SALES', 'AK1-SALES': 'AK1-SALES'}";

// select
$arrSelect[12] = "{'': 'Select Sales Rep', 'Chuck': 'Chuck Speerly', 'Bill': 'Bill Williams', 'Kevin': 'Kevin Lewis'}";
//$arrSelect[12] = "[{value: 'Chuck', text: 'Chuck Speerly'}, {value: 'Bill', text: 'Bill Williams'}, {value: 'Kevin', text: 'Kevin Lewis'}, {value: 'Nolan', text: 'Nolan Hatcher'}]";

// select
$arrSelect[16] = "[{value: '1', text: 'Level-1'}, {value: '2', text: 'Level-2'}, {value: '3', text: 'Level-3'}, {value: '4', text: 'Level-4'}]";

// checklist
$arrSelect[17] = "[{value: 'Red', text: 'Red'}, {value: 'White', text: 'White'}, {value: 'Blue', text: 'Blue'}, {value: 'Green', text: 'Green'}, {value: 'Yellow', text: 'Yellow'}]";

// select
$arrSelect[18] = "{'': 'Select', 'Active': 'Active', 'Non-Active': 'Non-Active', 'Vaccation': 'Vaccation'}";

// typeahead
$arrSelect[7] = "[{value: 'AL', text: 'Alabama'},{value: 'AK', text: 'Alaska'},{value: 'AZ', text: 'Arizona'},{value: 'AR', text: 'Arkansas'},{value: 'CA', text: 'California'},{value: 'CO', text: 'Colorado'},{value: 'CT', text: 'Connecticut'},{value: 'DE', text: 'Delaware'},{value: 'FL', text: 'Florida'},{value: 'GA', text: 'Georgia'},{value: 'HI', text: 'Hawaii'},{value: 'ID', text: 'Idaho'},{value: 'IL', text: 'Illinois'},{value: 'IN', text: 'Indiana'},{value: 'IA', text: 'Iowa'},{value: 'KA', text: 'Kansas'},{value: 'KT', text: 'Kentucky'},{value: 'LO', text: 'Louisiana'},{value: 'ME', text: 'Maine'},{value: 'MD', text: 'Maryland'},{value: 'MA', text: 'Massachusetts'},{value: 'MI', text: 'Michigan'},{value: 'MN', text: 'Minnesota'},{value: 'MS', text: 'Mississippi'},{value: 'MO', text: 'Missouri'},{value: 'MT', text: 'Montana'},{value: 'NE', text: 'Nebraska'},{value: 'NV', text: 'Nevada'},{value: 'NH', text: 'New Hampshire'},{value: 'NJ', text: 'New Jersey'},{value: 'NM', text: 'New Mexico'},{value: 'NY', text: 'New York'},{value: 'ND', text: 'North Dakota'},{value: 'NC', text: 'North Carolina'},{value: 'OH', text: 'Ohio'},{value: 'OK', text: 'Oklahoma'},{value: 'OR', text: 'Oregon'},{value: 'PA', text: 'Pennsylvania'},{value: 'RI', text: 'Rhode Island'},{value: 'SC', text: 'South Carolina'},{value: 'SD', text: 'South Dakota'},{value: 'TN', text: 'Tennessee'},{value: 'TX', text: 'Texas'},{value: 'UT', text: 'Utah'},{value: 'VT', text: 'Vermont'},{value: 'VA', text: 'Virginia'},{value: 'WA', text: 'Washington'},{value: 'WV', text: 'West Virginia'},{value: 'WI', text: 'Wisconsin'},{value: 'WY', text: 'Wyoming'}]";

// Groups
$arrSelectgroups[8] = "includes/groups/Zips-tn.php";

// Select2

$arrSelect2[20] = "['html', 'javascript', 'css', 'ajax', 'php', 'asp', 'c++']";


//$arrSelect2[20] = '[{id: "EN", text: "EN"}, {id: "RU", text: "RU"}, {id: "GB", text: "GB"}]';
//$MaxSelectionSize2[20] = 2;
//$MinInputLength2[20] = 2;
//$MaxInputLength2[20] = 5;
//$AutoTokenSeparators2[20] = '[",", " "]';
$CustomMatcher2[20] = 'yes';

// Show Field as a image
$ImageFieldName = "IMGPhoto";

// COMBODATE FIELD TYPE
$DateType[13] = "combodate";
$DateFormat[13] = "YYYY-MM-DD";

$ComboDateTemplate[13] = "YYYY/MMMM/DD";
$ComboDateMinYear[13] = '2010';
$ComboDateMaxYear[13] = '2015';


// DATE FIELD TYPE
$DateType[21] = "date";
$DateFormat[21] = "yyyy-mm-dd";
//$DateWeekStart[21] = 0;
//$DateStartDate[21] = '2013-01-01';
//$DateEndDate[21] = '2015-12-31';
//$DateWeekDaysDisabled[21] = '0,6';
$DateStartView[21] = 2;

// COMBODATE TIME ONLY
$DateType[22] = "combodate";
$DateFormat[22] = "HH:mm";
$ComboDateTemplate[22] = "hh:mm a";
$ComboTimeMinuteStep[22] = 15;


// COMBODATE YEAR ONLY
$DateType[23] = "combodate";
$DateFormat[23] = "YYYY";
$ComboDateTemplate[23] = "YYYY";
$ComboDateMinYear[23] = '2010';
$ComboDateMaxYear[23] = '2015';


// COMBODATE DATETIME
$DateType[24] = "combodate";
$DateFormat[24] = "YYYY-MM-DD HH:mm";
$ComboDateTemplate[24] = "YYYY/MMMM/DD hh:mm a";
$ComboDateMinYear[24] = '2010';
$ComboDateMaxYear[24] = '2015';
$ComboTimeMinuteStep[24] = 15;


// DATE FIELD TYPE
$DateType[25] = "combodate";
$DateFormat[25] = "YYYY-MM-DD HH:mm";
$ComboDateTemplate[25] = "YYYY/MMMM/DD hh:mm a";
$ComboDateMinYear[25] = '2010';
$ComboDateMaxYear[25] = '2015';
$ComboTimeMinuteStep[25] = 15;


?>