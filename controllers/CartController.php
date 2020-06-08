<?php

class CartController
{
    public function actionAdd($id , $count)
    {
      
        Cart::addProduct($id , $count);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

  
    public function actionAddAjax($id)
    {
   
       echo Cart::addProduct($id);

        return true;
    }

  
    public function actionDelete($id)
    {
       
        Cart::deleteProduct($id);

        
        header("Locatuon: /cart");
    }


    
    public function actionIndex()
    {
       $categories = Category::getCategoriesList();
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
           
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        // Підключаємо view
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    
    public function actionCheckout()
    {

        $categories = Category::getCategoriesList();
       
        $result = false;

       
        if (isset($_POST['submit'])) {
           

           
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            
            $userComment = $_POST['userComment'];

           
            $errors = false;
            if (!User::checkName($userName)) {
                $errors[] = "Не правильне ім'я";
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = "Не правильний телефон";
            }

            
            if ($errors == false) {
                
                $productsInCard = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = false;
                }
                 else {
                    $userId = User::checkLogged();
                }

               
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCard);

                if ($result) {
                    
                    // $adminEmail = 'admin@gmail.com';
                    // $message = 'http://http://';
                    // $subject = "Нове замовлення";
                    
                    // mail($adminEmail, $subject, $message);

                    
                    Cart::clear();
                }
            } 
            else {
                
                $productsInCard = Cart::getProducts();
                $productsIds = array_keys($productsInCard);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        } 
        else {
            
            $productsInCard = Cart::getProducts();

            if ($productsInCard == false) {
                
                header("Location: /");
            } 
            
            else {
               
                $productsIds = array_keys($productsInCard);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;

               
                if (User::isGuest()) {
                    
                } 
                
                else {
                   
                 
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);

                   
                    $userName = $user['name'];
                    // $userPhone = $user['phone'];
                }
            }
        }

        
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}