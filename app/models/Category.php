<?php
class Category
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
public function displayoptions(){
    $this->db->query('SELECT * FROM category');
    $this->db->execute();
    $data = $this->db->resultSet();
    if($data){
        return $data;
    }
}

}