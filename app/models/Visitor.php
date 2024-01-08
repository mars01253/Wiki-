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
    
    public function findemail($email){
        $this->db->query('SELECT user_email FROM users WHERE user_email = :email');
        $this->db->bind(':email' , $email);
        $this->db->execute();
        $data = $this->db->single();
        if($data){
            return true ; 
        }else{
            return false ; 
        }
        
    }
}