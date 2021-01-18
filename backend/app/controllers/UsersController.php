<?php

class UsersController extends Controller{
  
    public function __construct(){
      $this->usersModel = $this->model('Users');
    }

    public function index() {
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([
            'message' => 'The Server is running!!!',
            'result'    => true
        ]);
    }
    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Takes raw data from the request
            $jsondata = file_get_contents('php://input');

            // Converts it into a PHP object
            $data = json_decode($jsondata, true);

            $send = $this->usersModel->addUser($data);

            if($send) {
                echo json_encode([
                    'message' => 'Sending data to webhook successful...',
                    'result'    => true
                ]);
            } else {
                echo json_encode([
                    'message' => 'Cannot send data to webhook...',
                    'result'    => false
                ]);
            }
  
        } else {
            echo json_encode([
                'message' => 'Cannot perform GET request...',
                'result'    => false
            ]);
        }
    }
}
