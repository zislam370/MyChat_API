<?php
error_reporting(0);
$conn = mysql_connect("localhost", "root" , "");
$db   = mysql_select_db("mychat");
if ($conn){
   // echo "db connection ok";

}
else{

    echo "db fail";
}

?>