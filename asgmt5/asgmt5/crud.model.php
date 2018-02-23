<?php
//ini_set('display_errors', 1); error_reporting(~0);

//Get all the data from the phonebook table, return as 2D array ***WORKS***
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

//Delete record from the database  ***WORKS***
function deletePhone($conn, $phoneid){ // Check functionality
    try{
        //deleting a record from database
        $stmt = $conn->prepare("DELETE FROM phonebook WHERE id=?");
        $stmt->execute([$phoneid]);
        //var_dump($stmt);
    }
        //If detelePhone() fails, exit with failure status
    catch(PDOException $e)
    {
        echo "deletePhone failed: " . $e->getMessage();
        exit();
    }
}

//Insert record into the database.  ***WORKS***
function insertPhone($conn, $fname, $lname, $phone, $email,
                     $location, $mc, $pos, $dept){
    try{
        $stmt = $conn->prepare("INSERT INTO phonebook" .
            "(id, fname, lname, phone, email, location, mc, pos, dept) VALUES" .
            "(?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt -> execute(["null", $fname, $lname, $phone, $email, $location, $mc, $pos, $dept]);
    }
        //If detelePhone() fails, exit with failure status
    catch(PDOException $e)
    {
        echo "insertPhone failed: " . $e->getMessage();
        exit();
    }
}

//Editing Database Record
function editPhone($conn, $phoneid,$fname, $lname, $phone, $email,
                   $location, $mc, $pos, $dept){
    try{
        $stmt = $conn->prepare("UPDATE 
                                    phonebook" .
                                "SET 
                                    fname=?, 
                                    lname=?,
                                    phone=?,
                                    email=?,
                                    location=?,
                                    mc=?,
                                    pos=?,
                                    dept=?" .
                                "WHERE 
                                    id=?");
        $stmt -> execute([$fname, $lname, $phone, $email, $location, $mc, $pos, $dept, $phoneid]);
    }
    catch(PDOException $e)
    {
        echo "editPhone failed: " . $e->getMessage();
        exit();
    }
}

//Sort records by
function sortPhone($conn, $case){
    switch ($_REQUEST["sort"]){
        //Sort by ascending last name
        case "1":
            try{
                $stmt = $conn->prepare("SELECT * FROM phonebook ORDER BY lname ASC");
                $stmt -> execute();
            }
            catch(PDOException $e)
            {
                echo "sortPhone failed: " . $e->getMessage();
                exit();
            }
            break;

        //Sort by descending phone #
            case "2":
            try{
                $stmt = $conn->prepare("SELECT * FROM phonebook ORDER BY phone DESC");
                $stmt -> execute();
            }
            catch(PDOException $e)
            {
                echo "sortPhone failed: " . $e->getMessage();
                exit();
            }
            break;

        //Sort by descending email #
        case "3":
            try{
                $stmt = $conn->prepare("SELECT * FROM phonebook ORDER BY email DESC");
                $stmt -> execute();
            }
            catch(PDOException $e)
            {
                echo "sortPhone failed: " . $e->getMessage();
                exit();
            }
            break;
    }
/*    if($case == 1){
        try{
            $stmt = $conn->prepare("SELECT * FROM phonebook ORDER BY lname ASC");
            $stmt -> execute();
        }
        catch(PDOException $e)
        {
            echo "sortPhone failed: " . $e->getMessage();
            exit();
        }
    }
    else if($case == 2){
        try{
            $stmt = $conn->prepare("SELECT * FROM phonebook ORDER BY phone DESC");
            $stmt -> execute();
        }
        catch(PDOException $e)
        {
            echo "sortPhone failed: " . $e->getMessage();
            exit();
        }
    }
    else if($case == 3){
        try{
            $stmt = $conn->prepare("SELECT * FROM phonebook ORDER BY email DESC");
            $stmt -> execute();
        }
        catch(PDOException $e)
        {
            echo "sortPhone failed: " . $e->getMessage();
            exit();
        }
    }*/
}
?>