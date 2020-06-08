<?php
class Cart
{
  
    public static function addProduct($id , $count)
    {
       
        $productsInCart = array();

        if (isset($_SESSION['products'])) {
           
            $productsInCart = $_SESSION['products'];
        }

       
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]+=$count;
        } 
        else {
           
            $productsInCart[$id] = $count;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

  
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } 
        else {
            return 0;
        }
    }

 
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

  
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }


  
    public static function getTotalPriceSecond()
    {


        $productsInCart = self::getProducts();
        if($productsInCart){
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsByIds($productsIds);
    
        $totalPrice = self::getTotalPrice($products);
    

        return    $totalPrice;
        

        }
        else {return 0;}
    }





    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    
    public static function deleteProduct($id)
    {
       
        $productsInCart = self::getProducts();

        
        unset($productsInCart[$id]);

       
        $_SESSION['products'] = $productsInCart;
    }
}