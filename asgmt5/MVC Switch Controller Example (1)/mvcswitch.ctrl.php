<?php

// template array, that controller uses to communicate to view
$TPL = array();

// switch that decides what to do based on the action requested
switch ($_REQUEST['act']) {

    // blue action	
	case "blue":
	  
	  $TPL["dispblue"] = true;
	  $TPL["dispbluemsg"] = "I'm blue!";
	
	  break;
	
	// red action
	case "red":
	
	  $TPL["dispred"] =  true;
	  $TPL["dispredmsg"] = "I'm red";
	  
	  break;
	  
	  
	// display table action
	case "disptable":
	
	  $TPL["disptable"] = true;
	  $TPL["mytable"] = 
	    array(array("name" => "Kevin", "phone" => "123-123-1234"),
		      array("name" => "Larissa", "phone" => "456-456-7656"),
			  array("name" => "Tammy", "phone" => "756-324-4563"));
		
	  break;
	
	// default action that occurs on first page load
	default:
	
	  $TPL["dispdefault"] = true;
	  $TPL["defaultval"] = "Default!";
	  
}

include "mvcswitch.view.php";

?>




