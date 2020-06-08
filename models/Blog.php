<?php

class Blog{
    const SHOW_BY_DEFAULTBLOG=2;

public static function  getLatestBlogs($count= self::SHOW_BY_DEFAULT){

$db = Db::getConnection();
$query= "SELECT * FROM blog " . "ORDER BY id DESC " . "LIMIT $count";

$result = $db->query($query);

$data = $result->fetchAll();

return $data;

}

public static function deleteBlogById($id)
{
    $db = Db::getConnection();

    $sql = 'DELETE FROM blog WHERE id = :id';

    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);

    return $result->execute();
}



public static function getBlogsList()
{
    $db = Db::getConnection();

    $result = $db->query('SELECT * FROM blog ORDER BY id ASC');

    $data = $result->fetchAll();

    return $data;
}



   public static function  getBlogById($id){

    if($id){
     $db = Db::getConnection();

     $query= "SELECT * FROM blog WHERE id=$id";
     
     $result = $db->query($query);
     
     $data = $result->fetch();
 
     return $data;
    }
    }



    public static function  getTotalBlogs(){

        $db = Db::getConnection();
   
        $query= "SELECT count(id) AS count FROM blog ";
        
        $result = $db->query($query);
        
        $data = $result->fetch();
    
        return $data["count"];
       
       }


    public static function  getBlogsListByPage($page = 1){

      
     
         $offset=($page-1) * self::SHOW_BY_DEFAULTBLOG;
         
         $db = Db::getConnection();
         $query= "SELECT * FROM blog "  . "ORDER BY id DESC " . "LIMIT " . self::SHOW_BY_DEFAULTBLOG . " OFFSET " . $offset;
         $result = $db->query($query);
         $data = $result->fetchAll();
        
     
         return $data;
        
        }


       

        public static function createBlog($options)
    {
        $db = Db::getConnection();
   $date= date("Y-m-d H:i:s");
//    echo $date;
       $sql ="INSERT INTO `blog` (`id`, `title`, `date`, `description`  ) VALUES (NULL, :title, :date,  :description)";
     
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        if ($result->execute()) {
            
            return $db->lastInsertId();
        }
       
        return 0;
    } 
    
    

    public static function updateBlogById($id, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE product
            SET
                title = :title,
                descripton = :descripton,
              
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':id', $options['id'], PDO::PARAM_STR);

        return $result->execute();
    }
    



}
