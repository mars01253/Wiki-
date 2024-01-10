<?php
class Pages extends Controller
{
    private $userModel;
    public function __construct()
    {
    }
    public function index()
    {
        $data = [
            'title' => 'index',
            'description' => ''
        ];
        $this->view('pages/index', $data);
    }
    public function admin()
    {
       
        $this->view('pages/admindash');
    }
    public function Wiki()
    {
       
        $this->view('pages/Wikis');
    }
    public function stats()
    {
       
        $this->view('pages/adminstats');
    }
    // public function author()
    // {
    //     $data = [
    //         'title' => 'index',
    //         'description' => ''
    //     ];
    //     $this->view('pages/authordash', $data);
    // }
    
}
