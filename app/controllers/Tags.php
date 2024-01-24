<?php

class Tags extends Controller
{
    private $tagModel;
    public function __construct()
    {
        $this->tagModel = $this->model('Tag');
    }
    public function displayTags()
    {
        $data = $this->tagModel->displaytags();
        echo json_encode($data);
        return $data;
    }
    public function displayeditTags()
    {
        $data = $this->tagModel->displaytags();
        return $data;
    }
    public function displaywikitags()
    {
        $id = 0;
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $data = $this->tagModel->displaywikitag($id);
        echo json_encode($data);
    }
    public function removetagsedit()
    {
        $id = 0;
        $arrayofID = [];
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            if (isset($_POST['arrayofID'])) {
                $arrayofID = json_decode($_POST['arrayofID']);
                $this->tagModel->removetag($arrayofID);
            }
        }
    }
    public function addtagsedit()
    {
        $id = 0;
        $arrayofIDs = [];
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            if (isset($_POST['arrayofIDs'])) {
                $arrayofIDs = json_decode($_POST['arrayofIDs']);
                $this->tagModel->addtag($id,$arrayofIDs);
            }
        }
    }
}
