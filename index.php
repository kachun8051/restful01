<?php

//require_once('StudentService.php');

class Controller {

    private $service;
    private $parameters;

    function __construct()
    {
        if (!isset($_SERVER['PATH_INFO']) or $_SERVER['PATH_INFO']=='/' ){
            echo 'Missing parameters';
        } else {
            
            //echo $_SERVER['PATH_INFO'];
            $pathSegments = explode('/', $_SERVER['PATH_INFO']);
            array_shift($pathSegments);
            
            $resourceName = array_shift($pathSegments);
            $serviceName = ucfirst($resourceName).'Service';
            $serviceNameFilename = ucfirst($serviceName).'.php';
            if (!file_exists($serviceNameFilename)){
                echo 'resource ' . $serviceNameFilename . ' not found';
                exit;
            }
            //echo $serviceNameFilename . '<br/>';
            //echo $resourceName . '<br/>';
            //echo json_encode( $pathSegments);
            //require_once($serviceNameFilename);
            require_once("VaccineService.php");
            //$this->service = new $serviceName; //dynamic binding
            $this->service = new VaccineService();
            //$this->service = new StudentService();
            $this->parameters = $pathSegments;
              
            /*          
            $pathSegments = explode('/', $_SERVER['PATH_INFO']);
            require_once("VaccineService.php");
            $objSvr = new VaccineService();            
            $objSvr->restGet($pathSegments);
            */
        }        
    }

    function run(){
        $method = $_SERVER['REQUEST_METHOD'];
        echo 'request_method: ' . $method . '<br/>';
        $method = ucfirst(strtolower($method));
        $method = 'rest'.$method;
        echo 'method variable: ' . $method . '<br/>';
        $params = explode('/', $_SERVER['PATH_INFO']);
        array_shift($params);
        $this->service->$method($params);
    }
}

$controller = new Controller();
$controller->run();
