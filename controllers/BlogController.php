    <?php
include_once ROOT . '/components/Pagination.php';
 include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Blog.php';
 
class blogController{
  
    public function actionIndex($page='page-1'){
       $page = substr($page, 5);
     
        $categories = Category::getCategoriesList();
        $AllBlogs  = Blog::getBlogsListByPage($page);    


        $total=Blog::getTotalBlogs();
        $pagination= new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/blog/index.php');
     
         return true;
     }

    
    }