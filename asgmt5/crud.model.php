<?php
ini_set('display_errors', 1); error_reporting(~0);

//Get all the data from the phonebook table, return as 2D array
function getPhoneBook($conn){
    try {
        $stmt = $conn->prepare("SELECT * FROM phonebook");
        $stmt->execute();

        $results = array();
        while ($row = $stmt->fetch())
        {
            $results[] = $row;
        }
        return $results;
    }
    //If getPhoneBook() fails, exit with failure status
    catch(PDOException $e){
        echo "getPhoneBook failed: " . $e->getMessage();
        exit();
    }
}

?>