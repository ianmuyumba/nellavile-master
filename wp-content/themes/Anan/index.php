<?php
/**
 * The main template file. Modified from the Anan theme to use supersized.
 *
 * @package WordPress
 */

get_header(); 

if(isset($_SESSION['pp_homepage_style']))
{
	$pp_homepage_style = $_SESSION['pp_homepage_style'];
}
else
{
	$pp_homepage_style = get_option('pp_homepage_style');
}

$pp_homepage_slideshow = get_option('pp_homepage_slideshow');
$pp_homepage_slideshow_cat = get_option('pp_homepage_slideshow_cat');

if(empty($pp_homepage_style))
{
	$pp_homepage_style = 'slideshow';
}

if($pp_homepage_style == 'slideshow' && !empty($pp_homepage_slideshow_cat))
{
	$homepage_items = -1;

	$args = array( 
		'post_type' => 'attachment', 
		'numberposts' => $homepage_items, 
		'post_status' => null, 
		'post_parent' => $pp_homepage_slideshow_cat,
		'order' => 'ASC',
		'orderby' => 'menu_order',
	); 
	$all_photo_arr = get_posts( $args );	
?>

<?php
$initial_image = $all_photo_arr[0]->guid;

?>

<?php
	$pp_homepage_logo = get_option('pp_homepage_logo');
	    			
	if(empty($pp_homepage_logo))
	{
	    $pp_homepage_logo = '/images/cover.png';
	}
	else
	{
	    $pp_homepage_logo = '/data/'.$pp_homepage_logo;
	}
?>
		<div id="cover_content" style="position:fixed;top:40px;right:50px;z-index:999;"><img src="<?php echo get_stylesheet_directory_uri().$pp_homepage_logo; ?>"></div>
		
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/supersized.css" type="text/css" media="screen" />
		

		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/supersized.3.1.3.min.js"></script>
		
		<script type="text/javascript">  
			
			jQuery(function($){
				$.supersized({
				
					//Functionality
					slideshow               :   1,		//Slideshow on/off
					autoplay				:	1,		//Slideshow starts playing automatically
					start_slide             :   1,		//Start slide (0 is random)
					random					: 	0,		//Randomize slide order (Ignores start slide)
					slide_interval          :   8000,	//Length between transitions
					<?php						
						$pp_homepage_slideshow_trans = get_option('pp_homepage_slideshow_trans');
						
						if(empty($pp_homepage_slideshow_trans))
						{
							$pp_homepage_slideshow_trans = 6;
						}
					?>
					transition              :   <?php echo $pp_homepage_slideshow_trans; ?>, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	500,	//Speed of transition
					new_window				:	1,		//Image links open in new window/tab
					pause_hover             :   0,		//Pause slideshow on hover
					keyboard_nav            :   1,		//Keyboard navigation on/off
					performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,		//Disables image dragging and right click with Javascript
					image_path				:	'img/', //Default image path

					//Size & Position
					min_width		        :   0,		//Min width allowed (in pixels)
					min_height		        :   0,		//Min height allowed (in pixels)
					vertical_center         :   1,		//Vertically center background
					horizontal_center       :   1,		//Horizontally center background
					<?php						
						$pp_enable_fit_image = get_option('pp_enable_fit_image');
						
						if(empty($pp_enable_fit_image))
						{
							$pp_enable_fit_image = 1;
						}
						else
						{
							$pp_enable_fit_image = 0;
						}
					?>
					fit_portrait         	:   <?php echo $pp_enable_fit_image; ?>,		//Portrait images will not exceed browser height
					fit_landscape			:   <?php echo $pp_enable_fit_image; ?>,		//Landscape images will not exceed browser width
					
					//Components
					navigation              :   0,		//Slideshow controls on/off
					thumbnail_navigation    :   0,		//Thumbnail navigation
					slide_counter           :   0,		//Display slide numbers
					slide_captions          :   0,		//Slide caption (Pull from "title" in slides array)
					slides 					:  	[		//Slideshow Images
														  
	

		<?php
			foreach($all_photo_arr as $key => $photo)
			{
			    $small_image_url = get_stylesheet_directory_uri().'/images/000_70.png';
			    $hyperlink_url = get_permalink($photo->ID);
			    
			    if(!empty($photo->guid))
			    {
			    	$image_url[0] = $photo->guid;
			    
			    	$small_image_url = get_stylesheet_directory_uri().'/timthumb.php?src='.$image_url[0].'&amp;h=50&amp;w=50&amp;zc=1';
			    }

		?>

        	<?php $homeslides .= '{image : \''.$image_url[0].'\'},'; ?>
        	
        <?php
        	}
        ?>

						<?php $homeslides = substr($homeslides,0,-1);
						echo $homeslides; ?>						]
												
				}); 
		    });
		    
		</script>	


<?php
} // End if homepage as slideshow
else if($pp_homepage_style == 'static')
{
?>
		
		<?php
			$pp_homepage_bg = get_option('pp_homepage_bg'); 
			
			if(empty($pp_homepage_bg))
			{
				$pp_homepage_bg = '/example/bg.jpg';
			}
			else
			{
				$pp_homepage_bg = '/data/'.$pp_homepage_bg;
			}

		?>
		<script type="text/javascript"> 
			jQuery.backstretch( "<?php echo get_stylesheet_directory_uri().$pp_homepage_bg; ?>", {speed: 'slow'} );
		</script>
		
		
		<?php
			$pp_homepage_logo = get_option('pp_homepage_logo');
							
			if(empty($pp_homepage_logo))
			{
				$pp_homepage_logo = '/images/cover.png';
			}
			else
			{
				$pp_homepage_logo = '/data/'.$pp_homepage_logo;
			}

		?>
		<div id="cover_content" style="position:fixed;top:40px;right:50px;z-index:999;"><img src="<?php echo get_stylesheet_directory_uri().$pp_homepage_logo; ?>"></div>
		
		</div>

<?php get_footer(); 

} // End if homepage as static image
else if($pp_homepage_style == 'youtube_video')
{
?>
<?php
$pp_homepage_youtube_video_id = get_option('pp_homepage_youtube_video_id');

if(!empty($pp_homepage_youtube_video_id))
{
?>

<script>
$j(document).ready(function() {
	$j('body').tubular('<?php echo $pp_homepage_youtube_video_id; ?>','wrapper');
	
	setTimeout(function() {
    	$j('#top_bar').fadeOut("slow");
    }, 3000);
    
	$j('#footer').css('display','none');
	
	$j(document).hover(
		function(){ //mouse over
			$j('#top_bar').fadeTo("slow", 1);
		},
		function(){ //mouse out
			$j('#top_bar').fadeOut("slow");
		}
	);
});
</script>
<?php
}
?>

<?php
} else if($pp_homepage_style == 'kenburns')
{
?>
<div id="kenburns_overlay"></div>
<canvas id="kenburns">
    <p>Your browser doesn't support canvas!</p>
</canvas>

<script type="text/javascript">  

<?php
	$homepage_items = -1;

	$args = array( 
		'post_type' => 'attachment', 
		'numberposts' => $homepage_items, 
		'post_status' => null, 
		'post_parent' => $pp_homepage_slideshow_cat,
		'order' => 'ASC',
		'orderby' => 'menu_order',
	); 
	$all_photo_arr = get_posts( $args );

	//Get timer setting				
    $pp_homepage_slideshow_timer = get_option('pp_homepage_slideshow_timer');
    
    if(empty($pp_homepage_slideshow_timer))
    {
    	$pp_homepage_slideshow_timer = 5000;
    }
    else
    {
    	$pp_homepage_slideshow_timer = $pp_homepage_slideshow_timer*1000;
    }
    
    //Check if iPad or iPhone
    $isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	$isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
	$isFirefox = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Mozilla');
	
    if($isiPad || $isiPhone || $isFirefox) 
    {
    	$pp_kenburns_frames_rate = 10;
    }
    else
    {
    	$pp_kenburns_frames_rate = 30;
    }
?>
							  
$j(document).ready(function(){ 
	$j('#kenburns_overlay').css('width', $j(window).width() + 'px');
	$j('#kenburns_overlay').css('height', $j(window).height() + 'px');
	$j('#kenburns').attr('width', $j(window).width());
	$j('#kenburns').attr('height', $j(window).height());
	$j(window).resize(function() {
		$j('#kenburns').remove();
		$j('#kenburns_overlay').remove();
		
		$j('body').append('<canvas id="kenburns"></canvas>');
		$j('body').append('<div id="kenburns_overlay"></div>');
	
	  	$j('#kenburns_overlay').css('width', $j(window).width() + 'px');
		$j('#kenburns_overlay').css('height', $j(window).height() + 'px');
		$j('#kenburns').attr('width', $j(window).width());
		$j('#kenburns').attr('height', $j(window).height());
		
			$j('#kenburns').kenburns({
			images:[
			<?php
				$count_photo = count($all_photo_arr);
			    foreach($all_photo_arr as $key => $photo)
			    {
			        if(!empty($photo->guid))
			        {
			        	$image_url[0] = $photo->guid;
			        }
			
			?>
					'<?php echo $image_url[0]; ?>'
			<?php
					if($count_photo > ($key+1))
					{
						echo ',';
					}
				}
			?>
					],
			frames_per_second: <?php echo $pp_kenburns_frames_rate; ?>,
			display_time: <?php echo $pp_homepage_slideshow_timer; ?>,
			fade_time: 1000,
			zoom: 1.2,
			background_color:'#000000'
		});
	});
	$j('#kenburns').kenburns({
		images:[
		<?php
		    foreach($all_photo_arr as $key => $photo)
		    {
		        if(!empty($photo->guid))
		        {
		        	$image_url[0] = $photo->guid;
		        }
		
		?>
				'<?php echo $image_url[0]; ?>'
		<?php
				if($count_photo > ($key+1))
				{
					echo ',';
				}
			}
		?>
				],
		frames_per_second: <?php echo $pp_kenburns_frames_rate; ?>,
		display_time: <?php echo $pp_homepage_slideshow_timer; ?>,
		fade_time: 1000,
		zoom: 1.2,
		background_color:'#000000'
	});	
	
	setTimeout(function(){
	    $j('#top_bar').fadeOut();
	    $j('#footer').fadeOut();
	}, 3000);
	
	$j(document).hover(function(){ 
		 $j('#top_bar').fadeIn();
		 $j('#footer').fadeIn();
	},
	function()
	{	
		 $j('#top_bar').fadeOut();
		 $j('#footer').fadeOut();
	});			
});
    
</script>
<?php
}
?>