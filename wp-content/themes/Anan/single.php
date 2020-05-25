<?php
/**
 * The main template file for display single post page.
 *
 * @package WordPress
*/

get_header(); 

if($post_type == 'gallery')
{
	if(isset($_SESSION['pp_portfolio_style']))
	{
		$pp_portfolio_style = $_SESSION['pp_portfolio_style'];
	}
	else
	{
		$pp_portfolio_style = get_option('pp_portfolio_style');
	}
	
	if(empty($pp_portfolio_style))
	{
		$pp_portfolio_style = 3;
	}

	include (TEMPLATEPATH . "/templates/template-portfolio-".$pp_portfolio_style.".php");
	exit;
}

?>
		<!-- Begin content -->
		<div id="page_content_wrapper">
		
			<div class="inner">
			
				<div class="sidebar_content">
				
				<?php

if (have_posts()) : while (have_posts()) : the_post();

	$image_thumb = '';
								
	if(has_post_thumbnail(get_the_ID(), 'large'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
	    
	    
	  	$pp_blog_image_width = 570;
		$pp_blog_image_height = 360;
	}
?>

		<?php
			$pp_blog_bg = get_option('pp_blog_bg'); 
			
			if(empty($pp_blog_bg))
			{
				$pp_blog_bg = '/example/bg.jpg';
			}
			else
			{
				$pp_blog_bg = '/data/'.$pp_blog_bg;
			}
		?>
		<script type="text/javascript"> 
			jQuery.backstretch( "<?php echo get_stylesheet_directory_uri().$pp_blog_bg; ?>", {speed: 'slow'} );
		</script>

						<!-- Begin each blog post -->
						<div class="post_wrapper">
						
							<div class="post_header">
								<div class="left">
									<h1 style="font-size:26px;margin-bottom:0" class="cufon"><?php the_title(); ?></h1>						
								</div>
							</div>
						
							<?php
								if(!empty($image_thumb))
								{
							?>
							
							<br class="clear"/>
							<div class="post_img img_shadow_536" style="width:<?php echo $pp_blog_image_width+10; ?>px;height:<?php echo $pp_blog_image_height+30; ?>px">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/timthumb.php?src=<?php echo $image_thumb[0]; ?>&amp;h=<?php echo $pp_blog_image_height; ?>&amp;w=<?php echo $pp_blog_image_width; ?>&amp;zc=1" alt="" class="frame img_nofade" width="<?php echo $pp_blog_image_width;?>" height="<?php echo $pp_blog_image_height;?>"/>
								</a>
							</div>
							<br class="clear"/>
							
							<?php
								}
							?>
						
							<?php the_content(); ?>
							
						</div>
						<!-- End each blog post -->
						
						<br class="clear"/>


						<?php comments_template( '' ); ?>
						

<?php endwhile; endif; ?>
					</div>
					
					<div class="sidebar_wrapper">
						<div class="sidebar">
							
							<div class="content">
							
								<ul class="sidebar_widget">
									<?php dynamic_sidebar('Blog Sidebar'); ?>
								</ul>
								
							</div>
						
						</div>
					</div>
				
				<br class="clear"/>
			</div>
			<br class="clear"/>
			
		</div>
		<!-- End content -->
		
		<br class="clear"/>
	</div>
	<br class="clear"/>	

<?php get_footer(); ?>