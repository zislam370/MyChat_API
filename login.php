//<?php
//error_reporting(0);
//$conn = mysqli_connect("localhost", "root" , "");
//$db   =mysqli_select_db("mychat");
//if ($conn){
// //echo "db connection ok";
//
//}
//else{
//
// echo "db fail";
//}
//
///*
//
//*/
////$user_name = $_POST["login_name"];
////echo $user_name;
////$user_pass =  $_POST["login_pass"];
//$sql_query = "insert into  user_info(user_name,user_pass) VALUE ('".$_POST["login_name"].",'".$_POST["login_pass"]."')";
////echo $sql_query;
//
//
////$result = mysqli_query($conn,$sql_query);
////echo $result;
////if ($result) {
///// echo "New record created successfully";
////}
///*
//if(mysqli_num_rows($result) >0 )
//{
// $row = mysqli_fetch_assoc($result);
// //print_r( $row);
// $name =$row["name"];
// echo "Login Success..Welcome ".$name;
//}
//else
//{
// //echo "Login Failed.......Try Again..";
//}
//*/
//?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mychat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$user_name = $_POST["verify_code"];

//$sql = "insert into  user_info(user_name,user_pass) value ('$user_name','$user_pass')";

$sql = "SELECT phone_number FROM `phone` WHERE code= '$user_name' ";
//if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
//} else {
//echo "Error: " . $sql . "<br>" . $conn->error;
//}
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
  $name=$row["phone_number"];
  echo "Login Success... .".$name;
 }
} else {
 echo "Fail ";
}

$conn->close();

?>
