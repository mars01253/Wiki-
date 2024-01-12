<?php

class Wikis extends Controller
{
    private $wikiModel;
    public function __construct()
    {
        $this->wikiModel = $this->model('Wiki');
    }
    public function insertwiki()
    {
        $title  = '';
        $desc = '';
        $img = '';
        $author = 0;
        $category = 0;
        if (isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['img']) && isset($_POST['category']) && isset($_POST['authorid'])) {
            $title  = $_POST['title'];
            $desc = $_POST['desc'];
            $img = $_POST['img'];
            $author = $_POST['authorid'];
            $category = $_POST['category'];
        }
        $data = $this->wikiModel->insertwiki($title,$desc,$img,$author,$category);
        echo $data;
    }
    public function display($id){
        $data = $this->wikiModel->display($id);
        return $data ; 
    }
    public function deletewiki(){
        $id = $_POST['id'];
        $this->wikiModel->deletewiki($id);
    }
}
