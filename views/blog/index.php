<?php include(ROOT . '/views/layouts/header.php');  ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                    <?php include(ROOT . '/views/layouts/left_category_menu.php'); ?>


                    </div>





                         
                                <div class="col-sm-9">
                        <div class="blog-post-area">
                            <h2 class="title text-center">Последние записи в блоге</h2>
                            <?php foreach($AllBlogs  as $blogs): ?>
                            <div class="single-blog-post">
                                <h3><?=$blogs["title"]?></h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i><?= substr($blogs["date"], 0, 10)?></li>
                                        <li><i class="fa fa-clock-o"></i> <?= substr($blogs["date"],10)?></li>
                                    </ul>
                                </div>
                               
                                <p><?=$blogs["description"]?></p>
                                <a  class="btn btn-primary" href="">Читать полностью</a>
                            </div>
                            <hr>
                           
                          
                            
                            <?php endforeach; ?>
                        </div>
                 
                            <?php echo $pagination->get() ?>

                        
               
            </div>
        </section>
        <?php include(ROOT . '/views/layouts/footer.php');  ?>