<?php
//ini_set('display_errors', 1); error_reporting(~0);

// database configuration
$DB["username"] = "root";
$DB["password"] = "mysql";
$DB["host"] = "localhost";
$DB["dbname"] = "crud";

// make the database connection
try {
    $conn = new PDO("mysql:host=" . $DB["host"] .";".
        "dbname=" . $DB["dbname"],
        $DB["username"],
        $DB["password"]);

    //echo "Connection Successful";

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // have my fetch data returned as an associative array
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    exit();
}

?>