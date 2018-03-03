<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Q2</title>
    <style>li{ color: red }</style>
</head>
<body>
<form action="myapp.php" method="post">
    <input type="text" name="name" placeholder="Name"><br>
    <select name="account">
        <option value="checking">Checking</option>
        <option value="savings">Savings</option>
    </select><br>
    <input type="text" name="amount" placeholder="Amount"><br>
    <input type="submit" value="Submit">
</form>

<?php
    $name = $_POST['name'];
    $account = $_POST['account'];
    $amount = $_POST['amount'];
    $success = true;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo '<br>';
        echo '<ul>';
            if(strlen($name)<5 || strlen($name)>15){
                $success = false;
                echo '<li>' . "The name must be between 5 and 15 characters in length." .  '</li>';
            }
            if(empty($account)){
                $success = false;
                //echo '<pre>' . var_dump($account) . '</pre>' . '<br>';
                echo '<li>' . "The account should be set to either checking or savings." . '</li>';
            }
            if($amount<5 || $amount>10000){
                $success = false;
                echo '<li>' . "The amount should be between 5 and 10,000." .  '</li>';
            }
        echo '</ul>';
    }

    if($success){
        echo '<br>' . '<br>';
        echo "The amount $" . $amount . " was successfully sent from your " . $account . " account";
    }
?>
</body>
</html>