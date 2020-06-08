

<?php
include_once ROOT . '/models/Product.php';
  include_once ROOT . '/models/Category.php';

class SiteController{
  
public function actionIndex(){

   $categories = Category::getCategoriesList();
   $latestProducts = Product::getLatestProducts();
$sliderProducts= Product::getRecommendedProducts();

require_once(ROOT.'/views/site/index.php');




    return true;
}





}