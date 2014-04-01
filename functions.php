<?php
	
	/*
     * Loads the Options Panel
     *
     * If you're loading from a child theme use stylesheet_directory
     * instead of template_directory
     */
    
    define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
    require_once dirname( __FILE__ ) . '/admin/options-framework.php';
    
    /*
     * This is an example of how to add custom scripts to the options panel.
     * This one shows/hides the an option when a checkbox is clicked.
     *
     * You can delete it if you not using that option
     */
    
    add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );
    
    function optionsframework_custom_scripts() { ?>
    
    <script type="text/javascript">
    jQuery(document).ready(function() {
    
    	jQuery('#example_showhidden').click(function() {
      		jQuery('#section-example_text_hidden').fadeToggle(400);
    	});
    
    	if (jQuery('#example_showhidden:checked').val() !== undefined) {
    		jQuery('#section-example_text_hidden').show();
    	}
    
    });
    </script>
    
    <?php
    }
    
	add_filter('show_admin_bar', '__return_false');
	
	
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    add_theme_support( 'post-thumbnails' );
    
    //set_post_thumbnail_size( 672, 372, true );
	//add_image_size( 'twentyfourteen-full-width', 1038, 576, true );
    
    /**************************************************************************************************/

    /******************** Filter Body Class ***********************************************************/
	function _body_classes($classes) {

            if($_GET['lp'] == 1){
            	
		        	$classes[] = 'landing-page';
				
            }
            if(is_single() && $_GET['lp'] != 1 ){
            	$classes[] = 'video-page';
            }
            
            
            if(is_search()){
            	$classes[] = 'search-page';
            	$classes[] = 'video-page';
            }
            
                        
			
	        return $classes;
	}
	add_filter('body_class', '_body_classes');


function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
}



/* add destination post type */

add_action('init', 'destination_register');

