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
    public function updatewiki(){
        $title = $_POST['name'];
        $desc = $_POST['article'];
        $img = !empty($_POST['imagehere'])? $_POST['imagehere']:$_POST['img'];
        $id = $_POST['id'];
        $_SESSION['id']= $_POST['userid'];
        $this->wikiModel->updatewiki($title,$desc,$img, $id);
        $this->view('pages/authordash');
       
    }
    public function displaywikitags(){
        $id = $_POST['id'];
        $data = $this->wikiModel->displaywikitags($id);
        echo json_encode($data);
    }
    public function displayallwiki(){
        $data = $this->wikiModel->displayallwiki();
        return $data ; 
    }
    public function displayallwikiadmin(){
        $data = $this->wikiModel->displayallwikiadmin();
        return $data ; 
    }
    public function archivewiki(){
        $id = 0 ; 
        if(isset($_POST['id'])){
            $id = $_POST['id'] ; 
            $this->wikiModel->archivewiki($id);
            $this->view('pages/admindash');
        }
    }
    public function totalwikis(){
        $count = $this->wikiModel->totalwikis();
        return $count ; 
    }
    public function totalauthors(){
        $count = $this->wikiModel->totalauthors();
        return $count ; 
    }
    public function activeuser(){
        $count = $this->wikiModel->activeuser();
        return $count ; 
    }
    public function displaysinglewiki(){
        $id = $_GET['id'];
        $this->view('pages/singlepage');
        return $this->wikiModel->displaysinglewiki($id);
    }
    
}
