<!DOCTYPE html>
<html>
<head>
  <title>CRUD MVC application</title>
  <style>
    td {border: 1px solid black;}
  </style>
</head>
<body>

  <h1>CRUD MVC App</h1>
  
  <p>Advanced cat management system.</p>
  
  <h3>Cats table</h3>
  <table>
    <tr><th>ID</th><th>Name</th><th>Breed</th>
	    <th>Owner</th><th>Image</th>
		<th>Delete</th></tr>
    <?
      foreach ($TPL["cats"] as $catdata)
	  {
	    ?> 
		<tr>
		  <td><?= $catdata["id"] ?></td>
		  <td><?= $catdata["name"] ?></td>
		  <td><?= $catdata["breed"] ?></td>
		  <td><?= $catdata["owner"] ?></td>
		  <td><img src="<?= $catdata["imageurl"] ?>" width=100></td>
		  <td><a href="crudmvc.ctrl.php?act=delete&id=<?= $catdata["id"] ?>">D</a></td>
		</tr>
		<?
	  }
    ?>	
  </table>
  
  <h3>Add cat</h3>
  <form action="crudmvc.ctrl.php?act=insert" method="post">
    Name: <input type="text" name="name"> <br />
    Breed: <input type="text" name="breed"> <br />
    Owner: <input type="text" name="owner"> <br />
    Image: <input type="text" name="image"> <br />
    <input type="submit">
  </form>
  
  
  <br /> <br /> <br />
  <h3>TPL array dump</h3>
  <pre><?php print_r($TPL) ?></pre>
   
</body>
</html>