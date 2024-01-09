<?php
class User{
    protected $db ; 
        public function __construct()
        {
            $this->db = new Database;
        }
        public function signup($name, $email , $pass){
            $this->db->query('INSERT INTO users(user_name,user_email,user_password) VALUES(:name , :email , :pass)');
            $this->db->bind(':name' , $name);
            $this->db->bind(':email' , $email);
            $this->db->bind(':pass' , $pass);
            $this->db->execute();
        }
        
        public function findemail($email){
            $this->db->query('SELECT user_email FROM users WHERE user_email = :email OR user_email LIKE :email');
            $this->db->bind(':email' , $email);
            $this->db->execute();
            $data = $this->db->rowCount();
            if($data>0){
                return true ; 
            }else{
                return false ; 
            }
            
        }
        public function login($email){
            $this->db->query('SELECT * FROM users WHERE user_email = :email');
            $this->db->bind(':email' , $email);
            $this->db->execute();
            $data = $this->db->single();
            return $data ; 
        }
        public function addtocat($catname,$adminid, $img){
            $this->db->query('INSERT INTO category(category_name , admin_id,category_img) VALUES(:catname , :adminid,:img)');
            $this->db->bind(':catname' , $catname);
            $this->db->bind(':adminid' , $adminid);
            $this->db->bind(':img' , $img);
            $this->db->execute();
        }

        public function displaycategories(){
            $this->db->query('SELECT * FROM category ORDER BY category_date desc ');
            $this->db->execute();
            $row = $this->db->resultSet();
            return $row ; 
        }

        public function removecat($cat_id){
            $this->db->query('DELETE FROM category WHERE category_id = :cat_id');
            $this->db->bind(':cat_id' ,$cat_id );
            $this->db->execute();
        }
}

