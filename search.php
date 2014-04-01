<?php 
/* Template Name: Results Page */
?>
<?php get_header(); 
echo 'hereeeeee' . $_POST['autocomplete'];
?>

<div id="inner_wrapper">
	<div id="sidebar">
		<div id="inner_logo">
        	<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/inner_logo.png" /></a>
        </div>
		<div id="text_items_box">
			<div class="item_box">
				<h2 class="item_box_title">
					DESTINATION TITLE
				</h2>
				<p class="item_box_text">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. 1500s, when an unknown printer took a galley of type and scrambled it to make a type
				</p>
				<p class="item_box_details">
					Tel: +972-3-502695553 | www.kerensoref.com
				</p>
			</div>
			<div class="item_box">
				<h2 class="item_box_title">
					DESTINATION TITLE
				</h2>
				<p class="item_box_text">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. 1500s, when an unknown printer took a galley of type and scrambled it to make a type
				</p>
				<p class="item_box_details">
					Tel: +972-3-502695553 | www.kerensoref.com
				</p>
			</div>
            <div class="item_box">
				<h2 class="item_box_title">
					DESTINATION TITLE
				</h2>
				<p class="item_box_text">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. 1500s, when an unknown printer took a galley of type and scrambled it to make a type
				</p>
				<p class="item_box_details">
					Tel: +972-3-502695553 | www.kerensoref.com
				</p>
			</div>
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
			<script type='text/javascript'>
				
						
					window.hiro = {
					externalID: "UnBlocker-Web-Default",
                    subExternalID: "${PUBLISHERID}",
       
					width: '710',
					height: '400', 
					player: "videoplayer",
					Flowplayer_License_key:"#$61eae733c4e1ce5e314",
					userInitiate:true,               
					noPrerollUserInitiate : false,    
					splashImg : "http://unblocker.youtab.me/wp-content/uploads/2014/02/Marcel-Dzama-1.jpg"
					   };
					   window.hiro.playList = [{"url":"http://p.ejoni574.hiromedia2.netdna-cdn.com/vod/ejoni574.hiromedia2/UN/CTV_18_Marcel_Dzama_QuickTime_H.264.mp4","customProperties":{
                        videoTitle : "His Dark Twisted Fantasy",videoDescription : "Macabre master Marcel Dzama finds his inspiration in the small hours of the night listening to the radio or books on tape ",videoKeyWords : "",videoTags : "Art",videoDurationSecs : "60"
                        }}];
				
			
			
			</script>
			<script src='http://tag.unblocker.hiro.tv/premium/scripts/hiro_dynamic_player.js?config=conf1' type='text/javascript'>
				
			
			</script>
			<div id="video_data">
				<h2>
					A LONG VIDEO RELATED TITLE
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
			<div id="video_text">
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only
					five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
					more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing typesetting industry. 1500s, when an unknown printer
					took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised
					in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>
			</div>
			<div id="video_related">
				<ul>
					<li>
						<a href="#">
						<img width="174" height="123" src="<?php bloginfo('template_directory'); ?>/img/related.jpg" class="" alt="" /><h3>This is related 1</h3>
						</a>
					</li>
                    <li>
						<a href="#">
						<img width="174" height="123" src="<?php bloginfo('template_directory'); ?>/img/related2.jpg" class="" alt="" /><h3>This is related 2</h3>
						</a>
					</li>
                    <li>
						<a href="#">
						<img width="174" height="123" src="<?php bloginfo('template_directory'); ?>/img/related.jpg" class="" alt="" /><h3>This is related 3</h3>
						</a>
					</li>
                    <li>
						<a href="#">
						<img width="174" height="123" src="<?php bloginfo('template_directory'); ?>/img/related2.jpg" class="" alt="" /><h3>This is related 4</h3>
						</a>
					</li>
                    <li>
						<a href="#">
						<img width="174" height="123" src="<?php bloginfo('template_directory'); ?>/img/related.jpg" class="" alt="" /><h3>This is related 5</h3>
						</a>
					</li>
                    <li>
						<a href="#">
						<img width="174" height="123" src="<?php bloginfo('template_directory'); ?>/img/related2.jpg" class="" alt="" /><h3>This is related 6 This is related 6</h3>
						</a>
					</li>
					
					
				</ul>
                 <a id="prev" class="prev" href="#"><img src="<?php bloginfo('template_directory'); ?>/img/arrow_left.png" /></a>
                 <a id="next" class="next" href="#"><img src="<?php bloginfo('template_directory'); ?>/img/arrow_right.png" /></a>
			</div>
		</div>
	</div>
</div>
	


<?php get_footer(); ?>