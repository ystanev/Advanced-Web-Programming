<!DOCTYPE html>
<html>
<head>
    <title>PhoneBook Database</title>
    <style>
        td{border: 1px solid black;}
    </style>
</head>
<body>
<h1>Phone Book</h1>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone #</th>
        <th>Email</th>
        <th>Location</th>
        <th>MC</th>
        <th>Position</th>
        <th>Department</th>
        <th>Delete</th>
    </tr>
    <?
    //ini_set('display_errors', 1); error_reporting(~0);
    foreach ($TPL["phonebook"] as $phonedata) {
        ?>
        <tr>
            <td><?= $phonedata["id"] ?></td>
            <td><?= $phonedata["fname"] ?></td>
            <td><?= $phonedata["lname"] ?></td>
            <td><?= $phonedata["phone"] ?></td>
            <td><?= $phonedata["email"] ?></td>
            <td><?= $phonedata["location"] ?></td>
            <td><?= $phonedata["mc"] ?></td>
            <td><?= $phonedata["pos"] ?></td>
            <td><?= $phonedata["dept"] ?></td>
            <td><a href="crud.crtl.php?act=delete&id=<?= $phonedata["id"] ?>">DELETE</a></td>
        </tr>
        <?
    }
    ?>
</table>

<h3>Add Phone Record</h3>
<form action="crud.crtl.php?act=insert" method="post">
    <input type="text" name="f_name" placeholder="First Name"><br>
    <input type="text" name="l_name" placeholder="Last Name"><br>
    <input type="text" name="phone_num" placeholder="Phone #"><br>
    <input type="text" name="e-mail" placeholder="E-Mail"><br>
    <input type="text" name="location1" placeholder="Location"><br>
    <input type="text" name="m_c" placeholder="MC"><br>
    <input type="text" name="position" placeholder="Position"><br>
    <input type="text" name="department" placeholder="Department"><br>
    <input type="submit">
</form>

<br><br>
<!--    <h3>TPL Array Dump</h3>-->
<pre><? //var_dump($TPL) ?></pre>
</body>
</html>