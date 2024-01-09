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
    // public function admin()
    // {
    //     $data = [
    //         'title' => 'index',
    //         'description' => ''
    //     ];
    //     $this->view('pages/admindash', $data);
    // }
    // public function author()
    // {
    //     $data = [
    //         'title' => 'index',
    //         'description' => ''
    //     ];
    //     $this->view('pages/authordash', $data);
    // }
}
