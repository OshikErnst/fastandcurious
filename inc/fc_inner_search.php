<form id="search"  action="http://www.fastandcurious.tv/wp/redirect.php" method="post">
				<div id="<?php if(!is_front_page()){echo 'inner_search_area';}else{echo 'search_area'; }?>">
					<ul id="nav">
						<li>
							<a href="<?php echo get_category_link( 1 ); ?>"><input type="text" class="where_field" name="where_field" id="where_field" placeholder="WHERE" disabled /><input type="hidden" name="where_value" id="where_value" /></a>
							<ul>
                            
                                <?php 
                                    //$where_categories = get_categories('parent=1'); 
                                    $where_categories = get_categories('parent=1&hide_empty=0');
                                    if ($where_categories){
                                    foreach ($where_categories as $where_category) {?>
								<li>
									<a href="#"><?php echo $where_category->cat_name;?></a>
									<?php 
                                    $categories_con = get_categories('child_of='.$where_category->cat_ID); 
                                    if ($categories_con){?> 
                                    <ul>
                                    <?php  foreach ($categories_con as $category_con) {?>
                                    
										<li>
											<a href="#" id="<?php echo $category_con->cat_ID;?>" rel="<?php echo $category_con->cat_name;?>"><?php echo $category_con->cat_name;?></a>
										</li>
                                    <?php } ?>
									</ul>
                                    <?php } ?>
								</li>
                                    <?php } ?>
									
                                <?php } ?>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo get_category_link( 2 ); ?>"><input type="text" class="when_field" name="when_field" id="when_field" placeholder="WHEN" disabled /><input type="hidden" name="when_value" id="when_value" /></a>
							<ul>
                            
                                <?php 
                                    
                                    $when_categories = get_categories('child_of=2'); 

                                    if ($when_categories){
                                    foreach ($when_categories as $when_category) {?>
                                    
                                    <li>
										<a href="#" id="<?php echo $when_category->cat_ID;?>" rel="<?php echo $when_category->cat_name;?>"><?php echo $when_category->cat_name;?></a>
									</li>
									<?php } ?>
                                <?php } ?>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo get_category_link( 3 ); ?>"><input type="text" class="how_field" name="how_field" id="how_field" placeholder="HOW" disabled /><input type="hidden" name="how_value" id="how_value" /></a>
							<ul>
                            
                                <?php 
                                    
                                    $how_categories = get_categories('child_of=3'); 
                                    if ($how_categories){
                                    foreach ($how_categories as $how_category) {?>
                                    
                                    <li>
										<a href="#" id="<?php echo $how_category->cat_ID;?>" rel="<?php echo $how_category->cat_name;?>"><?php echo $how_category->cat_name;?></a>
									</li>
									<?php } ?>
                                <?php } ?>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo get_category_link( 4 ); ?>"><input type="text" class="what_field" name="what_field" id="what_field" placeholder="WHAT" disabled /><input type="hidden" name="what_value" id="what_value" /></a>
							<ul>
                            
                                <?php 
                                    
                                    $what_categories = get_categories('child_of=4'); 
                                    if ($what_categories){
                                    foreach ($what_categories as $what_category) {?>
                                    
                                    <li>
										<a href="#" id="<?php echo $what_category->cat_ID;?>" rel="<?php echo $what_category->cat_name;?>"><?php echo $what_category->cat_name;?></a>
									</li>
									<?php } ?>
                                <?php } ?>
								</li>
							</ul>
						</li>
					</ul>
					<button type="submit" title="GO" class="search_bt" name="search_bt" ></button>
				</div>
			</form>