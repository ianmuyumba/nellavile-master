<?php
/**
 * The main template file for display error page.
 *
 * @package WordPress
*/


get_header(); 

?>
		<?php
			$pp_homepage_bg = get_option('pp_homepage_bg'); 
			
			if(empty($pp_homepage_bg))
			{
				$pp_homepage_bg = '/example/bg.jpg';
			}
			else
			{
				$pp_homepage_bg = '/cache/'.$pp_homepage_bg;
			}
		?>
		<script type="text/javascript"> 
			jQuery.backstretch( "<?php echo get_stylesheet_directory_uri().$pp_homepage_bg; ?>", {speed: 'slow'} );
		</script>

		<!-- Begin content -->
		<div id="page_content_wrapper">
		
			<div class="inner">
			
				<!-- Begin main content -->
				<div class="inner_wrapper">

					<div class="sidebar_content">
			
						<h1 class="cufon"><?php _e( 'Not found', '' ); ?></h1>
						
						<p><?php _e( 'Apologies, but the page you requested could not be found.', '' ); ?></p>
						
						<br class="clear"/>

					</div>
					
				</div>
				
			</div>
			<br class="clear"/>
		</div>
		<!-- End content -->
				

<?php get_footer(); ?>