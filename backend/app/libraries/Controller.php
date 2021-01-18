<?php

class Controller {
    
    /**
     * method to load model
     * 
     * @param $model
     * @return new $model
     */
    public function model($model){
        // Require model file
        require_once '../app/models/' . $model . '.php';
        // Instantiate model
        return new $model();
    }
}
