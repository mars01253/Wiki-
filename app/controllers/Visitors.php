<?php

class Visitors extends Controller {
    private $visitorModel ; 
    public function __construct()
    {
        $this->visitorModel = $this->model('Visitor');
    }
    public function signup(){
    $name = '';
    $email = '';
    $pass = '';
    if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['pass'])){
        $name =  filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email =  filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pass = password_hash($_POST['pass'] , PASSWORD_BCRYPT);
        $this->visitorModel->signup($name,$email,$pass);
        redirect('index.php?t=1');  
    }else{

        redirect('index.php?f=1');  
    }
    }

}