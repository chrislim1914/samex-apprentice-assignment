<?php

/**
*  APP CORE CLASS
*  Creates URL & Loads Core Controller
*  URL Format - /controller/method/param1/param2
*/
class Core {
    protected $currentController = 'UsersController'; // Default controller
    protected $currentMethod = 'index'; // Default method
    protected $params = []; // Set initial empty params array

    public function __construct() {
        //get URL
        $newurl = $this->getUrl();

        // set controller
        $controller = $this->getController($newurl);
        // Unset 0 index
        unset($newurl[0]);
        
        // set method
        $method = $this->getMethod($newurl);
        // Unset 0 index
        unset($newurl[1]);

        // get params
        $param = $this->getParams($newurl);

        // Call a callback with an array of parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
 
    /**
     * method to get URL addres using $_GET
     * 
     * @return $url
     */
    private function getUrl() {
        if(isset($_SERVER['REQUEST_URI'])){
            $url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];
            return $url;
        }        
    }

    /**
     * method to get the controller correspond the url
     * 
     * @param $url
     * @return $this->currentController
     */
    private function getController($url) {
        switch ($url[0]) {
            case 'register':
                $this->currentController = ucwords($url[0]).'Controller';
                require_once('../app/controllers/' . $this->currentController . '.php');
                break;  
            default:
                require_once('../app/controllers/' . $this->currentController . '.php');
                break;
        }
        // Instantiate the current controller
        return $this->currentController = new $this->currentController;
    }
    
    /**
     * method to get the method correspond in the url
     * 
     * @param $url
     * @return $this->currentMethod
     */
    private function getMethod($url) {
        if(isset($url[1])){
            // Check if method/function exists in current controller class
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                return $this->currentMethod;
            }
        }
    }

    /**
     * method to get params if there is
     * 
     * @param
     * @return
     */
    private function getParams($url) {
        return $this->params = $url ? array_values($url) : [];
    }
}