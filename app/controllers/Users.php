<?php

class Users extends Controller{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function signup()
    {
        $name = '';
        $email = '';
        $pass = '';
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
            $name =  filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email =  filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
            $this->userModel->signup($name, $email, $pass);
            redirect('index.php?t=1');
        } else {
            redirect('index.php?f=1');
        }
    }
    public function findEmail()
    {
        $email = '';
        if (isset($_POST['email'])) {
            $email  = $_POST['email'];
        }
        $check = $this->userModel->findemail($email);
        $invalid = 'Email Already Exists';
        if ($check) {
            echo $invalid;
            exit;
        }
    }
    public function storeInsession($data){
        session_start();
        $_SESSION['id']= $data['user_id'];
        $_SESSION['name']= $data['user_name'];
    }
    public function logIn()
    {
        $email = '';
        $pass =  '';
        if (isset($_POST['email'])) {
            $email  = $_POST['email'];
            $pass  = $_POST['pass'];
        }
        $data = $this->userModel->login($email);
        if ($email == $data['user_email'] && password_verify($pass, $data['user_password'])) {
            $this->storeInsession($data);
            $role = $data['user_role'];
            switch ($role) {
                case 'ADMIN':
                    $this->view('pages/admindash');
                    break;
                case 'AUTHOR':
                    $this->view('pages/authordash');
                    break;
                default:
                redirect('index.php');
                    break;
            }
        }
    }


    public function addTocat(){
        $catname = '';
        $adminid = 0 ; 
        $img= '';
        if(isset($_POST['name'])&&$_POST['id']&&$_POST['img']){
            $catname = $_POST['name'];
            $adminid = $_POST['id'];
            $img =$_POST['img'];
        }
        $this->userModel->addtocat($catname,$adminid,$img);
    }
    public function displayCategories(){
        $row  = $this->userModel->displaycategories();
        if($row){
            echo json_encode($row);
        }
    }
    public function removecat(){
        
    }
}