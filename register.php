
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mychat";


$conn = new mysqli($servername, $username, $password, $dbname);
 //echo ' connection ok';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name=$_POST["phone"];
//echo $name;
$sql = "insert into phone(phone_number) value ('$name')";
//echo "---->". $sql;
//echo '<pre>';
//print_r($_POST);
//echo '<pre>';
if ($conn->query($sql) === TRUE) {
 //   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
