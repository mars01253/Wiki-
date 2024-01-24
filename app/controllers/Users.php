<?php

class Users extends Controller
{
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
    public function storeInsession($data)
    {
        session_start();
        $_SESSION['id'] = $data['user_id'];
        $_SESSION['name'] = $data['user_name'];
    }
    public function logIn()
    {
        $email = '';
        $pass =  '';
        $emailtocompare = '';
        $passtocompare = '';
        if (isset($_POST['email'])) {
            $email  = $_POST['email'];
            $pass  = $_POST['pass'];
        }
        $data = $this->userModel->login($email);
        if (isset($data['user_email']) && isset($data['user_password'])) {
            $emailtocompare = $data['user_email'];
            $passtocompare = $data['user_password'];
        }
        if ($email == $emailtocompare && password_verify($pass, $passtocompare)) {
            $this->storeInsession($data);
            $role = $data['user_role'];
            switch ($role) {
                case 'ADMIN':
                    $_SESSION['role'] = $role;
                    $this->view('pages/admindash');
                    break;
                case 'AUTHOR':
                    $_SESSION['role'] = $role;
                    $this->view('pages/authordash');
                    break;
                default:
                    redirect('index.php');
                    break;
            }
        }
        if (!isLogedin()) {
            redirect('pages/index');
        }
    }
    public function displayCategories()
    {
        $row  = $this->userModel->displaycategories();
        if ($row) {
            echo json_encode($row);
        }
    }
    public function removecat()
    {
        $cat_id = 0;
        if (isset($_POST['cat_id'])) {
            $cat_id = $_POST['cat_id'];
        }
        $this->userModel->removecat($cat_id);
    }
    public function updatecat()
    {
        $cat_name = '';
        $cat_id = 0;
        if (isset($_POST['name']) && $_POST['id']) {
            $cat_name = $_POST['name'];
            $cat_id = $_POST['id'];
        }
        $this->userModel->updatecat($cat_id, $cat_name);
    }
    public function addtag()
    {

        if (isset($_POST['tagname'])) {
            $name = $_POST['tagname'];
            $this->userModel->addtag($name);
            $this->view('pages/admindash');
        }
        $this->view('pages/admindash');
    }
    public function checktag()
    {
        $name  = '';
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $result = $this->userModel->checktag($name);
            if ($result) {
                echo "Tag Already Exists!!!";
            }
        }
    }
    public function displaytags()
    {
        $data = $this->userModel->displaytags();
        if ($data) {
            echo json_encode($data);
        }
    }
    public function deletetag()
    {
        $id = 0;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

            $id  = $_POST['id'];
        }
        $this->userModel->deletetag($id);
        $this->view('pages/admindash');
    }
    public function updatetag()
    {
        $id = 0;
        $name = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['name'])) {
            $id  = $_POST['id'];
            $name = $_POST['name'];
        }
        $this->userModel->updatetag($name, $id);
        $this->view('pages/admindash');
    }
    public function logout()
    {
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['role']);
        session_destroy();
        $this->view('pages/index');
    }

    public function search()
    {
        $search = $_POST['search'];
        $data = $this->userModel->search($search);
        echo json_encode($data);
    }
}
