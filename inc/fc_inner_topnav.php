
<div id="inner_top_nav" class="go_right">
	<?php include (TEMPLATEPATH . '/inc/fc_inner_search.php' ); ?>
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
</div>