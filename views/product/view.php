<?php include(ROOT . '/views/layouts/header.php');  ?>
<?php
echo $_POST['ProductCount'];

?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                  
                    <?php include(ROOT . '/views/layouts/left_category_menu.php'); ?>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="/template/images/product-details/1.jpg" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                        <h2><?=$product["name"]?></h2>
                                        <p>Код товара: <?=$product["code"]?> </p>
                                        <span>
                                            <span>US $<?=$product["price"] ?></span>
                                            <br>
                                            <br>
                                            <br>
                                          
                                          

                                            <!-- <form action="ROOT . '/views/product/ method="post">
                                            <label>Количество:</label> <input type="number" name ="ProductCount" value="1" />
                                            <br>
                                            <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                             </form> -->
                                             <a href="/cart/add/<?=$product['id'] ?>/1" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>



                                           
                                        </span>
                                        <p><b>Наличие:</b> 
                                        <?php if($product["status"])
                                                echo "На складе";
                                              else
                                                echo "Нет в наличии";
                                        ?>
                                        </p>

                                        <p><b>Состояние:</b> Новое</p>
                                        <p><b>Производитель:</b> <?=$product["brand"]?> </p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                    <p><?=$product["description"]?></p>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
        

        <br/>
        <br/>
        <?php include(ROOT . '/views/layouts/footer.php');  ?>