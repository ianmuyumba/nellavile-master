<?php
/*
	Begin creating admin options
*/

$themename = THEMENAME;
$shortname = SHORTNAME;

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array(
	0		=> "Choose a category"
);
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages(array('parent' => -1));
$wp_pages = array(
	0		=> "Choose a page"
);
foreach ($pages as $page_list ) {
       $wp_pages[$page_list->ID] = $page_list->post_title;
}

$galleries = get_posts(array('parent' => -1, 'post_type' => 'gallery', 'numberposts' => -1));
$wp_galleries = array(
	0		=> "Choose a gallery"
);
foreach ($galleries as $gallery_list ) {
       $wp_galleries[$gallery_list->ID] = $gallery_list->post_title;
}


$pp_handle = opendir(TEMPLATEPATH.'/fonts');
$pp_font_arr = array();

while (false!==($pp_file = readdir($pp_handle))) {
	if ($pp_file != "." && $pp_file != ".." && $pp_file != ".DS_Store") {
		$pp_file_name = basename($pp_file, '.js');
		
		if($pp_file_name != 'Quicksand_300.font')
		{
			$pp_name = $pp_file_name;
		
			$pp_font_arr[$pp_file_name] = $pp_name;
		}
	}
}
closedir($pp_handle);
asort($pp_font_arr);


