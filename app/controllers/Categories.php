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
    
}