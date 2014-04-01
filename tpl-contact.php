<?php 
/* Template Name: Contact Us Page */
?>
<?php get_header(); ?>
<?php
        global $smof_data;
        if (isset($_POST['submitted'])) {
         //response generation function
          $response = "";
         
          //function to generate response
          function my_contact_form_generate_response($type, $message){
         
            global $response;
         
            if($type == "success") {
                $response = "<div class='success'>{$message}</div>";
                unset($_POST['contact_name']);
                unset($_POST['contact_email']);
                unset($_POST['contact_phone']);
                unset($_POST['contact_comment']);
            }
            else $response = "<div class='error'>{$message}</div>";
         
          }
          
          $missing_content = "Please supply all information.";
          $email_invalid   = "Email Address Invalid.";
          $message_unsent  = "Message was not sent. Try Again.";
          $message_sent    = "Thanks! Your message has been sent.";
          
          $name =  $_POST['contact_name'];
          $email = $_POST['contact_email'];
          $phone = $_POST['contact_phone'];
          $message = $_POST['contact_comment'];
          
          
          //$to = get_option('admin_email');
          $to = of_get_option( 'contact_email', '' );
          $subject = "Someone sent a message from ".get_bloginfo('name');
          $headers = 'From: '. $email . "rn" .
              'Reply-To: ' . $email . "rn";
              
              
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                my_contact_form_generate_response("error", $email_invalid);
          }else if(empty($name) || empty($message) || empty($message)){
              my_contact_form_generate_response("error", $missing_content);
          }else{
            $sent = wp_mail($to, $subject, strip_tags($message), $headers);
            if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
            else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
          }
        }
?>
	<div id="inner_wrapper">
				<div id="inner_top">
					<div id="inner_logo">
                    	<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/inner_logo.png" /></a>
                    </div>
                    <?php include (TEMPLATEPATH . '/inc/fc_inner_topnav.php' ); ?>
                    
                    <div id="inner_top_text">
                        <h2>CONTACT US</h2>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
                		<?php the_content(); ?>
                
                		<?php endwhile; endif; ?>
                        
                        
                        <?php echo isset($response) ? $response : '' ; ?>
                        <form class="contact_us" id="contact-us" method="post" action="<?php echo curPageURL(); ?>">
                            <div class="field">
                                <input type="text" name="contact_name" class="input-text" value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>" placeholder="Name" required />
                            </div>
                            <div class="field">
                                <input type="email" name="contact_email" class="input-text" value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" placeholder="Email" required />
                            </div>
                            <div class="field">
                                <input type="text" name="contact_phone" class="input-text" placeholder="Phone" value="<?php echo isset($_POST['phone']) ? esc_attr($_POST['phone']) : ''; ?>" required />
                            </div>
                            <div class="field">
                                <textarea class="input-textarea" name="contact_comment" placeholder="Comment" required ><?php echo isset($_POST['comment']) ? esc_attr($_POST['comment']) : ''; ?></textarea>
                            </div>
                            <div class="field">
                                <input type="submit" class="input-submit" name="submitted" value="SUBMIT" />
                            </div>
                        </form>
                        
                        
                        
                    </div>
					
				</div>
				
			</div>

<?php get_footer(); ?>
