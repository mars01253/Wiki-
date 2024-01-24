<?php

class Tag
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function displaytags()
    {
        $this->db->query('SELECT * FROM tags');
        $this->db->execute();
        $data =  $this->db->resultSet();
        if ($data) {
            return $data;
        }
    }
    public function  displaywikitag($id)
    {
        $this->db->query(' SELECT * FROM wiki_tags inner join tags on wiki_tags.tag_id = tags.tag_id WHERE wiki_id =:id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        $data =  $this->db->resultSet();
        if ($data) {
            return $data;
        }
    }
    public function removetag($arrayofID)
    {
        $this->db->query('DELETE FROM wiki_tags WHERE  tag_id = :id');
        foreach($arrayofID as $tag){
            $this->db->bind(':id', $tag);
            $this->db->execute();
        }
    }
    public function addtag($id, $arrayofIDs)
    {
        $this->db->query('INSERT INTO wiki_tags (wiki_id, tag_id) VALUES (:id, :tag_id)');
        foreach ($arrayofIDs as $tag_id) {
            $this->db->bind(':id', $id);
            $this->db->bind(':tag_id', $tag_id);
            $this->db->execute();
        }
    }
}
