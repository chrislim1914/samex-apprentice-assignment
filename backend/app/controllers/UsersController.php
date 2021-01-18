<?php

class UsersController extends Controller{
  
    public function __construct(){
      $this->usersModel = $this->model('Users');
    }

    public function index() {
        return json_encode([
            'message' => 'get this!'
        ]);
    }
}
