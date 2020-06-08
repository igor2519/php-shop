<?php include(ROOT . '/views/layouts/header.php'); ?>

        <section>
           		<!-- Category slider area start -->
		<div class="category-slider-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
					<?php include(ROOT . '/views/layouts/left_category_menu.php'); ?>


        


	                </div>
	                <div class="col-md-9">
                		<!-- slider -->
						<div class="slider-area">
							<div class="bend niceties preview-1">
								<div id="ensign-nivoslider" class="slides">	
									<img src="/template/img/sliders/slider-1/bg1.jpg" alt="Malias" title="#slider-direction-1"/>
				 					<img src="/template/img/sliders/slider-1/bg2.jpg" alt="Malias" title="#slider-direction-2"/>
									<img src="/template/img/sliders/slider-1/bg3.jpg" alt="Malias" title="#slider-direction-3"/><!-- 
									<img src="img/sliders/slider-1/bg4.jpg" alt="" title="#slider-direction-4"/>  -->     
								</div>
								<!-- direction 1 -->
								<div id="slider-direction-1" class="t-lfr slider-direction">
									<div class="slider-progress"></div>
									<!-- layer 1 -->
									<div class="layer-1-1 ">
										<h1 class="title1">LUMIA 888 DESIGN</h1>
									</div>
									<!-- layer 2 -->
									<div class="layer-1-2">
										<p class="title2">Elegant design for business</p>
									</div>
									<!-- layer 3 -->
									<div class="layer-1-3">
										<h2 class="title3">$966.82</h2>
									</div>
									<!-- layer 4 -->
									<div class="layer-1-4">
										<a href="#" class="title4">shopping now</a>
									</div>
								</div>
								<!-- direction 2 -->
								<div id="slider-direction-2" class="slider-direction">
									<div class="slider-progress"></div>
									<!-- layer 1 -->
									<div class="layer-2-1">
										<h1 class="title1">WATERPROOF SMARTPHONE</h1>
									</div>
									<!-- layer 2 -->
									<div class="layer-2-2">
										<p class="title2">RODUCTS ARE EYE-CATCHING DESIGN. YOU CAN TAKE PHOTOS EVEN WHEN Y</p>
									</div>
									<!-- layer 3 -->
									<div class="layer-2-3">
										<a href="#" class="title3">shopping now</a>
									</div>
								</div>
								<!-- direction 3 -->
								<div id="slider-direction-3" class="slider-direction">
									<div class="slider-progress"></div>
									<!-- layer 1 -->
									<div class="layer-3-1">
										<h2 class="title1">BUY AIR LACOTE</h2>
									</div>
									<!-- layer 2 -->
									<div class="layer-3-2">
										<h1 class="title2">SUPER TABLET, SUPER GIFT</h1>
									</div>
									<!-- layer 3 -->
									 <div class="layer-3-3">
										<p class="title3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
									</div>
									<!-- layer 4 -->
									<div class="layer-3-4">
										<a href="#" class="title4">shopping now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- slider end-->
	                </div>
	            </div>
			</div>
		</div>
        <!-- Category slider area End -->








        <br>
        <div class="row">
                    <div class="col-sm-12 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            
                            <?php foreach($latestProducts as $product): ?>
                            
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/product1.jpg" alt="" />
                                                <h2><?= $product["price"] ?></h2>
                                                <p>
                                                    <a href="/product/<?= $product['id'] ?>"> 
                                                        <?= $product['name'] ?>
                                                    </a>
                                                </p>
                                                <a href="/cart/add/<?=$product['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if($product["is_new"]): ?>
                                                <img src="/template/images/home/new.png" alt="" class="new" />
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                  
                    

                        </div><!--features_items-->
                        </div>
                        <div class="col-sm-12 padding-right">
                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Рекомендуемые товары</h2>
                            <div class="cycle-slideshow" 
                             data-cycle-fx=carousel
                             data-cycle-timeout=5000
                             data-cycle-carousel-visible=3
                             data-cycle-carousel-fluid=true
                             data-cycle-slides="div.item"
                             data-cycle-prev="#prev"
                             data-cycle-next="#next"
                             >                        
                                <?php foreach ($sliderProducts as $sliderItem): ?>
                                    <div class="item">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                            <div class="productinfo text-center">
                                                    <img src="<?php echo Product::getImage($sliderItem['id']); ?>" alt="" />
                                                    <h2>$<?php echo $sliderItem['price']; ?></h2>
                                                    <a href="/product/<?php echo $sliderItem['id']; ?>">
                                                        <?php echo $sliderItem['name']; ?>
                                                    </a>
                                                    <br/><br/>
                                                    <a href="/cart/add/<?=$sliderItem['id']?>" ; class="btn btn-default add-to-cart" data-id="<?php echo $sliderItem['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                </div>
                                                <?php if ($sliderItem['is_new']): ?>
                                                    <img src="/template/images/home/new.png" class="new" alt="" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                            </div>
                            
                        </div> <!--recommended_items-->
                        
                    </div>
                </div>
            </div>
            </div>
        </section>


        <?php include(ROOT . '/views/layouts/footer.php'); ?>