function destination_register() {
  $labels = array(
    'name' => _x('Destination', 'post type general name'),
    'singular_name' => _x('Destination', 'post type singular name'),
    'add_new' => _x('Add Destination', ''),
    'add_new_item' => __('Add Destination'),
    'edit_item' => __('Edit Destination'),
    'new_item' => __('New Destination'),
    'view_item' => __('view Destination'),
    'search_items' => __('search Destination'),
    'not_found' =>  __('No Destinations'),
    'not_found_in_trash' => __('no trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'singular_label' => 'Destination',
    'taxonomies' => array('category'),
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug'=>'Destination'),
    'capability_type' => 'post',
    'menu_icon' => '',
    'hierarchical' => false,
    'menu_position' => 4,
    'menu_position' => null,
    'supports' => array('title','editor')
    
    
							
							
  ); 
  register_post_type('destination',$args);
}


/* add member post type */
add_action('init', 'member_register');

function member_register() {
  $labels = array(
    'name' => _x('Members', 'post type general name'),
    'singular_name' => _x('Member', 'post type singular name'),
    'add_new' => _x('Add Member', ''),
    'add_new_item' => __('Add Member'),
    'edit_item' => __('Edit Member'),
    'new_item' => __('New Member'),
    'view_item' => __('View Member'),
    'search_items' => __('Search Member'),
    'not_found' =>  __('No Members'),
    'not_found_in_trash' => __('no trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'singular_label' => 'Member',
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug'=>'member'),
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_icon' => '',
    'menu_position' => 4,
    'menu_position' => null,
    'supports' => array('title','thumbnail','editor')
    
    
							
							
  ); 
  register_post_type('member',$args);
}



 
function add_menu_icons_styles(){
?>
 
<style>
#adminmenu .menu-icon-member div.wp-menu-image:before {
  content: "\f338";
}

#adminmenu .menu-icon-destination div.wp-menu-image:before {
  content: "\f230";
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


/******************** Add Custom Meta Box ***********************************************************/
	
function add_custom_box() {
	if( function_exists( 'add_meta_box' )) {
        add_meta_box( 'inner_custom_box', __( 'Video Details', 'sp'), 'inner_custom_box', 'post','normal', 'high' );
        add_meta_box( 'inner_custom_box_destination', __( 'Destination Details', 'sp'), 'inner_custom_box_destination', 'destination','normal', 'high' );
        add_meta_box( 'inner_custom_box_member', __( 'Member Details', 'sp'), 'inner_custom_box_member', 'member','normal', 'high' );

	}
}



function inner_custom_box_member() {
	global $post;
	
	// Use nonce for verification ... ONLY USE ONCE!
	echo '<input type="hidden" name="sp_noncename" id="sp_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    
    
    echo '<style>.inside div{background:#F3F3F3;padding:2px;margin:2px;}</style>';                          

    
        
    if(get_post_meta($post->ID, 'member_title', true))
		$member_title = get_post_meta($post->ID, 'member_title', true);
	else
		$member_title = '';        
        
        
         
        
    echo "<div style='overflow:hidden;'>";

	echo 'Member title: <input type="text" id="member_title" name="member_title" value="'.$member_title.'" style="width:450px;"><br />';

    
	echo '<br style="clear:both;" /></div>';             

        
}


function save_postdata_member($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['sp_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}
    
    
    
    $mydata['member_title'] = $_POST['member_title'];


    
	foreach ($mydata as $key => $value) { //Let's cycle through the $mydata array!
		if( $post->post_type == 'revision' ) return; //don't store custom data twice
		$value = implode(',', (array)$value); //if $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { //if the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { //if the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); //delete if blank
	}

}    


function inner_custom_box_destination() {
	global $post;
	
	// Use nonce for verification ... ONLY USE ONCE!
	echo '<input type="hidden" name="sp_noncename" id="sp_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    
    
    echo '<style>.inside div{background:#F3F3F3;padding:2px;margin:2px;}</style>';                          

    
    if(get_post_meta($post->ID, 'destination_phone', true))
		$destination_phone = get_post_meta($post->ID, 'destination_phone', true);
	else
		$destination_phone = '';
    
    if(get_post_meta($post->ID, 'destination_url', true))
		$destination_url = get_post_meta($post->ID, 'destination_url', true);
	else
		$destination_url = '';
        
    if(get_post_meta($post->ID, 'destination_url_toshow', true))
		$destination_url_toshow = get_post_meta($post->ID, 'destination_url_toshow', true);
	else
		$destination_url_toshow = '';        
        
    if(get_post_meta($post->ID, 'map_id', true))
		$map_id = get_post_meta($post->ID, 'map_id', true);
	else
		$map_id = '';             
        
        
         
        
    echo "<div style='overflow:hidden;'>";

	echo 'destination phone: <input type="text" id="destination_phone" name="destination_phone" value="'.$destination_phone.'" style="width:450px;"><br />';
    echo 'destination url: <input type="text" id="destination_url" name="destination_url" value="'.$destination_url.'" style="width:450px;"><br />';
    echo 'destination url to show: <input type="text" id="destination_url_toshow" name="destination_url_toshow" value="'.$destination_url_toshow.'" style="width:450px;"><br />';
    echo 'destination map id: <input type="text" id="map_id" name="map_id" value="'.$map_id.'" style="width:450px;"><br /><a href="http://fastandcurious.tv/map/ids.html" target="_blank">take the id from here</a><br />* if not filled, video will not be shown on the map';
    
	echo '<br style="clear:both;" /></div>';             

        
}


function save_postdata_destination($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['sp_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}
    
    
    
    $mydata['destination_phone'] = $_POST['destination_phone'];
    $mydata['destination_url'] = $_POST['destination_url'];
    $mydata['destination_url_toshow'] = $_POST['destination_url_toshow'];
    $mydata['map_id'] = $_POST['map_id'];

    
	foreach ($mydata as $key => $value) { //Let's cycle through the $mydata array!
		if( $post->post_type == 'revision' ) return; //don't store custom data twice
		$value = implode(',', (array)$value); //if $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { //if the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { //if the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); //delete if blank
	}

}    

function inner_custom_box() {
	global $post;
	
	// Use nonce for verification ... ONLY USE ONCE!
	echo '<input type="hidden" name="sp_noncename" id="sp_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    
    
    echo '<style>.inside div{background:#F3F3F3;padding:2px;margin:2px;}</style>';                          

    
    if(get_post_meta($post->ID, 'video_url', true))
		$video_url = get_post_meta($post->ID, 'video_url', true);
	else
		$video_url = ''; 
        
    if(get_post_meta($post->ID, 'map_id', true))
		$map_id = get_post_meta($post->ID, 'map_id', true);
	else
		$map_id = '';        
        
    echo "<div style='overflow:hidden;'>";

	echo 'video url: <input type="text" id="video_url" name="video_url" value="'.$video_url.'" style="width:450px;"><br />';
    echo 'video map id: <input type="text" id="map_id" name="map_id" value="'.$map_id.'" style="width:450px;"><br /><a href="http://fastandcurious.tv/map/ids.html" target="_blank">take the id from here</a><br />* if not filled, video will not be shown on the map';
    
	echo '<br style="clear:both;" /></div>';             

        
}


function save_postdata($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['sp_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}
    
    
    
    $mydata['video_url'] = $_POST['video_url'];
    $mydata['map_id'] = $_POST['map_id'];

    
	foreach ($mydata as $key => $value) { //Let's cycle through the $mydata array!
		if( $post->post_type == 'revision' ) return; //don't store custom data twice
		$value = implode(',', (array)$value); //if $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { //if the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { //if the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); //delete if blank
	}

}    


add_action('admin_menu', 'add_custom_box');
/* Use the save_post action to do something with the data entered */
add_action('save_post', 'save_postdata', 1, 2); // save the custom fields
add_action('save_post', 'save_postdata_destination', 1, 2); // save the custom fields

// -----------------------------------------
// --- End of Saloona Bodeket ----
// -----------------------------------------


?>