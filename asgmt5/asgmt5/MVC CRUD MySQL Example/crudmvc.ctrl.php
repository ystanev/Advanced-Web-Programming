<?php

// include database configuration
include "dbheader.php";

// model with database and business logic code
include "crudmvc.model.php";

// make my TPL array at the top, because it might be populated during 
// the switch actions
$TPL = array(); 
 
switch ($_REQUEST["act"]) { 
   
  // deleting a cat from the database 
  case "delete":

    $catid = $_REQUEST["id"];
    deleteCat($conn, $catid);  
   
    break;
   
  // insert a new cat into the database  
  case "insert":
  
    insertCat($conn,
	          $_REQUEST["name"],
	          $_REQUEST["breed"],
			  $_REQUEST["owner"],
			  $_REQUEST["image"]);
  
    break;
   
  default:	
	
}

// put code here for things that need to happen every time the page loads
$TPL["cats"] = getAllCats($conn);


// view with our user interface
include "crudmvc.view.php";

?>