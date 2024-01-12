<?php
class Wiki
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function insertwiki($title , $desc , $img , $author , $category){
        $this->db->query('INSERT INTO wikis(wiki_title,wiki_description,wiki_img,wiki_author,wiki_category) VALUES(:title , :description , :img , :author ,:category)');
        $this->db->bind('title' ,$title);
        $this->db->bind('description' ,$desc);
        $this->db->bind('img' ,$img);
        $this->db->bind('author' ,$author);
        $this->db->bind('category' , $category);
        $this->db->execute();
        return $this->db->lastInsertId();
    }
    public function display($id){
        $this->db->query('SELECT * FROM wikis WHERE wiki_author = :id');
        $this->db->bind(':id' , $id);
        $this->db->execute();
        $data = $this->db->resultSet();
        if($data){
            return $data ;
        }
    }
    public function deletewiki($id){
        $this->db->query('DELETE FROM wikis WHERE wiki_id =:id');
        $this->db->bind(':id' , $id);
        $this->db->execute();
    }
}