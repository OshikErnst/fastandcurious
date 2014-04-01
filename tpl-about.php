<?php 
/* Template Name: About Us Page */
?>
<?php get_header(); ?>

	<div id="inner_wrapper">
				<div id="inner_top">
					<div id="inner_logo">
                    	<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/inner_logo.png" /></a>
                    </div>
                    <?php include (TEMPLATEPATH . '/inc/fc_inner_topnav.php' ); ?>
                    
                    <div id="inner_top_text">
                        <h2>ABOUT US</h2>
                        
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
                		<?php the_content(); ?>
                
                		<?php endwhile; endif; ?>
                        
                    </div>
					
				</div>
				
                <div id="inner_bottom">
                
                <?php
                    $args = array(
                    'posts_per_page' => 4,
                    'post_type' => 'member',
                    
                );
            
          
    			$members = new WP_Query($args);
                    if($members->have_posts() ) : ?>
                        <?php while( $members->have_posts() ) : 
                            $members->the_post(); 
                            global $post_id,$post;?>
					<div class="person">
                        <?php $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id_rel), 'large');?>
                        <img src="<?php echo $thumb_image_url[0]; ?>" width="250px" height="176px" />
                        <div class="person_info">
                            <h2><?php the_title(); ?></h2>
                            <h3><?php echo get_post_meta(get_the_ID(),'member_title',true);?></h3>
                        </div>
                        <div class="person_text">
                            <?php the_content(); ?>
                        </div>
                    </div>
					<?php endwhile;?>
                <?php endif; ?>
				</div>
			</div>

<?php get_footer(); ?>
