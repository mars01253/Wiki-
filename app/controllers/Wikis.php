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
        $wikiid = $this->wikiModel->insertwiki($title,$desc,$img,$author,$category);
        if($_POST['tagid']){
            $arrayofID = json_decode($_POST['tagid']);
            $tagid = $arrayofID ;
            for ($i=0; $i <count($tagid) ; $i++) { 
                $this->wikiModel->inserttag($wikiid ,$tagid[$i][0]);
            }
        }
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
