<?php

class Categories extends Controller
{
    private $categoryModel;
    public function __construct()
    {
        $this->categoryModel = $this->model('Category');
    }
    public function displayoptions(){
        $data = $this->categoryModel->displayoptions();
        echo json_encode($data); 
    }
    public function latestcat(){
        $result = $this->categoryModel->latestcat();
        return $result ;
    }
    public function addTocat()
    {
        $catname = '';
        $adminid = 0;
        if (!empty($_POST['name']) && !empty($_POST['id'])) {
            $catname = $_POST['name'];
            $adminid = $_POST['id'];
            $this->categoryModel->addtocat($catname, $adminid);
        }
    }
}