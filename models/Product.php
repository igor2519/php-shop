<?php

class Product{
    const SHOW_BY_DEFAULT=2;

public static function  getLatestProducts($count= self::SHOW_BY_DEFAULT){

$db = Db::getConnection();
$query= "SELECT id, name, price, image, is_new FROM product " . "WHERE status='1' " . "ORDER BY id DESC " . "LIMIT $count";

$result = $db->query($query);

$data = $result->fetchAll();

return $data;

}
public static function  getProductsListByCategory($categoryId=false,  $page = 1){

   if($categoryId){

    $offset=($page-1) * self::SHOW_BY_DEFAULT;
    
    $db = Db::getConnection();
    $query= "SELECT id, name, price, image, is_new FROM product " . "WHERE status='1' AND category_id=$categoryId " . "ORDER BY id DESC " . "LIMIT " . self::SHOW_BY_DEFAULT . " OFFSET " . $offset;
    $result = $db->query($query);
    $data = $result->fetchAll();
   

    return $data;
   }
   }
   public static function  getProductById($id){

    if($id){
     $db = Db::getConnection();

     $query= "SELECT * FROM product WHERE id=$id";
     
     $result = $db->query($query);
     
     $data = $result->fetch();
 
     return $data;
    }
    }


    public static function  getTotalProductsInCategory($categoryId){

         $db = Db::getConnection();
    
         $query= "SELECT count(id) AS count FROM product " . "WHERE status = '1' AND category_id = $categoryId";
         
         $result = $db->query($query);
         
         $data = $result->fetch();
     
         return $data["count"];
        
        }

        public static function  getTotalSearch($searchingString){
            $db = Db::getConnection();
   
            $result = $db->query("SELECT count(id) AS count FROM product "
            . "WHERE `name` LIKE '%" . $searchingString . "%'AND status = '1'");
  
            
            
              $result->setFetchMode(PDO::FETCH_ASSOC);
              $row = $result->fetch();

       return $row['count'];
        
      
           
           }
   



        public static function getProductsByIds($idsArray)
        {
            $db = Db::getConnection();
    
            $idsString = implode(',', $idsArray);
    
            $query = "SELECT * FROM product WHERE status = '1' AND id IN ($idsString)";
            $result = $db->query($query);
            $data = $result->fetchAll();
    
            return $data;
        }
        public static function getRecommendedProducts()
        {
            $db = Db::getConnection();
    
           
            $result = $db->query('SELECT id, name, price, is_new FROM product '
                . 'WHERE status = "1" AND is_recommended = "1" '
                . 'ORDER BY id DESC');
         
            $data = $result->fetchAll();
    
            return $data;
        }
        public static function getImage($id)
        {
            $noImage = 'no-image.jpg';
    
            $path = '/upload/images/products/';
    
            $pathToProductImage = $path . $id . '.jpg';
    
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
                return $pathToProductImage;
            }
    
            return $path . $noImage;
        }
        public static function getProductsList()
        {
            $db = Db::getConnection();
    
            $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        
            $data = $result->fetchAll();
    
            return $data;
        }

        public static function deleteProductById($id)
        {
            $db = Db::getConnection();
    
            $sql = 'DELETE FROM product WHERE id = :id';
    
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $result->execute();
        }

        public static function createProduct($options)
    {
        $db = Db::getConnection();

       $sql ="INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES (NULL, :name, :category_id,  :price,:code, :availability, :brand, '   ', :description, :is_new, :is_recommended, :status)";
     
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            
            return $db->lastInsertId();
        }
       
        return 0;
    } 
    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE product
            SET
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                brand = :brand,
                availability = :availability,
                description = :description,
                is_new = :is_new,
                is_recommended = :is_recommended,
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }
    


    public static function       getNewProducts() 
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM product WHERE is_new = 1";
        $result = $db->query($sql);
        $data = $result->fetchAll();

        return  $data ;
    }


    public static function   getTotalNewProducts(){

        $db = Db::getConnection();
   
        $query= "SELECT count(id) AS count FROM product WHERE  is_new = 1";
        
        $result = $db->query($query);
        
        $data = $result->fetch();
    
        return $data["count"];
       
       }



       public static function   getSearchingProducts($searchingString , $page=1){

        $db = Db::getConnection();
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $result = $db->query("SELECT id, name, price,is_new FROM product "
        . "WHERE `name` LIKE '%" . $searchingString . "%'AND status = '1'"
        . "ORDER BY id ASC "
        . "LIMIT " . self::SHOW_BY_DEFAULT
        . ' OFFSET ' . $offset);
    
  
        return  $result->fetchAll();
       
       }









}
