<!DOCTYPE html>
<html>
  <head>
    <title>MVC Switch Controller Example Code</title>
  </head>
<body>

  <h1>MVC Switch Controller Example</h1>
  
  <h2>Actions</h2>
  <ul>
    <li><a href="mvcswitch.ctrl.php?act=blue">Blue</a></li>
    <li><a href="mvcswitch.ctrl.php?act=red">Red</a></li>
    <li><a href="mvcswitch.ctrl.php?act=disptable">Display Table</a></li>
  </ul>
  
  
  <h2>Result</h2>

  <?php if ($TPL["dispdefault"]) { ?>
    <div>
	  <?= $TPL["defaultval"]; ?>
	</div>
  <?php } ?>  
  
  <?php if ($TPL["dispblue"]) { ?>
    <div style="background-color:blue;color:white">
	  <?= $TPL["dispbluemsg"]; ?>
	</div>
  <?php } ?>
  
  <?php if ($TPL["dispred"]) { ?>
    <div style="background-color:red;color:white">
	  <?= $TPL["dispredmsg"]; ?>
	</div>
  <?php } ?>
  
  <?php if ($TPL["disptable"]) { ?>
  <table>
    <tr><th>Name</th><th>Phone</th></tr>
	<?php foreach ($TPL["mytable"] as $data) { ?>
	  <tr><td><?= $data["name"] ?></td><td><?= $data["phone"] ?></td></tr>
	<?php } ?>
  </table>
  <? } ?>
  
  
  <br /> <br /> <br />
  <h3>TPL array dump...</h3>
  <pre>
    <?php print_r($TPL); ?>
  </pre>
</body>
</html>



