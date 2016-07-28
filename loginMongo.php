<?php

error_reporting(0);



// connect to mongodb
$m = new MongoClient();
//echo "Connection to database successfully";

// select a database
$db = $m->mychat;
//echo "Database mydb selected";
$collection = $db->users;
//echo "Collection selected succsessfully";


//////    ///////
//if (isset($_POST['verify_code'])) {

if(!empty($_POST['verify_code'])){

    $postedCode = $_POST['verify_code'];


    $fruitQuery = array('conf_code' => $postedCode);

    $cursor = $collection->find($fruitQuery);

    //$cursor->limit(1);

    if(!empty($cursor)){

        //echo count($cursor);
        foreach ($cursor as $doc) {
       // var_dump($doc);
        $storedPhone = $doc['phone_num'];


        $storedCode = $doc['conf_code'];

    }


    if ($postedCode == $storedCode) {

        echo "Login Success..Welcome " . $storedPhone;


    } else {
        echo "Wrong code";
    }
    }else{
        echo "Wrong code";
    }


}else{
	echo "Wrong code";




}






