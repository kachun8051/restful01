<?php
    $server = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "covid";

    $conn = new mysqli($server, $dbUser, $dbpassword, $dbname);
    if ($conn->connect_error) {
        //fail to connect db
        $err = array("status"=>"failed", "errorno"=>"101", "errormsg"=>"db connect error");
        echo json_encode($err);
        exit;
    } 


?>