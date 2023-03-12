<?php


class Login extends Controller
{
    private $uzyt;
    public function __construct(){
        $this->uzyt=$this->model('Loging');
    }
    public function sprawdz () {

        $data = array(
            'email'=>[],
            'login'=>[],
            'password'=>[],
        );


        $this->view('logowanie', $data);
    }

}