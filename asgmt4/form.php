<!DOCTYPE html>
<html>
<head>
    <title>Student Payment Form</title>
    <style>

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 16px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
            font-size:14px;
            margin-top: 7px;
            margin-bottom: 7px;

        }

        input[type=button], input[type=submit], input[type=reset] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }

        .success {
            font-size: 20px;
            color: green;
        }

        .error {
            font-size: 20px;
            color: red;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>

<!-- Form solution code here !-->

<br />

<h1>Student Payment Form</h1>

<form action="form.php" method="post">
    First Name <br>
    <input type="text" name="fname"> <br>
    Last Name <br>
    <input type="text" name="lname"> <br>
    Student ID <br>
    <input type="text" name="student_id"> <br>
    Tuition <br>
    <input type="text" name="tuition"> <br>
    Payment Method <br>
    <select name="payment">
        <option value="Credit">Credit</option>
        <option value="Debit">Debit</option>
        <option value="Bitcoin">Bit Coin</option>
    </select> <br>

    <input type="submit" value="Submit">
    <input type="button" value="Random">
    <input type="button" onclick="log()" value="Log">
</form>

<?php
// PHP solution code here
//Variables
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$s_id = $_POST['student_id'];
$tuition = $_POST['tuition'];
$payment = $_POST['payment'];
$success = true; //Sets success as true from beginning.

//Checking for Errors
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //Checking Values
    echo '<ul class="error">';
    if(strlen($fname)<2){
        $success = false; //Errors change success to false.
        echo '<li>'."First name must be 2 or more characters in length".'</li>';
    }
    if(strlen($lname)<3 || strlen($lname)>12){
        $success = false;
        echo '<li>'."Last name must be between 3 and 12 characters in length".'</li>';
    }
    if(strlen($s_id)!=9){
        $success = false;
        echo '<li>'."Student id must be exactly 9 characters in length".'</li>';
    }
    if($tuition < 2000 || $tuition > 10000){
        $success = false;
        echo '<li>'."Tuition must be between 2000 and 10000".'</li>';
    }
    echo '</ul>';

//Success
    if($success){
        echo '<ul class="success">';
        echo '<li>'."Payment Successful!".'</li>';
        echo '</ul>';

        //File Handling
        $line = array($fname, $lname, $s_id, $tuition, $payment); //Creates a line to append to the file.
        $handle = fopen("log.txt", "a+"); //Open for reading and writing; place the file pointer at the end of the file.
        fputcsv($handle, $line); //Puts the values into the file.
        fclose($handle); //Close the file.
    }
}
?>

<!--Debugging-->
<!--<pre>
    <?php /*var_dump($line); */?>
</pre>-->

<script>
    // JavaScript solution code here
    function log() { //Open log file in a browser window.
        //window.location.href = "log.txt";
        window.open('log.txt', '_blank');
    }
</script>
</body>
</html>