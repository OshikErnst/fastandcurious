<?php get_header(); ?>
		<div id="inner_wrapper">
			<div id="sidebar">
				<div id="inner_logo">
                	<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/inner_logo.png" /></a>
                </div>
				<div id="text_items_box_cat">
                    <?php 
                    
                    $dest_1 = get_post(of_get_option( 'where_dest', '' ));
                        
                        $id_dest = $dest_1->ID;
                        $title_dest = $dest_1->post_title;
                        $content_dest = $dest_1->post_content;
                    ?>
					<div class="item_box_cat">
						<h2 class="item_box_cat_title">
							<?php echo $title_dest;?>
						</h2>
						<p class="item_box_cat_text">
							<?php echo $content_dest;?>
						</p>
						<p class="item_box_cat_details">
							Tel: <?php echo get_post_meta($id_dest,'destination_phone',true);?> | <a href="<?php echo get_post_meta($id_dest,'destination_url',true);?>"><?php echo get_post_meta($id_dest,'destination_url_toshow',true);?></a>
						</p>
					</div>
				</div>
				<div id="companion">
					<img src="<?php bloginfo('template_directory'); ?>/img/ad.jpg" />
				</div>
			</div>
			<div id="content">
				<?php include (TEMPLATEPATH . '/inc/fc_inner_topnav.php' ); ?>
				<div id="inner_content">
					<div id="videoplayer" class="hiro"></div>
                    <?php 
                        $video_1 = get_post(of_get_option( 'where_video_1', '' )); 
                        
                        $id_1 = $video_1->ID;
                        $title_1 = $video_1->post_title;
                        $content_1 = $video_1->post_content;
                        $content_1 = preg_replace( '/\s+/', ' ', $content_1 );
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
					<div id="video_data" class="video_data_cat">
						<h2>
							<?php echo $title_1;?>
						</h2>
						<ul>
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
								<a class="google_plus" href="https://plus.google.com/share?url={URL}" onclick="google_plus(this);return false;"><img src="<?php bloginfo('template_directory'); ?>/img/icon_google.png" /></a>
							</li>
							<li>
								<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer');"
								class="facebook" onclick="facebook1(this); return false;"><img src="<?php bloginfo('template_directory'); ?>/img/icon_facebook.png" /></a>
							</li>
							<li>
								<a href="http://twitter.com/home?status=<?php rawurlencode('Currently reading ' . the_permalink(false)); ?>" onclick="goclicky(this); return false;" class="twitter" target='_blank'><img src="<?php bloginfo('template_directory'); ?>/img/icon_twitter.png" /></a>
							</li>
						</ul>
					</div>
					<div id="video_text" class="video_text_cat">
						<p>
							<?php echo $content_1;?>
						</p>
					</div>
					<div id="video_related_cat">
						<ul>
                        
                            <?php 
                            
                            for($i=2;$i<6;$i++){
                                
                                
                                $video_rel = get_post(of_get_option( 'where_video_'.$i, '' )); 
                        
                                $id_rel = $video_rel->ID;
                                $title_rel = $video_rel->post_title;
                                $url_rel = get_permalink($id_rel);
                                
                                

                            ?>
                        
							<li>
								<a href="<?php echo $url_rel; ?>">
                                <?php $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id_rel), 'thumbnail');?>

								<img width="174" height="123" src="<?php echo $thumb_image_url[0]; ?>" class="" alt="" /><h3><?php echo $title_rel; ?></h3>
								</a>
							</li>
                            <?php } ?>

						</ul>
					</div>
				</div>
			</div>
		</div>

<?php get_footer(); ?>
