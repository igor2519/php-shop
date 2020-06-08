	<!-- CATEGORY-MENU-LIST START -->
    <div class="left-category-menu ">
	                        <div class="left-product-cat">
	                            <div class="category-heading">
	                                <h2>categories</h2>
	                            </div>
	                            <div class="category-menu-list">
	                                <ul>
	                                    <!-- Single menu start -->
	                                  
                                        <?php foreach($categories as $categoryItem): ?>
                                   

                                            <li class="arrow-plus">
                                            <a href="/category/<?= $categoryItem['id'] ?>">
                                   <?= $categoryItem['name'] ?>
	                                    </li>
                                 
                                   </a>
                                
                       <?php endforeach; ?>
	                                    

	                               
	                                   
	                                    <!-- MENU ACCORDION END -->
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- END CATEGORY-MENU-LIST -->