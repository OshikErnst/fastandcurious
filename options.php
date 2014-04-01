<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
    
    
    // Pull all the videos from where category into an array
	$options_videos_where = array();
	$options_videos_obj_where = get_posts('cat=1&post_type=post');
	$options_videos_where[''] = 'Select a video:';
	foreach ($options_videos_obj_where as $video_where) {
		$options_videos_where[$video_where->ID] = $video_where->post_title;
	}
    
    // Pull all the destinations from where category into an array
	$options_dest_where = array();
	$options_dest_obj_where = get_posts('cat=1&post_type=destination');
	$options_dest_where[''] = 'Select a destination:';
	foreach ($options_dest_obj_where as $dest_where) {
		$options_dest_where[$dest_where->ID] = $dest_where->post_title;
	}
    
    // Pull all the videos from when category into an array
	$options_videos_when = array();
	$options_videos_obj_when = get_posts('cat=2&post_type=post');
	$options_videos_when[''] = 'Select a video:';
	foreach ($options_videos_obj_when as $video_when) {
		$options_videos_when[$video_when->ID] = $video_when->post_title;
	}
    
    // Pull all the destinations from when category into an array
	$options_dest_when = array();
	$options_dest_obj_when = get_posts('cat=1&post_type=destination');
	$options_dest_when[''] = 'Select a destination:';
	foreach ($options_dest_obj_when as $dest_when) {
		$options_dest_when[$dest_when->ID] = $dest_when->post_title;
	}
    
    // Pull all the videos from how category into an array
	$options_videos_how = array();
	$options_videos_obj_how = get_posts('cat=3&post_type=post');
	$options_videos_how[''] = 'Select a video:';
	foreach ($options_videos_obj_how as $video_how) {
		$options_videos_how[$video_how->ID] = $video_how->post_title;
	}
    
    // Pull all the destinations from how category into an array
	$options_dest_how = array();
	$options_dest_obj_how = get_posts('cat=1&post_type=destination');
	$options_dest_how[''] = 'Select a destination:';
	foreach ($options_dest_obj_how as $dest_how) {
		$options_dest_how[$dest_how->ID] = $dest_how->post_title;
	}
    
    // Pull all the videos from what category into an array
	$options_videos_what = array();
	$options_videos_obj_what = get_posts('cat=4&post_type=post');
	$options_videos_what[''] = 'Select a video:';
	foreach ($options_videos_obj_what as $video_what) {
		$options_videos_what[$video_what->ID] = $video_what->post_title;
	}
    
    // Pull all the destinations from what category into an array
	$options_dest_what = array();
	$options_dest_obj_what = get_posts('cat=1&post_type=destination');
	$options_dest_what[''] = 'Select a destination:';
	foreach ($options_dest_obj_what as $dest_what) {
		$options_dest_what[$dest_what->ID] = $dest_what->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook URL', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'fb_url',
		'std' => '',

		'type' => 'text');
        
    $options[] = array(
		'name' => __('Twitter URL', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'tw_url',
		'std' => '',

		'type' => 'text');   
        
    $options[] = array(
		'name' => __('Tumblr URL', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'tu_url',
		'std' => '',

		'type' => 'text');        
        
        
    $options[] = array(
		'name' => __('Contact Email', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'contact_email',
		'std' => '',

		'type' => 'text');           


    // edit where category
	$options[] = array(
		'name' => __('Where Page', 'options_framework_theme'),
		'type' => 'heading');


    if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Video - 1', 'options_framework_theme'),
		
		'id' => 'where_video_1',
		'type' => 'select',
		'options' => $options_videos_where);
        
    $options[] = array(
		'name' => __('Select a Video - 2', 'options_framework_theme'),
		
		'id' => 'where_video_2',
		'type' => 'select',
		'options' => $options_videos_where);
        
        
    $options[] = array(
		'name' => __('Select a Video - 3', 'options_framework_theme'),
		
		'id' => 'where_video_3',
		'type' => 'select',
		'options' => $options_videos_where);
        
    $options[] = array(
		'name' => __('Select a Video - 4', 'options_framework_theme'),
		
		'id' => 'where_video_4',
		'type' => 'select',
		'options' => $options_videos_where);
        
    $options[] = array(
		'name' => __('Select a Video - 5', 'options_framework_theme'),
		
		'id' => 'where_video_5',
		'type' => 'select',
		'options' => $options_videos_where);                                
    
    $options[] = array(
		'name' => __('Select a Destination', 'options_framework_theme'),
		
		'id' => 'where_dest',
		'type' => 'select',
		'options' => $options_dest_where);                                
	}





    // edit when category
	$options[] = array(
		'name' => __('When Page', 'options_framework_theme'),
		'type' => 'heading');


    if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Video - 1', 'options_framework_theme'),
		
		'id' => 'when_video_1',
		'type' => 'select',
		'options' => $options_videos_when);
        
    $options[] = array(
		'name' => __('Select a Video - 2', 'options_framework_theme'),
		
		'id' => 'when_video_2',
		'type' => 'select',
		'options' => $options_videos_when);
        
        
    $options[] = array(
		'name' => __('Select a Video - 3', 'options_framework_theme'),
		
		'id' => 'when_video_3',
		'type' => 'select',
		'options' => $options_videos_when);
        
    $options[] = array(
		'name' => __('Select a Video - 4', 'options_framework_theme'),
		
		'id' => 'when_video_4',
		'type' => 'select',
		'options' => $options_videos_when);
        
    $options[] = array(
		'name' => __('Select a Video - 5', 'options_framework_theme'),
		
		'id' => 'when_video_5',
		'type' => 'select',
		'options' => $options_videos_when); 
        
    $options[] = array(
		'name' => __('Select a Destination', 'options_framework_theme'),
		
		'id' => 'when_dest',
		'type' => 'select',
		'options' => $options_dest_when);                                        
	}
    
    
    
    
    // edit how category
	$options[] = array(
		'name' => __('How Page', 'options_framework_theme'),
		'type' => 'heading');


    if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Video - 1', 'options_framework_theme'),
		
		'id' => 'how_video_1',
		'type' => 'select',
		'options' => $options_videos_how);
        
    $options[] = array(
		'name' => __('Select a Video - 2', 'options_framework_theme'),
		
		'id' => 'how_video_2',
		'type' => 'select',
		'options' => $options_videos_how);
        
        
    $options[] = array(
		'name' => __('Select a Video - 3', 'options_framework_theme'),
		
		'id' => 'how_video_3',
		'type' => 'select',
		'options' => $options_videos_how);
        
    $options[] = array(
		'name' => __('Select a Video - 4', 'options_framework_theme'),
		
		'id' => 'how_video_4',
		'type' => 'select',
		'options' => $options_videos_how);
        
    $options[] = array(
		'name' => __('Select a Video - 5', 'options_framework_theme'),
		
		'id' => 'how_video_5',
		'type' => 'select',
		'options' => $options_videos_how);  
        
   $options[] = array(
		'name' => __('Select a Destination', 'options_framework_theme'),
		
		'id' => 'how_dest',
		'type' => 'select',
		'options' => $options_dest_how);                                         
	}    


    // edit what category
	$options[] = array(
		'name' => __('What Page', 'options_framework_theme'),
		'type' => 'heading');


    if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Video - 1', 'options_framework_theme'),
		
		'id' => 'what_video_1',
		'type' => 'select',
		'options' => $options_videos_what);
        
    $options[] = array(
		'name' => __('Select a Video - 2', 'options_framework_theme'),
		
		'id' => 'what_video_2',
		'type' => 'select',
		'options' => $options_videos_what);
        
        
    $options[] = array(
		'name' => __('Select a Video - 3', 'options_framework_theme'),
		
		'id' => 'what_video_3',
		'type' => 'select',
		'options' => $options_videos_what);
        
    $options[] = array(
		'name' => __('Select a Video - 4', 'options_framework_theme'),
		
		'id' => 'what_video_4',
		'type' => 'select',
		'options' => $options_videos_what);
        
    $options[] = array(
		'name' => __('Select a Video - 5', 'options_framework_theme'),
		
		'id' => 'what_video_5',
		'type' => 'select',
		'options' => $options_videos_what);     
        
   $options[] = array(
		'name' => __('Select a Destination', 'options_framework_theme'),
		
		'id' => 'what_dest',
		'type' => 'select',
		'options' => $options_dest_what);                                       
	}    
             
	

	return $options;
}