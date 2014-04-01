<?php get_header(); ?>

	   <div id="top_nav">
    		<div class="col1">
    			&nbsp;
    		</div>
    		<div class="col2">
                    <ul>
        				<li class="nav_about">About
                            <ul>
                                <li><a href="<?php echo get_permalink( get_page_by_path( 'about' ) ) ?>">ABOUT US</a></li>
                                <li><a href="<?php echo get_permalink( get_page_by_path( 'terms' ) ) ?>">TERMS OF USE</a></li>
                                <li><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>">CONTACT</a></li>
                                <li><a href="<?php echo get_permalink( get_page_by_path( 'advertise' ) ) ?>">ADVERTISE WITH US</a></li>
                            </ul>
                        </li>
                    </ul>
					
				</div>
				<div class="col3">
                
                    <ul>
        				<li><img src="<?php bloginfo('template_directory'); ?>/img/share.png" class="social_img" />
                            <ul id="social_tooltip">
                                <li><a href="<?php echo of_get_option( 'tw_url', '' );?>"><img src="<?php bloginfo('template_directory'); ?>/img/tt_tw.png" /></a></li>
                                <li><a href="<?php echo of_get_option( 'fb_url', '' );?>"><img src="<?php bloginfo('template_directory'); ?>/img/tt_f.png" /></a></li>
                                
                                <li><a href="<?php echo of_get_option( 'tu_url', '' );?>"><img src="<?php bloginfo('template_directory'); ?>/img/tt_t.png" /></a></li>
                            </ul>
        				</li>
        			</ul>                
                    
				</div>
    	</div>
    	<div id="logo">
    		<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" />
    	</div>
    	
        <?php include (TEMPLATEPATH . '/inc/fc_inner_search.php' ); ?>
    	<span class="searchmsg"> </span>
        <form id="float_search" action="http://www.fastandcurious.tv/wp/redirect.php" method="post">
            

            <input type="text" name="autocomplete" class="float_where" id="autocomplete"/>
    		<button type="submit" title="SEARCH" class="float_bt" name="float_search_sb" ></button>
            <span id="close_bt"><img src="<?php bloginfo('template_directory'); ?>/img/close.jpg" /></span>
    	</form>
        
    

<?php get_footer(); ?>
