		<?php if (!is_front_page()){?>
        <div id="footer">
			partnered with <img src="<?php bloginfo('template_directory'); ?>/img/watchmojo.png" />
		</div>
        <?php } ?>

	</div>

	<?php wp_footer(); ?>
	
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-2.0.0.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>
    
    <?php if (!is_front_page()){ ?>    
    <link href="<?php bloginfo('template_directory'); ?>/js/perfect-scrollbar.css" rel="stylesheet" />
        
                
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.mousewheel.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/perfect-scrollbar.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.carouFredSel.js"></script>
    <?php } ?>    
    
    <?php if (is_front_page()){ ?>    
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/raphael-min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pixelmap-min.js"></script>
    <?php } ?>
            
     <style>
   
    .autocomplete-suggestions{background:#16f8d5;border-color:#16f8d5;border-radius: 0!important;font-family:"Conv_BebasNeue Regular";font-size:18px;}
    .autocomplete-suggestions {max-height: 100px;overflow-y: auto;overflow-x: hidden;}
    * html .autocomplete-suggestions {height: 100px;} 
    .autocomplete-suggestion{padding-left:15px;color:#102542;cursor:pointer;}
    .autocomplete-suggestion strong{font-weight:normal!important;}	
    .autocomplete-selected{color:#f78c56;}		
    
    #text_items_box .ps-scrollbar-y{background:#fffa5e;}
    #video_text .ps-scrollbar-y{background:#36bbca;}
    
    .video_text_cat .ps-scrollbar-y{background:#dee35d!important;}
    .person_text .ps-scrollbar-y{background:#f78c56;}
    </style>
    		
		      
    <script>
    			
    $( "#nav a" ).click(function() {
    
      $(this).parents("li").find(":text").val( $(this).attr('rel'));

        switch($(this).parents("li").find(":text").attr('name'))
        {
        case "where_field":
            var elem = document.getElementById("where_value");
            elem.value = $(this).attr('rel');
          break;
        case "when_field":
            var elem = document.getElementById("when_value");
            elem.value = $(this).attr('rel');
          break;
        case "how_field":
            var elem = document.getElementById("how_value");
            elem.value = $(this).attr('rel');
          break;
        case "what_field":
            var elem = document.getElementById("what_value");
            elem.value = $(this).attr('rel');
          break;
        }     
        
    });
    
  
    
    $( '#close_bt').click(function() {
    
      $('#float_search').fadeOut();
    
    });
    
    $(" .float_where ").focus(function() {
      $(" .float_where ").css('background-image','url(<?php bloginfo('template_directory'); ?>/img/field_bg_blank.png)');
    });
    $(" .float_where ").focusout(function() {
      if($(" .float_where ").val() == ''){
      $(" .float_where ").css('background-image','url(<?php bloginfo('template_directory'); ?>/img/field_bg.png)');
      }
    });
    
    
    
    <?php if (!is_front_page()){?>
    $('#video_text').perfectScrollbar();
        $('#text_items_box').perfectScrollbar();
        $('.item_box_cat_text').perfectScrollbar();
        $('.person_text').perfectScrollbar();


        $('#video_related ul').carouFredSel({
            items: 4,
	        prev: '#prev',
	        next: '#next',
            
	        auto: false,
	        scroll: 1000,
            swipe : {
			     onTouch : true
		      },
	       
        });
    <?php } ?>
        
        <?php if (!is_front_page()){ ?>        
        if ((window.innerHeight<=730)){
            
            $('#text_items_box').css('height' , '130px');
            
            $('.companion_video').css('margin-top' , '185px');
            
            $('#video_text').css('height' , '20px');
            
            $('#video_related').css('margin-top' , '48px');
        
        }
        <?php } ?>        
        
        </script>
        
        <?php if (is_front_page()){ ?>
        
        
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/autocomplete/jquery.autocomplete.js"></script>
        <script>
        var countries = {
            <?php $autocomplete_categories = get_categories('exclude=1,2,3,4');
              if ($autocomplete_categories){
              foreach ($autocomplete_categories as $autocat) { ?>
              "<?php echo $autocat->cat_ID;?>": "<?php echo $autocat->cat_name;?>",
                            
              <?php } ?>
              <?php } ?>    
              
              }    
        var countriesArr = [
          <?php $autocomplete_categories = get_categories('exclude=1,2,3,4');
          if ($autocomplete_categories){
          foreach ($autocomplete_categories as $autocat) { ?>
          "<?php echo $autocat->cat_name;?>",              
          <?php } ?>
          <?php } ?>          
         
        ];  
        </script>
        <script>
        
        
        $(function () {
            'use strict';
        
            var countriesArray = $.map(countries, function (value, key) { return { value: value, data: key }; });
        
            // Setup jQuery ajax mock:
            $.mockjax({
                url: '*',
                responseTime: 2000,
                response: function (settings) {
                    var query = settings.data.query,
                        queryLowerCase = query.toLowerCase(),
                        re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi'),
                        suggestions = $.grep(countriesArray, function (country) {
                             // return country.value.toLowerCase().indexOf(queryLowerCase) === 0;
                            return re.test(country.value);
                        }),
                        response = {
                            query: query,
                            suggestions: suggestions
                        };
        
                    this.responseText = JSON.stringify(response);
                }
            });


        // Initialize autocomplete with local lookup:
        $('#autocomplete').autocomplete({
            lookup: countriesArray,
            minChars: 1,
            onSelect: function (suggestion) {
                //
            }
        });
        
        
        
        
    
        $( "#float_search" ).submit(function(  ) {
            
            
          if($.inArray( $(" #autocomplete ").val(), countriesArr) == -1 ){
            
            $( ".searchmsg" ).text( "Not a valid item!" ).show().fadeOut( 2000 );
            $(" #autocomplete ").focus();
            return false;
          }
         
          
          
        });
    
    
    });
        
   
      
        $('#map').pixelmap({ 
			point_shape:'rect',
			c_bg:'transparent',
			c_deadPoint:'#015d58',
			c_hotPoint: "#fff",			
			c_hotPointOver: "#ff0000",
			pointW:4,
			pointH:4,
			offsetW:3,
			offsetH:3,
			pointS:1.5,
			cw:1000,
			ch:500,
			rad:6,
			slideshow:false,
			tooltip_delay:150,
			tt_off:3,
			b_t1:true,
			c_tierOne:'#666'
			
		});
        <?php } ?>
		
		</script>
	<!-- analytics -->
	
</body>

</html>
