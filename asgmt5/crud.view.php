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
        </tr>
        <?
        ini_set('display_errors', 1); error_reporting(~0);
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
            </tr>
            <?
        }
        ?>
    </table>

    <br><br>
    <h3>TPL Array Dump</h3>
    <pre><? var_dump($TPL) ?></pre>
</body>
</html>