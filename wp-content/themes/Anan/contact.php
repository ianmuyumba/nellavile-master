<?php
/**
 * Template Name: Contact
 * The main template file for display contact page.
 *
 * @package WordPress
*/


/**
*	if not submit form
**/
if(!isset($_GET['your_name']))
{

get_header(); 

?>
		<?php
			$pp_contact_bg = get_option('pp_contact_bg'); 
			
			if(empty($pp_contact_bg))
			{
				$pp_contact_bg = '/example/bg.jpg';
			}
			else
			{
				$pp_contact_bg = '/data/'.$pp_contact_bg;
			}
		?>
		<script type="text/javascript"> 
			jQuery.backstretch( "<?php echo get_stylesheet_directory_uri().$pp_contact_bg; ?>", {speed: 'slow'} );
		</script>

		<!-- Begin content -->
		<div id="page_content_wrapper">
		
			<div class="inner">
			
			<div class="sidebar_content">
			
				<h1 class="cufon"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
				<!-- Begin main content -->
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		

							<?php do_shortcode(the_content()); ?>

						<?php endwhile; ?>
						
						<form id="contact_form" method="post" action="<?php echo curPageURL(); ?>">
						    <p>
						    	<label for="your_name">Name</label><br/>
						    	<input id="your_name" name="your_name" type="text" style="width:94%"/>
						    </p>
						    <p style="margin-top:20px">
						    	<label for="email">Email</label><br/>
						    	<input id="email" name="email" type="text" style="width:94%"/>
						    </p>
						    <p style="margin-top:20px">
						    	<label for="message">Message</label><br/>
						    	<textarea id="message" name="message" style="width:94%"></textarea>
						    </p>
						    <p style="margin-top:30px"><br/>
								<input type="submit" value="Send Message"/>
							</p>
						</form>
						<div id="reponse_msg"></div>
						<br/><br/>
				<!-- End main content -->
				</div>
				
				<div class="sidebar_wrapper">
						<div class="sidebar">
							
							<div class="content">
							
								<ul class="sidebar_widget">
									<?php dynamic_sidebar('Contact Sidebar'); ?>
								</ul>
								
							</div>
						
						</div>
						<br class="clear"/>
			
			</div>
			</div>
			
			<br class="clear"/>
		</div>
		<!-- End content -->
				
		<br class="clear"/><br/>
<?php get_footer(); ?>
				
				
<?php
}

//if submit form
else
{

	/*
	|--------------------------------------------------------------------------
	| Mailer module
	|--------------------------------------------------------------------------
	|
	| These module are used when sending email from contact form
	|
	*/
	
	//Get your email address
	$contact_email = get_option('pp_contact_email');
	
	//Enter your email address, email from contact form will send to this addresss. Please enter inside quotes ('myemail@email.com')
	define('DEST_EMAIL', $contact_email);
	
	//Change email subject to something more meaningful
	define('SUBJECT_EMAIL', 'Email from contact form');
	
	//Thankyou message when message sent
	define('THANKYOU_MESSAGE', 'Thank you! We will get back to you as soon as possible');
	
	//Error message when message can't send
	define('ERROR_MESSAGE', 'Oops! something went wrong, please try to submit later.');
	
	
	/*
	|
	| Begin sending mail
	|
	*/
	
	$from_name = $_GET['your_name'];
	$from_email = $_GET['email'];
	
	$message = 'Name: '.$from_name.PHP_EOL;
	$message.= 'Email: '.$from_email.PHP_EOL.PHP_EOL;
	$message.= 'Message: '.PHP_EOL.$_GET['message'];
	    
	
	if(!empty($from_name) && !empty($from_email) && !empty($message))
	{
		mail(DEST_EMAIL, SUBJECT_EMAIL, $message);
	
		echo THANKYOU_MESSAGE;
		
		exit;
	}
	else
	{
		echo ERROR_MESSAGE;
		
		exit;
	}
	
	/*
	|
	| End sending mail
	|
	*/
}

?>