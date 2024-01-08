<?php
require_once(__DIR__ . '/User.php'); 
class Visitor extends User {
    
    public function signup($name, $email , $pass){
        $this->db->query('INSERT INTO users(user_name,user_email,user_password) VALUES(:name , :email , :pass)');
        $this->db->bind(':name' , $name);
        $this->db->bind(':email' , $email);
        $this->db->bind(':pass' , $pass);
        $this->db->execute();
    }
    
}