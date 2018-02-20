<?php
ini_set('display_errors', 1); error_reporting(~0);

// include database configuration
include "dbheader.php";

// model with database and business logic code
include "crud.model.php";

// make my TPL array at the top, because it might be populated during
// the switch actions
$TPL = array();


// put code here for things that need to happen every time the page loads
$TPL["phonebook"] = getPhoneBook($conn);

// view with our user interface
include "crud.view.php";