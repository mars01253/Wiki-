<?php
class Wiki
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function insertwiki($title, $desc, $img, $author, $category)
    {
        $this->db->query('INSERT INTO wikis(wiki_title,wiki_description,wiki_img,wiki_author,wiki_category) VALUES(:title , :description , :img , :author ,:category)');
        $this->db->bind('title', $title);
        $this->db->bind('description', $desc);
        $this->db->bind('img', $img);
        $this->db->bind('author', $author);
        $this->db->bind('category', $category);
        $this->db->execute();
        return $this->db->lastInsertId();
    }
    public function display($id)
    {
        $this->db->query('SELECT * FROM wikis inner join users on wikis.wiki_author = users.user_id inner join category
        on wikis.wiki_category = category.category_id WHERE wiki_author = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        $data = $this->db->resultSet();
        if ($data) {
            return $data;
        }
    }
    public function deletewiki($id)
    {
        $this->db->query('DELETE FROM wikis WHERE wiki_id =:id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function inserttag($wikiid, $tagid)
    {
        $this->db->query('INSERT INTO wiki_tags VALUES(:wikiid , :tag_id)');
        $this->db->bind('wikiid', $wikiid);
        $this->db->bind('tag_id', $tagid);
        $this->db->execute();
    }
    public function updatewiki($title, $desc, $img, $id)
    {
        $this->db->query('UPDATE wikis SET wiki_title=:title, wiki_description=:desc, wiki_img=:img WHERE wiki_id=:id');
        $this->db->bind(':title', $title);
        $this->db->bind(':desc', $desc);
        $this->db->bind(':img', $img);
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function displaywikitags($id)
    {
        $this->db->query('SELECT * FROM wiki_tags inner join tags on wiki_tags.tag_id = tags.tag_id  WHERE wiki_id = :id ');
        $this->db->bind(':id', $id);
        $this->db->execute();
        $data =  $this->db->resultSet();
        return $data ? $data : null;
    }
    public function displayallwiki()
    {
        $this->db->query('SELECT * FROM wikis inner join users on wikis.wiki_author = users.user_id inner join category
        on wikis.wiki_category = category.category_id  WHERE archive = 0  ORDER BY wiki_date desc limit 3 ');
        $this->db->execute();
        $data = $this->db->resultSet();
        if ($data) {
            return $data;
        }
    }
    public function displayallwikiadmin()
    {
        $this->db->query('SELECT * FROM wikis inner join users on wikis.wiki_author = users.user_id inner join category
        on wikis.wiki_category = category.category_id  ORDER BY wiki_date desc ');
        $this->db->execute();
        $data = $this->db->resultSet();
        if ($data) {
            return $data;
        }
    }
    public function archivewiki($id)
    {
        $this->db->query('UPDATE wikis SET archive = 1  WHERE wiki_id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function totalwiki()
    {
        $this->db->query('SELECT COUNT(*) FROM wikis');
        $this->db->execute();
        $result = $this->db->single();
        $count = $result['COUNT(*)'];
        return $count;
    }
    public function totalauthors()
    {
        $this->db->query('SELECT COUNT(*) as count FROM users WHERE user_role = :role');
        $this->db->bind(':role', 'AUTHOR');
        $this->db->execute();
        $result = $this->db->single();
        $count = $result['count'];
        return $count;
    }
    public function activeuser()
    {
        $this->db->query('SELECT users.user_id, users.user_name, COUNT(wikis.wiki_id) as wiki_count
                          FROM users
                          LEFT JOIN wikis ON users.user_id = wikis.wiki_author
                          GROUP BY users.user_id
                          ORDER BY wiki_count DESC
                          LIMIT 1');

        $this->db->execute();
        $result = $this->db->single();
        return $result['user_name'];
    }
    public function displaysinglewiki($id){
        $this->db->query('SELECT * FROM wikis inner join users on wikis.wiki_author = users.user_id inner join category
        on wikis.wiki_category = category.category_id  WHERE archive = 0 AND wiki_id = :id ');
        $this->db->bind(':id' , $id);
        $this->db->execute();
        return $this->db->single();
    }
}
