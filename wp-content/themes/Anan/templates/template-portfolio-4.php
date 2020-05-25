<?php
/**
 * The main template file for display portfolio page.
 *
 * @package WordPress
 */

/**
*	Get all photos
**/ 

$menu_sets_query = '';

$portfolio_items = -1;

$args = array( 
	'post_type' => 'attachment', 
	'numberposts' => $portfolio_items, 
	'post_status' => null, 
	'post_parent' => $post->ID,
	'order' => 'ASC',
	'orderby' => 'menu_order',
); 
$all_photo_arr = get_posts( $args );

get_header(); ?>

		<?php
			$pp_portfolio_bg = get_option('pp_portfolio_bg'); 
			
			if(empty($pp_portfolio_bg))
			{
				$pp_portfolio_bg = '/example/bg.jpg';
			}
			else
			{
				$pp_portfolio_bg = '/data/'.$pp_portfolio_bg;
			}
		?>
		<script type="text/javascript"> 
			jQuery.backstretch( "<?php echo get_stylesheet_directory_uri().$pp_portfolio_bg; ?>", {speed: 'slow'} );
		</script>
		
		<?php
			if(!empty($all_photo_arr))
			{
		?>
		
		<!-- Begin content -->
		<div id="page_content_wrapper">
			
			<?php
					$pp_gallery_width = 180;
					$pp_gallery_height = 100;
			?>
			
			<div class="inner">
		
				<div class="inner_wrapper">
				
				<div class="sidebar_content full_width">
					<h1 class="cufon"><?php echo $post->post_title; ?></h1>
					
					<?php
						if(!empty($post->post_content))
						{
					?>
						<p><?php echo nl2br(stripslashes(html_entity_decode(do_shortcode($post->post_content)))); ?></p>
						<br/><br/>
					<?php
						}
					?>
				
				<?php
					foreach($all_photo_arr as $key => $photo)
					{
						$small_image_url = get_stylesheet_directory_uri().'/images/000_70.png';
						$hyperlink_url = get_permalink($photo->ID);
						
						if(!empty($photo->guid))
						{
							$image_url[0] = $photo->guid;
						
							$small_image_url = get_stylesheet_directory_uri().'/timthumb.php?src='.$image_url[0].'&amp;h='.$pp_gallery_height.'&amp;w='.$pp_gallery_width.'&amp;zc=1';
						}
						
						$last_class = '';
						if(($key+1)%4==0)
						{
							$last_class = 'last';
						}
				?>
				
				<div class="one_fourth <?php echo $last_class; ?>" style="margin-bottom:0;margin-top:2%">
					<?php 
    					if(!empty($small_image_url))
    					{
    						$pp_enable_image_title = get_option('pp_enable_image_title');
    				?>		
							<a rel="gallery" href="<?php echo $image_url[0]; ?>" <?php if(!empty($pp_enable_image_title)) { ?> title="<?php echo $photo->post_title; ?>" <?php } ?>>
								<img src="<?php echo $small_image_url; ?>" alt="" class="frame img_nofade"/>
							</a>
					<?php
    					}		
    				?>			
					
				</div>
				
				<?php
					}
				?>
				</div>
				</div>
			
			</div>
			<br class="clear"/>
			
		</div>
		<!-- End content -->
		
		<?php
			}
		?>
		
		</div>

<?php get_footer(); ?>