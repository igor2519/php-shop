<?php


class AdminBlogController extends AdminBase
{

    public function actionIndex()
    {
        
        self::checkAdmin();
        $productsList = Blog::getBlogsList();

       
        require_once(ROOT . '/views/admin_blog/index.php');
        return true;
    }

   
    public function actionDelete($id)
    {

        self::checkAdmin();

       
        if (isset($_POST['submit'])) {

            
            Blog::deleteBlogById($id);

             header("Location: /admin/blog");
        }

      
        require_once(ROOT . '/views/admin_blog/delete.php');
        return true;
    }

  
    public function actionCreate()
    {
      
        self::checkAdmin();

      

        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['description'] = $_POST['description'];
           

           
            $errors = false;

            
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
               
                $id = Blog::createBlog($options);

              
              

               
                header("Location: /admin/blog");
            }
        }

        // Підключаємо view
        require_once(ROOT . '/views/admin_blog/create.php');
        return true;
    }

  
    public function actionUpdate($id)
    {
        
        self::checkAdmin();

        
      
        
        $product = Blog::getBlogById($id);

       
        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['description'] = $_POST['description'];

            
          

            
            header("Location: /admin/blog");
        }

       
        require_once(ROOT . '/views/admin_blog/update.php');
        return true;
    }
}