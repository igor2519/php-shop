<?php

 
class SearchController{
  
   


    public function actionIndex($page=1){
        if($page!=1)
        {
            $page =substr($page, 5);
        }
        if(isset($_POST['searchText']))
        {
            $_SESSION['searchText'] =$_POST['searchText'];
        }
        if(isset( $_SESSION['searchText'])){
        $categories = Category::getCategoriesList();

        $total=Product::getTotalSearch( $_SESSION['searchText']);

        $latestProducts = Product::getSearchingProducts( $_SESSION['searchText'] ,$page );
   $pagination= new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
    require_once(ROOT.'/views/catalog/search.php');
        }
        return true;
    }
   

    
    }