<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	
    	<?php if (is_search()) { ?>
    	   <meta name="robots" content="noindex, nofollow" /> 
    	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
    <?php if (is_front_page()){ ?>
    
    
    
    <div id="map">
        <ul class="points">

            
            <?php
            
              
            query_posts( array(
             'post_type' => array( 'post', 'destination' ),
             'meta_key' => 'map_id' )
             );
            
            
            // The Loop
            while ( have_posts() ) : the_post();?>
                <li id="<?php echo get_post_meta(get_the_ID(),'map_id',true);?>">
                   <a href="<?php the_permalink();?>">
                       <point_header><?php the_title();?></point_header>
                   </a>
            	</li>
            <?php endwhile;
            
            // Reset Query
            wp_reset_query();
            
            ?>
            
        </ul>
    
    </div>
    
    
    <?php } ?>
    
		<div id="wrapper" <?php if(!is_front_page()) { echo 'class="inner_bg"';} ?>>

