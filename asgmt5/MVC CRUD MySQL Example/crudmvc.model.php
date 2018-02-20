<?php

// get all the cats from the cats table, return as 2D array
function getAllCats($conn) 
{
  try {
	// get all of the cat records, return them
    $stmt = $conn->prepare("SELECT * FROM cats");
	$stmt->execute();
	
	$results = array();
    while ($row = $stmt->fetch())
    {
      $results[] = $row;
    }	
	return $results;
  }
  // if getAllCats fails, exit with failure status
  catch(PDOException $e)
  {
    echo "getAllCats failed: " . $e->getMessage();
	exit();
  }	
}

// delete a cat from the database
function deleteCat($conn, $catid) 
{
  try {
	// get all of the cat records, return them
    $stmt = $conn->prepare("DELETE FROM Cats WHERE id=?");
	$stmt->execute([$catid]);
  }
  // if getAllCats fails, exit with failure status
  catch(PDOException $e)
  {
    echo "deleteCat failed: " . $e->getMessage();
	exit();
  }		
}

// insert a cat into the database
function insertCat($conn, $name, $breed, $owner, $image) 
{
  try {
	// get all of the cat records, return them
	$stmt = $conn->prepare("INSERT INTO Cats " .
	                      "(id,name,breed,owner,imageurl) VALUES " . 
						  "(?, ?, ?, ?, ?)");
	$stmt->execute(["null", $name, $breed, $owner, $image]);

  }
  // if getAllCats fails, exit with failure status
  catch(PDOException $e)
  {
    echo "insertCat failed: " . $e->getMessage();
	exit();
  }		
}


?>