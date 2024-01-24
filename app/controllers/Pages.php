<?php
class Pages extends Controller
{
    private $userModel;
    public function __construct()
    {
    }
    public function index()
    {
        if (isset($_POST['id']) && isset($_POST['role'])) {
            $_SESSION['role'] = $_POST['role'];
            $_SESSION['id'] = $_POST['userid'];
        }
        $this->view('pages/index');
    }
    public function admin()
    {
        if (isset($_SESSION['id']) && $_SESSION['role'] == 'ADMIN') {
            $this->view('pages/admindash');
        } else {
            $this->view('pages/index');
        }
    }
    public function Wiki()
    {

        $this->view('pages/Wikis');
    }
    public function stats()
    {

        $this->view('pages/adminstats');
    }
    public function author()
    {
        if (isset($_POST['userid']))
            $_SESSION['id'] = $_POST['userid'];
        if (isset($_SESSION['id'])) {
            $this->view('pages/authordash');
        } else {
            $this->view('pages/index');
        }
    }
}
