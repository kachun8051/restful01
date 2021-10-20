<?php
    $server = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "covid";

    $conn = new mysqli($server, $dbuser, $dbpassword, $dbname);
    if ($conn->connect_error) {
        //fail to connect db
        $err = array("status"=>"failed", "errorno"=>"101", "errormsg"=>"db connect error");
        echo json_encode($err);
        /*
        $result = array();
        $result["status"] = "failed";
        $result["errorno"] = "101";
        $result["errormsg"] = "db connect error";
        echo json_encode($result);
        */
        exit;
    } 
    echo "initial mysqli success.";


?>