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
public function latestcat(){
    $this->db->query('SELECT * FROM category order by category_date desc limit 1');
    $this->db->execute();
    $data = $this->db->single();
    if($data){
        return $data ; 
    }
}
public function addtocat($catname, $adminid)
    {
        $this->db->query('INSERT INTO category(category_name , admin_id) VALUES(:catname , :adminid)');
        $this->db->bind(':catname', $catname);
        $this->db->bind(':adminid', $adminid);
        $this->db->execute();
    }

}