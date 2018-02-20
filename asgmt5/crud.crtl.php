<?php
//ini_set('display_errors', 1); error_reporting(~0);

// include database configuration
include "dbheader.php";

// model with database and business logic code
include "crud.model.php";

// make my TPL array at the top, because it might be populated during
// the switch actions
$TPL = array();

var_dump($_REQUEST);
switch ($_REQUEST["act"]){
    //Delete record from database.
    case "delete":
        $phoneid = $_REQUEST["id"];
        var_dump($phoneid);
        deletePhone($conn, $phoneid);
    break;

    //Insert record into database
    case "insert":
        insertPhone($conn, $_REQUEST["f_name"],
                    $_REQUEST["l_name"],
                    $_REQUEST["phone_num"],
                    $_REQUEST["e-mail"],
                    $_REQUEST["location1"],
                    $_REQUEST["m_c"],
                    $_REQUEST["position"],
                    $_REQUEST["department"]);
    break;

    default:
}

// put code here for things that need to happen every time the page loads
$TPL["phonebook"] = getPhoneBook($conn);

// view with our user interface
include "crud.view.php";