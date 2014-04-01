<?php get_header(); ?>
<?php if(have_posts()) : the_post(); 
global $post,$post_id; ?>
<div id="inner_wrapper">
	<div id="sidebar">
		<div id="inner_logo">
        	<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/inner_logo.png" /></a>
        </div>
		<div id="text_items_box">
         <?php 
         $post_categories = wp_get_post_categories( get_the_ID() );

            
            
            //This post categories
            	
            foreach($post_categories as $c){
            	$cat = get_category( $c );
                $cats_toarray .= "$cat->term_id,";
            }
            $cats_toarray = substr($cats_toarray, 0, -1);
            
            
            
            $args = array(
                    'posts_per_page' => 3,
                    'post_type' => 'destination',
                    'cat' => $cats_toarray,
                    'orderby' => 'rand',

                    
                );
            
          
			$dest_info = new WP_Query($args);
                if($dest_info->have_posts() ) : ?>
                    <?php while( $dest_info->have_posts() ) : 
                        $dest_info->the_post(); 
                        global $post_id,$post;?>
                    <div class="item_box">
        				<h2 class="item_box_title">
        					<?php the_title(); ?>
        				</h2>
        				<p class="item_box_text">
        					<?php echo $post->post_content; ?>
        				</p>
        				<p class="item_box_details">
        					Tel: <?php echo get_post_meta(get_the_ID(),'destination_phone',true);?> | <a href="<?php echo get_post_meta(get_the_ID(),'destination_url',true);?>"><?php echo get_post_meta(get_the_ID(),'destination_url_toshow',true);?></a>
        				</p>
        			</div>
                    <?php endwhile;?>
                <?php endif; ?>
		</div>
		<div id="companion" class="companion_video">
			<img src="<?php bloginfo('template_directory'); ?>/img/ad.jpg" />
		</div>
	</div>
	<div id="content">
		
		<?php include (TEMPLATEPATH . '/inc/fc_inner_topnav.php' ); ?>
		
		<div id="inner_content">
			<div id="videoplayer" class="hiro">
			</div>
			<?php

            wp_reset_query(); 
             
                        
                        $video_1 = get_the_ID(); 
                        
                        $id_1 = $video_1->ID;
                        $title_1 = $video_1->post_title;
                        $content_1 = $video_1->post_content;
                        $content_1 = preg_replace( '/\s+/', ' ', $content_1 );
                        $content_1 = strip_tags($content_1);
                        
                        $current_video = $post->ID;
                        $post__not_in = array();
                        $post__not_in[] = $current_video;
                        ?> 
                        <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id_1), 'large');?>
					   <script type='text/javascript'>
				        var splimg  = "<?php echo $large_image_url[0]; ?>";
						
    					window.hiro = {
    					externalID: "UnBlocker-Web-Default",
                        subExternalID: "${PUBLISHERID}",
           
    					width: '710',
    					height: '400', 
    					player: "videoplayer",
    					Flowplayer_License_key:"#$61eae733c4e1ce5e314",
    					userInitiate:true,               
    					noPrerollUserInitiate : false,    
    					splashImg : splimg
                        
    					   };
    					   window.hiro.playList = [{"url":"<?php echo get_post_meta(get_the_ID(),'video_url',true);?>","customProperties":{
                            videoTitle : "<?php echo $title_1;?>",videoDescription : "<?php echo $content_1;?>",videoKeyWords : "",videoTags : "<?php 
                            $posttags = get_the_tags($id_1);
                            if ($posttags) {
                              foreach($posttags as $tag) {
                                echo $tag->name; 
                              }
                            }
                            ?>",videoDurationSecs : ""                                                                                
                        }}]; 
    				
    			
    			
    			     </script>
			<script src='http://tag.unblocker.hiro.tv/premium/scripts/hiro_dynamic_player.js?config=conf1' type='text/javascript'>
				
			
			</script>
			<div id="video_data">
				<h2>
					<?php the_title(); ?>
				</h2>
				<ul>
                
                
                    <?php $thumbID = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'large' ) ; 
						?>
						
						<?php
                            $title=urlencode(get_the_title(get_the_ID()));
                            $url=urlencode(get_permalink(get_the_ID()));
                            $summary=strip_tags(get_the_excerpt(get_the_ID()));
                            
                        ?>
                
					<script>
						
					//var myWindow;
					function goclicky(meh)
						{
							var x = screen.width/2 - 700/2;
							var y = screen.height/2 - 350/2;
							window.open(meh.href, 'sharegplus','height=385,width=700,left='+x+',top='+y);
						}
					function google_plus(href_g)
					{
							var x = screen.width/2 - 700/2;
							var y = screen.height/2 - 350/2;
							window.open(href_g.href,'fdgfddf','height=385,width=700,left='+x+',top='+y);
					}
					function tumblr1(tum)
					{
							var x = screen.width/2 - 700/2;
							var y = screen.height/2 - 350/2;
							window.open(tum,'ghfghgf','height=385,width=700,left='+x+',top='+y);
					}
					function facebook1(face)
					{
							var x = screen.width/2 - 700/2;
							var y = screen.height/2 - 350/2;
							window.open(face,'fdgfd','height=385,width=700,left='+x+',top='+y);
					}
					
					</script>
                    
					<li>
						<a class="tumbler" href="http://www.tumblr.com/share/photo?source=<?php echo urlencode ($thumbID[0]) ?>&caption=<?php echo urlencode(get_the_title())?>&clickthru=<?php echo urlencode (get_permalink()) ?>"
						onclick="tumblr1(this.href); return false;"><img src="<?php bloginfo('template_directory'); ?>/img/icon_tumblr.png" /></a>
					</li>
					<li>
						<a class="google_plus" href="https://plus.google.com/share?url={<?php echo get_permalink(get_the_ID()); ?>}" onclick="google_plus(this);return false;"><img src="<?php bloginfo('template_directory'); ?>/img/icon_google.png" /></a>
					</li>
					<li>
						<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo get_the_title(get_the_ID())?>&amp;p[summary]=<?php echo get_the_excerpt(get_the_ID());?>&amp;p[url]=<?php echo get_permalink(get_the_ID()); ?>&amp;&p[images][0]=<?php echo $large_image_url[0];?>', 'sharer');" class="facebook" onclick="facebook1(this); return false;"><img src="<?php bloginfo('template_directory'); ?>/img/icon_facebook.png" /></a>
					</li>
					<li>
						<a href="http://twitter.com/home?status=<?php rawurlencode('Currently reading ' . the_permalink(false)); ?>" onclick="goclicky(this); return false;" class="twitter" target='_blank'><img src="<?php bloginfo('template_directory'); ?>/img/icon_twitter.png" /></a>
					</li>
				</ul>
			</div>
			<div id="video_text">
				<p>
					<?php the_content(); ?>
				</p>
			</div>
			<div id="video_related">
				<ul>
                    <?php
                   
                    $args = array(
                                'posts_per_page' => -1,
                                'cat' => $cats_toarray,
                                'post__not_in'   => $post__not_in
                            );
                            
                    query_posts($args);
                    
        			while ( have_posts() ) : the_post();?>
    					<li>
    						<a href="<?php the_permalink(); ?>">
                            <?php $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'large');?>
    						<img width="174" height="123" src="<?php echo $thumb_image_url[0]; ?>" class="" alt="" /><h3><?php the_title(); ?></h3>
    						</a>
    					</li>
                        <?php endwhile;?>
					
					
				</ul>
                 <a id="prev" class="prev" href="#"><img src="<?php bloginfo('template_directory'); ?>/img/arrow_left.png" /></a>
                 <a id="next" class="next" href="#"><img src="<?php bloginfo('template_directory'); ?>/img/arrow_right.png" /></a>
			</div>
		</div>
	</div>
</div>
	

<?php endif; ?>
<?php get_footer(); ?>