<?php

class VaccineService{
    function __construct()
    {
        
    }

    function restGet($params){
        //echo 'Vaccine: restGet';        
        $type = array_shift($params);
        if ($type === 'student') {
            //search booking record of a student
            $stid = array_shift($params)
            
        } elseif ($type === 'campus') {
            //search booking in a campus
        } elseif ($type === 'month') {

        }
    }

    function restPost($params){
        echo 'Vaccine: restPost';
    }

    function restPut($params){
        echo 'Vaccine: restPut';
    }

    function restDelete($params){
        echo 'Vaccine: restDelete';
    }

}