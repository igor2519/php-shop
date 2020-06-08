<?php include(ROOT . '/views/layouts/header.php');  ?>




       

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                    <?php include(ROOT . '/views/layouts/left_category_menu.php'); ?>
                    </div>




                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                        
                            <h2 class="title text-center">Последние товары</h2>




                            <?php foreach($categoryProducts as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">


                                            <img src="/template/images/home/product1.jpg" alt="" />


                                            <h2> <?=$product["price"]?>$</h2>



                                            <p>
                                                
                                            <a href="/product/<?=$product["id"]?>">  <?=$product["name"]?></a>
                                            
                                            </p>
                                            <a href="/cart/add/<?=$product["id"]?>" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                            </a>
                                        </div>


                                   <?php if($product["is_new"]):?>

                                    <img src="/template/images/home/new.png" alt="" class="new" />

                                   <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                                   <?php endforeach; ?>

                        </div>
                  
                            <?php echo $pagination->get() ?>

                        
                    </div>
                </div>
            </div>
        </section>

        <?php include(ROOT . '/views/layouts/footer.php');  ?>