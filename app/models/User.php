<?php
class User
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function signup($name, $email, $pass)
    {
        $this->db->query('INSERT INTO users(user_name,user_email,user_password) VALUES(:name , :email , :pass)');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':pass', $pass);
        $this->db->execute();
    }

    public function findemail($email)
    {
        $this->db->query('SELECT user_email FROM users WHERE user_email = :email OR user_email LIKE :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        $data = $this->db->rowCount();
        if ($data > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function login($email)
    {
        $this->db->query('SELECT * FROM users WHERE user_email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        $data = $this->db->single();
        return $data;
    }
    public function addtocat($catname, $adminid, $img)
    {
        $this->db->query('INSERT INTO category(category_name , admin_id,category_img) VALUES(:catname , :adminid,:img)');
        $this->db->bind(':catname', $catname);
        $this->db->bind(':adminid', $adminid);
        $this->db->bind(':img', $img);
        $this->db->execute();
    }

    public function displaycategories()
    {
        $this->db->query('SELECT * FROM category ORDER BY category_date desc ');
        $this->db->execute();
        $row = $this->db->resultSet();
        return $row;
    }

    public function removecat($cat_id)
    {
        $this->db->query('DELETE FROM category WHERE category_id = :cat_id');
        $this->db->bind(':cat_id', $cat_id);
        $this->db->execute();
    }
    public function updatecat($cat_id, $cat_name)
    {
        $this->db->query('UPDATE category SET category_name= :name  WHERE category_id =:id');
        $this->db->bind(':name' ,$cat_name );
        $this->db->bind(':id' ,$cat_id );
        $this->db->execute();
    }
    public function addtag($name){
        $this->db->query('INSERT INTO tags(tag_name) Values(:name)');
        $this->db->bind(':name' , $name);
        $this->db->execute();
    }
    public function checktag($name){
        $this->db->query('SELECT * FROM tags WHERE tag_name =:name');
        $this->db->bind(':name' , $name);
        $this->db->execute();
        $count = $this->db->rowCount();
        if($count>0){
            return true;
        }else{
            return false ; 
        }
    }
    public function displaytags(){
        $this->db->query('SELECT * FROM tags');
        $this->db->execute();
        $data = $this->db->resultSet();
        return $data ; 
    }
    public function deletetag($id){
        $this->db->query('DELETE FROM tags WHERE tag_id = :id');
        $this->db->bind(':id' , $id);
        $this->db->execute();
    }
    public function updatetag($name , $id){
        $this->db->query('UPDATE tags SET tag_name = :name WHERE tag_id = :id');
        $this->db->bind(':name' , $name);
        $this->db->bind(':id' , $id);
        $this->db->execute();
    }
}
