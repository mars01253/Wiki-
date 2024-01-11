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
}