$options = array (
 
//Begin admin header
array( 
		"name" => $themename." Options",
		"type" => "title"
),
//End admin header
 

//Begin first tab "General"
array( 
		"name" => "General",
		"type" => "section"
)
,

array( "type" => "open"),

array( "name" => "Menu Logo",
	"desc" => "Image logo which shows above of main menu",
	"id" => $shortname."_logo",
	"type" => "image",
	"std" => "",
),
array( "name" => "Mini Logo (max width 20 pixels)",
	"desc" => "Image logo which shows when menu is hided",
	"id" => $shortname."_mini_logo",
	"type" => "image",
	"std" => "",
),
array( "name" => "Enable/disable keep main menu display",
	"desc" => "",
	"id" => $shortname."_menu_display",
	"type" => "iphone_checkboxes",
	"std" => 1
),
array( "name" => "Enable/disable right click (for image protection)",
	"desc" => "",
	"id" => $shortname."_enable_right_click",
	"type" => "iphone_checkboxes",
	"std" => 1
),
array( "name" => "Right click alert text (If enable image protection)",
	"desc" => "It will displays this message when user do right click",
	"id" => $shortname."_right_click_text",
	"type" => "text",
	"std" => "Images are copyright by me :)"

),
array( "name" => "Google Analytics Domain ID ",
	"desc" => "Get analytics on your site. Simply give us your Google Analytics Domain ID (something like UA-123456-1)",
	"id" => $shortname."_ga_id",
	"type" => "text",
	"std" => ""

),
array( "name" => "Custom Favicon",
	"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
	"id" => $shortname."_favicon",
	"type" => "text",
	"std" => "",
),
	
array( "type" => "close"),
//End first tab "General"

//Begin first tab "Font"
array( 
		"name" => "Font",
		"type" => "section"
)
,

array( "type" => "open"),

array( "name" => "Header Font",
	"desc" => "Select font for header text",
	"id" => $shortname."_font",
	"type" => "font",
	"options" => $pp_font_arr,
	"std" => ""
),
array( "name" => "H1 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h1_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "40",
	"from" => 13,
	"to" => 60,
	"step" => 1,
),
array( "name" => "H2 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h2_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "32",
	"from" => 13,
	"to" => 60,
	"step" => 1,
),
array( "name" => "H3 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h3_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "26",
	"from" => 13,
	"to" => 60,
	"step" => 1,
),
array( "name" => "H4 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h4_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "24",
	"from" => 13,
	"to" => 60,
	"step" => 1,
),
array( "name" => "H5 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h5_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "22",
	"from" => 13,
	"to" => 60,
	"step" => 1,
),
array( "name" => "H6 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h6_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "18",
	"from" => 13,
	"to" => 60,
	"step" => 1,
),
array( "name" => "Menu font Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_menu_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "32",
	"from" => 13,
	"to" => 40,
	"step" => 1,
),
	
array( "type" => "close"),
//End first tab "Font"


//Begin first tab "Colors"
array( 
		"name" => "Colors",
		"type" => "section"
)
,

array( "type" => "open"),

array( "name" => "Font Color",
	"desc" => "Select color for the font (default #cccccc)",
	"id" => $shortname."_font_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#cccccc"

),

array( "name" => "Link Color",
	"desc" => "Select color for the link (default #ffffff)",
	"id" => $shortname."_link_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#ffffff"

),

array( "name" => "Hover Link Color",
	"desc" => "Select color for the hover link (default #bdbdbd)",
	"id" => $shortname."_hover_link_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#bdbdbd"

),

array( "name" => "Menu active color",
	"desc" => "Select color for active item in main menu",
	"id" => $shortname."_menu_active_font_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#ffc600"

),

array( "name" => "H1, H2, H3, H4, H5, H6 Color",
	"desc" => "Select color for the H1, H2, H3, H4, H5, H6 (default #ffc600)",
	"id" => $shortname."_h1_font_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#ffc600"

),

array( "name" => "Button Background Color",
	"desc" => "Select color for the button background (default #000000)",
	"id" => $shortname."_button_bg_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#000000"

),

array( "name" => "Button Font Color",
	"desc" => "Select color for the button font (default #ffffff)",
	"id" => $shortname."_button_font_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#ffffff"

),

array( "name" => "Button Border Color",
	"desc" => "Select color for the button border (default #000000)",
	"id" => $shortname."_button_border_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#000000"

),


array( "type" => "close"),
//End first tab "Colors"


//Begin second tab "Homepage"
array( "name" => "Homepage",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Homepage slideshow style",
	"desc" => "Select style for contents in homepage slideshow",
	"id" => $shortname."_homepage_style",
	"type" => "select",
	"options" => array(
		'slideshow' => 'Slideshow',
		'kenburns' => 'Kenburns',
		'youtube_video' => 'Youtube Video Background',
		'static' => 'Static image',
	),
	"std" => "ASC"
),
array( "name" => "Choose Homepage Gallery (if select slideshow)",
	"desc" => "",
	"id" => $shortname."_homepage_slideshow_cat",
	"type" => "select",
	"options" => $wp_galleries,
	"std" => ""
),
array( "name" => "Enable/disable auto fit image to screen (if select slideshow)",
	"desc" => "",
	"id" => $shortname."_enable_fit_image",
	"type" => "iphone_checkboxes",
	"std" => 1
),
array( "name" => "Homepage Gallery Transition Effect",
	"desc" => "Select transition type for contents in homepage slideshow",
	"id" => $shortname."_homepage_slideshow_trans",
	"type" => "select",
	"options" => array(
		1 => 'Fade',
		2 => 'Slide Top',
		3 => 'Slide Right',
		4 => 'Slide Bottom',
		5 => 'Slide Left',
		6 => 'Carousel Right',
		7 => 'Carousel Left',
	),
	"std" => "Fade"
),
array( "name" => "Homepage Youtube Video ID (if select Youtube Video Background style)",
	"desc" => "For example: iIyfibIBpnM",
	"id" => $shortname."_homepage_youtube_video_id",
	"type" => "text",
	"std" => "iIyfibIBpnM"
),
array( "name" => "Hompage Background Image (if select static image)",
	"desc" => "Select image for homepage background (Recommended size 1440x900 pixels)",
	"id" => $shortname."_homepage_bg",
	"type" => "image",
	"size" => "290px",
),

array( "name" => "Homepage Right Logo",
	"desc" => "Select image for homepage logo",
	"id" => $shortname."_homepage_logo",
	"type" => "image",
	"std" => ""

),

array( "type" => "close"),
//End second tab "Homepage"


//Begin second tab "Portfolios"
array( "name" => "Blog-Portfolio",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Blog Background Image",
	"desc" => "Select image for blog background (Recommended size 1440x900 pixels)",
	"id" => $shortname."_blog_bg",
	"type" => "image",
	"size" => "290px",
),
array( "name" => "Portfolio Background Image",
	"desc" => "Select image for gallery background (Recommended size 1440x900 pixels)",
	"id" => $shortname."_portfolio_bg",
	"type" => "image",
	"size" => "290px",
),
array( "name" => "Portfolio styles",
	"desc" => "Select the columns style for the portfolio",
	"id" => $shortname."_portfolio_style",
	"type" => "select",
	"options" => array(
		'2' => '2 Columns',
		'3' => '3 Columns',
		'4' => '4 Columns',
		'f' => 'Full Screen',
	),
	"std" => 1
),
array( "name" => "Enable/disable image title and description",
	"desc" => "",
	"id" => $shortname."_enable_image_title",
	"type" => "iphone_checkboxes",
	"std" => 1
),
array( "name" => "Enable/disable auto fit image to screen (if select Full Screen template)",
	"desc" => "",
	"id" => $shortname."_portfolio_enable_fit_image",
	"type" => "iphone_checkboxes",
	"std" => 1
),

array( "name" => "Display full blog post content on blog page",
	"desc" => "",
	"id" => $shortname."_blog_display_full",
	"type" => "iphone_checkboxes",
	"std" => 1
),

array( "type" => "close"),
//End second tab "Portfolios"


//Begin second tab "Sidebar"
array( "name" => "Sidebar",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Add a new sidebar",
	"desc" => "Enter sidebar name",
	"id" => $shortname."_sidebar0",
	"type" => "text",
	"std" => "",
),
array( "type" => "close"),
//End second tab "Sidebar"


//Begin fourth tab "Contact"
array( "name" => "Contact",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Contact Background Image",
	"desc" => "Select image for contact background (Recommended size 1440x900 pixels)",
	"id" => $shortname."_contact_bg",
	"type" => "image",
	"size" => "290px",
),
array( "name" => "Your email address",
	"desc" => "Enter which email address will be sent from contact form",
	"id" => $shortname."_contact_email",
	"type" => "text",
	"std" => ""

),
//End fourth tab "Contact"

//Begin fifth tab "Footer"
array( "type" => "close"),
array( "name" => "Footer",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Footer text",
	"desc" => "Enter footer text ex. copyright description",
	"id" => $shortname."_footer_text",
	"type" => "textarea",
	"std" => ""

),
//End fifth tab "Footer"

 
array( "type" => "close")
 
);
?>