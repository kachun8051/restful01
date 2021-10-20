<?php

class VaccineService{
    function __construct()
    {
        
    }

    function restGet($params){
        echo 'Vaccine: restGet';        
        $type = array_shift($params);
        echo 'type: ' . $type;
        if ($type === 'student') {
            //search booking record of a student
            $stid = array_shift($params);
            require_once 'Db.php';
            $sql = "SELECT * FROM booking";
            if ($stid !== 'ALL') {
                $sql .= " WHERE staffStudentId='" . $stid . "'";
            } 
            //$sql = "SELECT * FROM booking WHERE staffStudentId='" . $stid . "'";            
            echo '<br/>'.$sql.'<br/>';
            $arrResult = array();
            $dbresult = $conn->query($sql);
            if ($dbresult) {
                // records retrieved
                //echo json_decode($dbresult);                
                while ($row = $dbresult->fetch_object()) {
                    //$row['bookingId'];
                    //$row->bookingId;
                    $result = array();
                    $result['bookingId'] = $row->bookingId;                    
                    $result['staffStudentId'] = $row->staffStudentId;
                    $result['staffStudentName'] = $row->staffStudentName;
                    $result['campusId'] = $row->campusId;
                    $result['scheduleDate'] = $row->scheduleDate;

                    $arrResult[] = $result;
                }
                echo json_encode($arrResult);
            } else {
                // retrieval failed
                echo "sql failed";
                exit;
            }

        } elseif ($type === 'campus') {
            //search booking in a campus
            $campid = array_shift($params);
            require_once 'Db.php';
            $sql = "SELECT * FROM booking";
            if ($campid !== 'ALL') {
                $sql .= " WHERE campusId='" . $campid . "'";
            } 
            //$sql = "SELECT * FROM booking WHERE staffStudentId='" . $stid . "'";            
            echo '<br/>'.$sql.'<br/>';
            $arrResult = array();
            $dbresult = $conn->query($sql);
            if ($dbresult) {
                // records retrieved
                //echo json_decode($dbresult);                
                while ($row = $dbresult->fetch_object()) {
                    //$row['bookingId'];
                    //$row->bookingId;
                    $result = array();
                    $result['bookingId'] = $row->bookingId;                    
                    $result['staffStudentId'] = $row->staffStudentId;
                    $result['staffStudentName'] = $row->staffStudentName;
                    $result['campusId'] = $row->campusId;
                    $result['scheduleDate'] = $row->scheduleDate;

                    $arrResult[] = $result;
                }
                echo json_encode($arrResult);
            } else {
                // retrieval failed
                echo "sql failed";
                exit;
            }
        } elseif ($type === 'month') {

        }
    }

    function restPost($params){
        //echo 'Vaccine: restPost';
        $type = array_shift($params);
        if ($type === 'booking') {
            $staffStudentId = array_shift($params);

            require_once('Db.php');
            $sql = "INSERT INTO booking (staffStudentId) " . 
                "VALUES (" . $staffStudentId . ")";
            
        }
    }

    function restPut($params){
        echo 'Vaccine: restPut';
    }

    function restDelete($params){
        echo 'Vaccine: restDelete';
    }

}