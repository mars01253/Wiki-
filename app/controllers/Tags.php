<?php

class tags extends Controller
{
    private $tagModel;
    public function __construct()
    {
        $this->tagModel = $this->model('Tag');
    }
    public function displayTags(){
        $data = $this->tagModel->displaytags();
        echo json_encode($data);
    }
}