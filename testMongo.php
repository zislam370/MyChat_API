<?php

error_reporting(0);
//getting post variablefs

$phone=$_POST['phone'];
$code=$_POST['code_gen'];
$device_id=$_POST['device_id'];
$user_ip=$_POST['user_ip'];
$active_date=$_POST['active_date'];


//echo $_POST;

$error = array();

if(empty($phone) )
{
    $error[] = "Enter valid phone";
}


if(count($error) ==0){

//database configuration
    $host = 'localhost';
    $database_name = 'mychat';
    $database_user_name = '';
    $database_password = '';

//if you have database user name & password then connection may be
//$connection=new Mongo("mongodb://$database_user_name:$database_password@$dbhost");

//Currently we are connecting to mongodb without authentication
    $connection=new MongoClient();


//checking the mongo database connection
    if($connection){


//connecting to database
        $databse=$connection->$database_name;



//connect to specific collection
        $collection=$databse->users;

        $query=array('phone_num'=>$phone,'conf_code'=>$code,'device_id'=>$device_id,'user_ip'=>$user_ip,'active_date'=>$active_date);
//checking for existing user
        $count=$collection->findOne($query);
        

        if(!count($count)){
//Save the New user
            $user_data=array('phone_num'=>$phone,'conf_code'=>$code,'device_id'=>$device_id,'user_ip'=>$user_ip,'active_date'=>$active_date);
            $collection->save($user_data);
            echo "You are successfully registered.";
        }else{
            echo "Email is already existed.Please register with another Email id!.";
        }

    }else{

        die("Database are not connected");
    }

}else{
//Displaying the error
    foreach($error as $err){
        echo $err.'<br />';
    }
}



?>

