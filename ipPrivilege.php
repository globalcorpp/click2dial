<?php

    $ip = $_POST['ip'];
//    $ip = $_SERVER['REMOTE_ADDR'];
    
    
    
    if ($ip == "192.168.187.1") {
        $source = "3000";
    } elseif ($ip == "X.X.X.X") {
        $source = "XXXX";
    } else {
        $source = NULL;
    }
    
    
    
    
    $destination = $_POST['id'];
//        echo $destination;
    
    $status = $_POST['status'];
    
    if ($status == "4"){
//            $source = 1000;
//            $destination = "";
        exit(1);
        }

?>