<?php 
/* Template Name: Advertise Page */
?>
<?php get_header(); ?>

	<div id="inner_wrapper">
				<div id="inner_top">
					<div id="inner_logo">
                    	<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/inner_logo.png" /></a>
                    </div>
                    <?php include (TEMPLATEPATH . '/inc/fc_inner_topnav.php' ); ?>
                    
                    
                    <div id="inner_top_text">
                        <h2>ADVERTISE WITH US</h2>
                    </div>
					
				</div>
				<div id="inner_bottom">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
            		<?php the_content(); ?>
            
            		<?php endwhile; endif; ?>
				</div>
			</div>

<?php get_footer(); ?>
