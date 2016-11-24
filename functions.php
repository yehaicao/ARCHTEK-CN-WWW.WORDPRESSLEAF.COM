<?php

// ---------------------------------------------- //
// Theme Constants
// ---------------------------------------------- //
define('THEME_NAME', 'Archtek');
define('THEME_VERSION', wp_get_theme()->get('Version'));
define('AUTHOR_URL', 'http://themeforest.net/user/UXbarn?ref=UXbarn');
define('IMAGE_PATH', get_template_directory_uri() . '/images');
define('DEFAULT_GOOGLE_FONTS', 'Roboto:100,300,400,700|Titillium+Web:400,600');

// For supporting "is_plugin_active()" usage
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require_once( get_template_directory() . '/includes/theme-options.php' );
require_once( get_template_directory() . '/includes/custom-optiontree.php' );
require_once( get_template_directory() . '/includes/plugin-codes/envato-market-github.php' );
require_once( get_template_directory() . '/includes/plugin-codes/class-tgm-plugin-activation.php' );

// Initialize the theme
add_action('after_setup_theme', 'uxbarn_init_theme');



if( ! function_exists('uxbarn_init_theme')) {
	
	function uxbarn_init_theme() {
	
		// ---------------------------------------------- //
		// General Settings
		// ---------------------------------------------- //
		if (!isset($content_width)) $content_width = 1020;
		
		add_theme_support('post-thumbnails');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'title-tag' );
		
		
		// ---------------------------------------------- //
		// Main Scripts
		// ---------------------------------------------- //
		add_action('wp_enqueue_scripts', 'uxbarn_load_css');
		add_action('wp_enqueue_scripts', 'uxbarn_load_js');
		add_action('admin_enqueue_scripts', 'uxbarn_load_admin_assets');
		
		
		// ---------------------------------------------- //
		// Main Components
		// ---------------------------------------------- //
		add_action('init', 'uxbarn_register_menus');
		add_action('init', 'uxbarn_register_sidebars');
		add_filter('user_contactmethods', 'uxbarn_update_user_profile_fields');
		require_once(get_template_directory() . '/includes/shortcodes/shortcodes.php');
		require_once(get_template_directory() . '/includes/style-customizer/loader.php');
		require_once(get_template_directory() . '/includes/custom-widgets.php');
		require_once(get_template_directory() . '/includes/php/helper.php');
		
		
		// ---------------------------------------------- //
		// Custom Post Types
		// ---------------------------------------------- //
		require_once(get_template_directory() . '/includes/cpt.php');
		add_action('init', 'uxbarn_register_cpt_homeslider');
		add_action('init', 'uxbarn_register_cpt_portfolio');
		add_action('init', 'uxbarn_register_cpt_team');
		add_action('init', 'uxbarn_register_cpt_testimonials');
		
		
		
		/***** Register meta boxes and Theme Options (OptionTree plugin is required) *****/
		// [functions.php, theme-options.php, custom-optiontree.php]
		if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
			
			uxbarn_register_meta_boxes();
			
			add_action( 'admin_init', 'uxbarn_custom_theme_options', 1 );
			
		}
		
		
		
		// ---------------------------------------------- //
		// Others
		// ---------------------------------------------- //
		
		// Handle the site title rewrite
		//add_filter('wp_title', 'uxbarn_rewrite_site_title', 10, 3);
		
		// Load breadcrumb function
		require_once(get_template_directory() . '/includes/breadcrumbs.php');
		
		// All initial image sizes
		add_image_size('home-slider-image', 2000, 624, true);
		add_image_size('header-image', 2000, 330, true);
		add_image_size('blog-thumbnail', 765, 255, true);
		add_image_size('blog-thumbnail-full-width', 1020, 255, true);
		add_image_size('single-portfolio', 1020, 500, true);
		add_image_size('large-square', 400, 400, true);
		add_image_size('medium-square', 280, 280, true);
		add_image_size('small-square', 120, 120, true);
		add_image_size('tiny-square', 40, 40, true);
		add_image_size('rectangle', 510, 255, true);
		add_image_size('rectangle-vertical', 255, 510, true);
		
		// Register all image sizes into the list of media editor
		add_filter('image_size_names_choose', 'uxbarn_merge_image_sizes');  
		
		// Make empty search value to the correct page
		add_filter('request', 'uxbarn_request_filter');
		
		// Enable shortcode usage in widget area
		add_filter('widget_text', 'do_shortcode');
		
		// Change the WP excerpt length 
		add_filter('excerpt_length', 'uxbarn_custom_excerpt_length', 999);
		
		// Change excerpt more from "[...]" to just "..."
		add_filter('excerpt_more', 'uxbarn_new_excerpt_more');
		
		// Template for displaying comments
		require_once(get_template_directory() . '/includes/comment-item.php');
		
		// For any modification to global $query object before it's run
		// For example: reset posts per page for taxonomy template to be independent from blog posts 
		add_action('pre_get_posts', 'uxbarn_alter_query_object');
		
		// Load available text domains for localization 
		load_theme_textdomain('uxbarn', get_template_directory() . '/languages');
		load_theme_textdomain('tgmpa', get_template_directory() . '/languages');
		
		
		// Load plugin requirements
		add_action( 'tgmpa_register', 'uxbarn_register_additional_plugins' );
		
		
		// Load our custom extension for VC plugin
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			
			require_once( get_template_directory() . '/includes/vc/custom-param-array.php' );
			require_once( get_template_directory() . '/includes/vc/custom-vc.php' );
			require_once( get_template_directory() . '/includes/vc/custom-mappings.php' );
			
			//add_action( 'init', 'uxbarn_customize_vc_elements' );
			add_action( 'vc_before_init', 'uxbarn_add_custom_param_to_vc_elements' );
			add_action( 'vc_before_init', 'uxbarn_add_custom_param_to_vc_inner_elements' );
			add_action( 'init', 'uxbarn_customize_vc_elements' );
			add_action( 'admin_init', 'uxbarn_create_theme_custom_elements' );
			add_filter( 'vc_shortcodes_css_class', 'uxbarn_customize_vc_rows_columns', 10, 2 );
			add_action( 'wp_enqueue_scripts', 'uxbarn_remove_vc_prettyphoto', 99 );

			// Disable frontend edit feature (since VC 4.0.2)
			if ( function_exists( 'vc_disable_frontend' ) ) vc_disable_frontend();
			
			// This will hide certain tabs under the Settings->Visual Composer page + disable auto update checker by passing "true"
			if ( function_exists( 'vc_set_as_theme' ) ) vc_set_as_theme( true );
			
			// Changed VC template's folder name
			if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
				$dir = get_stylesheet_directory() . '/updated_vc_templates';
				vc_set_shortcodes_templates_dir( $dir );
			}
			
		}
		
	}

}



if ( ! function_exists( '_wp_render_title_tag' ) ) {
	
	function uxbarn_theme_slug_render_title() {
	?>
		<title><?php wp_title( '|', true, 'right' ); ?></title> 
	<?php
	}
	add_action( 'wp_head', 'uxbarn_theme_slug_render_title' );

}



if( ! function_exists('uxbarn_load_css')) {
	
	function uxbarn_load_css() {
		
		// Google fonts
		if ( function_exists( 'ot_get_option' ) ) {
				
			$google_fonts = ot_get_option('uxbarn_to_setting_google_fonts_loader');
			
			if(trim($google_fonts) == '') {
				$google_fonts = DEFAULT_GOOGLE_FONTS; // Default ones
			}
		
		} else {
			$google_fonts = DEFAULT_GOOGLE_FONTS;
		}
		
		$protocol = 'https';
		$query_args = array('family' => $google_fonts);
		
		// Prepare all styles
		wp_register_style('uxbarn-googleFonts', add_query_arg($query_args, $protocol . '://fonts.googleapis.com/css'), array(), null);
		
		wp_register_style('uxbarn-reset', get_template_directory_uri() . '/css/reset.css', array(), null);
		wp_register_style('uxbarn-foundation', get_template_directory_uri() . '/css/foundation.css', array(), null);
		wp_register_style('uxbarn-fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), null);
		
		// Deprecated since v1.8.0, use newer version instead
		//wp_register_style('uxbarn-isotope', get_template_directory_uri() . '/css/isotope.css', array(), null);
		//wp_register_style('uxbarn-fancybox-old', get_template_directory_uri() . '/css/jquery.fancybox-1.3.4.css', array(), null);
		
		wp_register_style( 'uxbarn-fancybox-helpers-thumbs', get_template_directory_uri() . '/css/fancybox/helpers/jquery.fancybox-thumbs.css', array(), null );
	    wp_register_style( 'uxbarn-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css', array( 'uxbarn-fancybox-helpers-thumbs' ), null );
		wp_register_style('uxbarn-theme', get_stylesheet_directory_uri() . '/style.css', array('uxbarn-reset', 'uxbarn-foundation'), null);
		wp_register_style('uxbarn-theme-responsive', get_template_directory_uri() . '/css/archtek-responsive.css', array('uxbarn-theme'), null);
		
		// Prepare color css for selected scheme in Style Customizer
		$option_set = get_option('uxbarn_sc_global_color_scheme');
		if($option_set) {
			if($option_set != 'custom') {
				wp_register_style('uxbarn-color-scheme', get_template_directory_uri() . '/css/colors/' . $option_set . '.css', array('uxbarn-theme'), null);
			}
		} else {
			wp_register_style('uxbarn-color-scheme', get_template_directory_uri() . '/css/colors/blue.css', array('uxbarn-theme'), null);
		}
		
		
		
		// Initially load the prepared styles
		wp_enqueue_style('uxbarn-googleFonts');
		wp_enqueue_style('uxbarn-reset');
		wp_enqueue_style('uxbarn-foundation');
		wp_enqueue_style('uxbarn-fontAwesome');
		
		// Load other resources on demand
		uxbarn_load_on_demand_assets();
		
		wp_enqueue_style('uxbarn-theme');
		wp_enqueue_style('uxbarn-theme-responsive');
		wp_enqueue_style('uxbarn-color-scheme');
		
		// For conditional comment for IE8
		global $wp_styles;
		wp_enqueue_style('uxbarn-foundation-ie8', get_template_directory_uri() . '/css/foundation-ie8.css', array('uxbarn-theme'), null);
		$wp_styles->add_data('uxbarn-foundation-ie8', 'conditional', 'IE 8' );
		wp_enqueue_style('uxbarn-theme-ie8', get_template_directory_uri() . '/css/archtek-ie8.css', array('uxbarn-theme'), null);
		$wp_styles->add_data('uxbarn-theme-ie8', 'conditional', 'IE 8' );
		
	}

}



if( ! function_exists('uxbarn_load_js')) {
	
	function uxbarn_load_js() {
		
		// Prepare all scripts
		wp_register_script('uxbarn-modernizr', get_template_directory_uri() . '/js/custom.modernizr.js', array('jquery'), null);
		wp_register_script('uxbarn-foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), null, true);
		wp_register_script('uxbarn-googleMap', '//maps.google.com/maps/api/js?sensor=false&v=3.5', array(), null, true);
		wp_register_script('uxbarn-hoverIntent', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js', array('jquery'), null, true);
		wp_register_script('uxbarn-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'), null, true);
		wp_register_script('uxbarn-supersubs', get_template_directory_uri() . '/js/supersubs.js', array('jquery'), null, true);
		//wp_enqueue_script('transit-js', get_stylesheet_directory_uri() . '/js/jquery.transit.min.js', array('jquery'), null, true);
		wp_register_script('uxbarn-touchSwipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array('jquery'), null, true);
		wp_register_script('uxbarn-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), null, true);
		wp_register_script('uxbarn-carouFredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.1.0.js', array('jquery', 'uxbarn-touchSwipe'), null, true);
		wp_register_script('uxbarn-hoverdir', get_template_directory_uri() . '/js/jquery.hoverdir.js', array('jquery'), null, true);
		wp_register_script('uxbarn-backstretch', get_template_directory_uri() . '/js/jquery.backstretch.min.js', array('jquery'), null, true);
		
		// Deprecated since v1.8.0, use newer version instead
		//wp_register_script('uxbarn-fancybox-old', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.js', array('jquery'), null, true);
		//wp_register_script('uxbarn-isotope-old', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), null, true);
		
		wp_register_script('uxbarn-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), null, true);
		wp_register_script('uxbarn-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery', 'uxbarn-imagesloaded'), null, true);
	    wp_register_script( 'uxbarn-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel-3.0.6.pack.js', array( 'jquery' ), null, true );
	    wp_register_script( 'uxbarn-fancybox-helpers-thumbs', get_template_directory_uri() . '/js/fancybox-helpers/jquery.fancybox-thumbs.js', array( 'jquery', 'uxbarn-mousewheel' ), null, true );
	    wp_register_script( 'uxbarn-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ), null, true );
		wp_register_script('uxbarn-scrollUp', get_template_directory_uri() . '/js/jquery.scrollUp.min.js', array('jquery'), null, true);
		
		wp_register_script('uxbarn-theme', get_template_directory_uri() . '/js/archtek.js', array('jquery'), null, true);
		
		
		
		// Initially load the prepared scripts
		wp_enqueue_script('uxbarn-modernizr');
		wp_enqueue_script('uxbarn-foundation');
		wp_enqueue_script('uxbarn-hoverIntent');
		wp_enqueue_script('uxbarn-superfish');
		wp_enqueue_script('uxbarn-supersubs');
		wp_enqueue_script('uxbarn-easing');
		wp_enqueue_script('uxbarn-backstretch');
		wp_enqueue_script('uxbarn-isotope'); // as mandatory to use its "imagesLoaded"
		
		// For home slider
		if(is_front_page() || uxbarn_is_frontpage_child()) {
			wp_enqueue_script('uxbarn-carouFredSel');
		}
		
		// Load other resources on demand
		uxbarn_load_on_demand_assets();
	
		// Prepare any values from Theme Options to be used in the front-end JS
		if ( function_exists( 'ot_get_option' ) ) {
				
			$use_fixed_header = ot_get_option('uxbarn_to_setting_use_fixed_header');
			if ( $use_fixed_header == '' || $use_fixed_header == 'false' ) {
				$use_fixed_header = false;
			} else {
				$use_fixed_header = true;
			}
			
			
			$display_scroll_to_top_button = ot_get_option('uxbarn_to_setting_display_scroll_to_top_button');
			if ( $display_scroll_to_top_button == '' || $display_scroll_to_top_button == 'false' ) {
				$display_scroll_to_top_button = false;
			} else {
				$display_scroll_to_top_button = true;
				wp_enqueue_script('uxbarn-scrollUp');
			}
			
			$auto_flipping_submenu = ot_get_option('uxbarn_to_setting_auto_flipping_submenu');
			if ( $auto_flipping_submenu == '' || $auto_flipping_submenu == 'false' ) {
				$auto_flipping_submenu = false;
			} else {
				$auto_flipping_submenu = true;
			}
			
			$basic_slider_transition = ot_get_option('uxbarn_to_setting_basic_slider_transition');
			$basic_slider_transition_speed = uxbarn_sanitize_numeric_input(
												ot_get_option('uxbarn_to_setting_basic_slider_transition_speed'), 
												1000);
			
			$basic_slider_auto_rotation = ot_get_option('uxbarn_to_setting_basic_slider_auto_rotation');
			if ( $basic_slider_auto_rotation == '' || $basic_slider_auto_rotation == 'false' ) {
				$basic_slider_auto_rotation = false;
			} else {
				$basic_slider_auto_rotation = true;
			}
			
			$basic_slider_rotation_duration = uxbarn_sanitize_numeric_input(
												ot_get_option('uxbarn_to_setting_basic_slider_rotation_duration'), 
												8000);
			
			$portfolio_slider_transition = ot_get_option('uxbarn_to_setting_portfolio_slider_transition');
			$portfolio_slider_transition_speed = uxbarn_sanitize_numeric_input(
													ot_get_option('uxbarn_to_setting_portfolio_slider_transition_speed'), 
													1000);
													
			$portfolio_slider_auto_rotation = ot_get_option('uxbarn_to_setting_portfolio_slider_auto_rotation');
			if ( $portfolio_slider_auto_rotation == '' || $portfolio_slider_auto_rotation == 'false' ) {
				$portfolio_slider_auto_rotation = false;
			} else {
				$portfolio_slider_auto_rotation = true;
			}
			
			$portfolio_slider_rotation_duration = uxbarn_sanitize_numeric_input(
													ot_get_option('uxbarn_to_setting_portfolio_slider_rotation_duration'), 
													5000);
													
			$enable_lightbox_wp_gallery = ot_get_option('uxbarn_to_setting_enable_lightbox_wp_gallery');
			if ( $enable_lightbox_wp_gallery == '' || $enable_lightbox_wp_gallery == 'false' ) {
				$enable_lightbox_wp_gallery = false;
			} else {
				$enable_lightbox_wp_gallery = true;
			}
			
		} else {
			
			$use_fixed_header = true;
			$display_scroll_to_top_button = false;
			$auto_flipping_submenu = true;
			$basic_slider_transition = 'directscroll';
			$basic_slider_transition_speed = 1000;
			$basic_slider_auto_rotation = true;
			$basic_slider_rotation_duration = 8000;
			$portfolio_slider_transition = 'directscroll';
			$portfolio_slider_transition_speed = 1000;
			$portfolio_slider_auto_rotation = true;
			$portfolio_slider_rotation_duration = 5000;
			$enable_lightbox_wp_gallery = true;
			
		}
		
		$params = array(
				'use_fixed_header' => $use_fixed_header,
				'display_scroll_to_top_button' => $display_scroll_to_top_button,
				'auto_flipping_submenu' => $auto_flipping_submenu,
				
				'basic_slider_transition' => $basic_slider_transition,
				'basic_slider_transition_speed' => $basic_slider_transition_speed,
				'basic_slider_auto_rotation' => $basic_slider_auto_rotation,
				'basic_slider_rotation_duration' => $basic_slider_rotation_duration,
				
				'portfolio_slider_transition' => $portfolio_slider_transition,
				'portfolio_slider_transition_speed' => $portfolio_slider_transition_speed,
				'portfolio_slider_auto_rotation' => $portfolio_slider_auto_rotation,
				'portfolio_slider_rotation_duration' => $portfolio_slider_rotation_duration,
				
				'enable_lightbox_wp_gallery' => $enable_lightbox_wp_gallery,
			);
			
		wp_localize_script('uxbarn-theme', 'ThemeOptions', $params);
		
		
		$foundation_params = array(
								'back_text' => __( 'Back', 'uxbarn' ),
							);
		wp_localize_script( 'uxbarn-foundation', 'FoundationParams', $foundation_params );
		
		
		// Finally Load the theme JS
		wp_enqueue_script('uxbarn-theme');
		
	}

}



if( ! function_exists('uxbarn_load_on_demand_assets')) {
	
	function uxbarn_load_on_demand_assets() {
			
		if(is_page() || is_single()) {
			
			// Specific page
			if(is_singular('portfolio')) {
				wp_enqueue_script('uxbarn-carouFredSel');
				wp_enqueue_style('uxbarn-fancybox');
				wp_enqueue_script('uxbarn-fancybox');
				wp_enqueue_style( 'uxbarn-fancybox-helpers-thumbs' );
				wp_enqueue_script( 'uxbarn-fancybox-helpers-thumbs' );
				
				$display_related_items = true;
				if ( function_exists( 'ot_get_option' ) ) {
					
					$display_related_items = ot_get_option('uxbarn_to_setting_display_related_items_section');
					if ( $display_related_items == '' || $display_related_items == 'false' ) {
						$display_related_items = false;
					} else {
						$display_related_items = true;
					}
					
				}
				
				if( $display_related_items ) {
					wp_enqueue_script('uxbarn-hoverdir');
					
					//wp_enqueue_style('uxbarn-isotope');
					//wp_enqueue_script('uxbarn-isotope');
				}
				
			}
			
			// For content section
			global $post;
			if(uxbarn_has_shortcode('uxb_portfolio', $post->post_content)) {
				wp_enqueue_script('uxbarn-hoverdir');
				
				//wp_enqueue_style('uxbarn-isotope');
				//wp_enqueue_script('uxbarn-isotope');
			}
			if(uxbarn_has_shortcode('vc_single_image', $post->post_content)) {
				wp_enqueue_style('uxbarn-fancybox');
				wp_enqueue_script('uxbarn-fancybox');
				wp_enqueue_style( 'uxbarn-fancybox-helpers-thumbs' );
				wp_enqueue_script( 'uxbarn-fancybox-helpers-thumbs' );
			}
			if(uxbarn_has_shortcode('gallery', $post->post_content)) {
				wp_enqueue_style('uxbarn-fancybox');
				wp_enqueue_script('uxbarn-fancybox');
				wp_enqueue_style( 'uxbarn-fancybox-helpers-thumbs' );
				wp_enqueue_script( 'uxbarn-fancybox-helpers-thumbs' );
			}
			if(uxbarn_has_shortcode('uxb_gallery', $post->post_content)) {
				wp_enqueue_style('uxbarn-fancybox');
				wp_enqueue_script('uxbarn-fancybox');
				wp_enqueue_style( 'uxbarn-fancybox-helpers-thumbs' );
				wp_enqueue_script( 'uxbarn-fancybox-helpers-thumbs' );
				wp_enqueue_script('uxbarn-carouFredSel');
			}
			if ( uxbarn_has_shortcode( 'vc_gallery', $post->post_content ) ) {
				
				//wp_enqueue_script( 'uxbarn-isotope' );
	            /*wp_enqueue_script( 'uxbarn-mousewheel' );
				wp_enqueue_style( 'uxbarn-fancybox' );
				wp_enqueue_script( 'uxbarn-fancybox' );
				wp_enqueue_style( 'uxbarn-fancybox-helpers-thumbs' );
				wp_enqueue_script( 'uxbarn-fancybox-helpers-thumbs' );
				wp_enqueue_script( 'uxbarn-flexslider' );
				wp_enqueue_style( 'uxbarn-flexslider' );*/
				
			}
			if(uxbarn_has_shortcode('uxb_testimonial_slider', $post->post_content)) {
				wp_enqueue_script('uxbarn-carouFredSel');
			}
			if(uxbarn_has_shortcode('uxb_googlemap', $post->post_content)) {
				wp_enqueue_script('uxbarn-googleMap');
			}
			if(uxbarn_has_shortcode('vc_accordion', $post->post_content)) {
				wp_enqueue_script('jquery-ui-accordion');
			}
			if(uxbarn_has_shortcode('vc_progress_bar', $post->post_content)) {
				wp_enqueue_script('waypoints');
			}
	
		} else if(is_tax()) {
			
			if(is_tax('portfolio-category')) {
				wp_enqueue_script('uxbarn-hoverdir');
				
				//wp_enqueue_style('uxbarn-isotope');
				//wp_enqueue_script('uxbarn-isotope');
			}
			
		}
	
	}

}



if( ! function_exists('uxbarn_load_admin_assets')) {
	
	function uxbarn_load_admin_assets($page) {
		
		// Load any theme admin CSS and JS only on these pages
		if($page == 'post.php' || 
			$page == 'post-new.php' || 
			$page == 'toplevel_page_ot-theme-options' || 
			$page == 'wpml-translation-management/menu/translations-queue.php') {
				
			// Enqueue script for media uploader to be used in Theme Options
			if($page == 'toplevel_page_ot-theme-options') {
				if(function_exists( 'wp_enqueue_media')) {
					wp_enqueue_media();
				}
			}
			
			wp_enqueue_script('admin-js', get_template_directory_uri() . '/js/admin.js', false, '1.0', true);
			wp_enqueue_style('admin-css', get_template_directory_uri() . '/css/admin.css', false, '1.0');
			
			$theme = wp_get_theme();
			
			$params = array(
				'template_path' => get_template_directory_uri(),
				'image_path' => IMAGE_PATH,
				'yes_text' => __('Yes', 'uxbarn'),
				'no_text' => __('No', 'uxbarn'),
				'theme_version' => __( 'Theme Version ', 'uxbarn' ) . $theme->get( 'Version' ),
				'welcome_text' => __('Welcome to theme options page! In case you need the support, you can find me at', 'uxbarn'),
			);
			wp_localize_script('admin-js', 'AdminSettings', $params);
		
		} else if($page == 'edit.php') { // Item list in backend
			wp_enqueue_style('admin-edit-css', get_template_directory_uri() . '/css/admin-edit.css', false, '1.0');
		}

		// For VC plugin settings
		if($page == 'settings_page_wpb_vc_settings' || $page == 'settings_page_vc_settings' || $page == 'toplevel_page_vc-general' ) { // toplevel_page_vc-general since VC 4.5
			wp_enqueue_style('admin-vc-settings', get_template_directory_uri() . '/css/admin-vc-settings.css', false, '1.0');
		}
		 
		// For TGMPA class
		wp_enqueue_style( 'uxbarn-tgmpa', get_template_directory_uri() . '/css/tgmpa.css', false );
		
	}

}



// Register Menu
if( ! function_exists('uxbarn_register_menus')) {
	
	function uxbarn_register_menus() {
		if (function_exists('register_nav_menus')) {
			
			// Header menu
			register_nav_menus(array(
				'header-menu' => __('Header Menu', 'uxbarn'),
				)
			);
			
		}
	}

}




// Register Sidebars
if( ! function_exists('uxbarn_register_sidebars')) {
	
	function uxbarn_register_sidebars() {
		
		register_sidebar(array (
			'name' => __('Blog Sidebar', 'uxbarn'),
			'id' => 'blog-widget-area',
			'description' => __('Blog\'s widget area', 'uxbarn'),
			'before_widget' => '<div class="widget-item row"><div class="uxb-col large-12 columns">',
			'after_widget' => "</div></div>",
			'before_title' => '<h4>',
			'after_title' => '</h4>',
			)
		);
	
		register_sidebar(array (
			'name' => __('Search Result Sidebar', 'uxbarn'),
			'id' => 'search-result-widget-area',
			'description' => __('Search result page\'s widget area', 'uxbarn'),
			'before_widget' => '<div class="widget-item row"><div class="uxb-col large-12 columns">',
			'after_widget' => "</div></div>",
			'before_title' => '<h4>',
			'after_title' => '</h4>',
			)
		);
		
		
		// Footer widget areas
		if ( function_exists( 'ot_get_option' ) ) {
				
			$number = 3;
			$display_footer_widgets = ot_get_option('uxbarn_to_setting_display_footer_widget_area');
			if ( $display_footer_widgets == '' || $display_footer_widgets == 'false' ) {
				$display_footer_widgets = false;
			} else {
				$display_footer_widgets = true;
			}
			
			if( $display_footer_widgets ) {
				
				$footer_widget_area_layout = ot_get_option('uxbarn_to_setting_footer_widget_area_columns');
				
				switch($footer_widget_area_layout) {
					case '1' : $number = 1; break;
					case '2' : $number = 2; break;
					case '3' : $number = 3; break;
					case '4' : $number = 4; break;
					default : $number = 3; break;
				}
				
			}
			
			for($i = 1; $i<=$number; $i++) {
				register_sidebar(array (
					'name' => sprintf(__('Footer Column %d', 'uxbarn'), $i),
					'id' => 'footer-widget-area-' . $i,
					'description' => __('Footer widget area', 'uxbarn'),
					'before_widget' => '<div class="footer-widget-item">',
					'after_widget' => "</div>",
					'before_title' => '<h5>',
					'after_title' => '</h5>',
					)
				);
			}
				
		}
			
		// Custom sidebars from options
		if (function_exists('ot_get_option')) {
			$custom_sidebars = ot_get_option('uxbarn_to_setting_custom_sidebars', array());
			if (!empty($custom_sidebars)) {
				$i = 1;
				foreach($custom_sidebars as $sidebar) {
					register_sidebar(array (
						'name' => $sidebar['title'],
						'id' => 'uxbarn-custom-sidebar_' . $i,
						'description' => $sidebar['uxbarn_to_setting_custom_sidebars_item_description'],
						'before_widget' => '<div class="widget-item row"><div class="uxb-col large-12 columns">',
						'after_widget' => '</div></div>',
						'before_title' => '<h4>',
						'after_title' => '</h4>',
						)
					);
					
					$i++;
				}
			}
		}
		
	}

}


/*if( ! function_exists('uxbarn_rewrite_site_title')) {
	
	function uxbarn_rewrite_site_title($title, $sep, $seplocation) {
		
		global $page, $paged;
		// Don't affect in feeds.
		if (is_feed()) {
			return $title;
		}
		
		// Add the blog name
		if ('right' == $seplocation) {
			$title .= get_bloginfo('name');
		} else {
			$title = get_bloginfo('name') . $title;
		}
		
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		
		if ($site_description && is_front_page()) {
			$title .= " {$sep} {$site_description}";
		}
		
		// Add a page number if necessary:
		if ($paged >= 2 || $page >= 2) {
			$title .= " - " . sprintf(__('Page %s', 'uxbarn'), max($paged, $page));
		}
		
		return $title;
		
	}
	
}*/



if( ! function_exists('uxbarn_merge_image_sizes')) {
	
	function uxbarn_merge_image_sizes( $sizes ) {  
		$size_array = array();
		
		foreach (get_intermediate_image_sizes() as $s) {
			
			global $_wp_additional_image_sizes;
			
			if (isset($_wp_additional_image_sizes[$s])) {
				$width = intval($_wp_additional_image_sizes[$s]['width']);
				$height = intval($_wp_additional_image_sizes[$s]['height']);
			} else {
				$width = get_option($s.'_size_w');
				$height = get_option($s.'_size_h');
			}
			
			$clean_name = ucwords(str_replace('cropped', '', str_replace('-', ' ', $s)));
			
			$size_array[$s] = $clean_name;
			
		} 
		return array_merge( $sizes, $size_array );  
	}
	
}



if( ! function_exists('uxbarn_update_user_profile_fields')) {
	
	function uxbarn_update_user_profile_fields($field) {
	
		$field['twitter'] = __('Twitter URL', 'uxbarn');
		$field['facebook'] = __('Facebook URL', 'uxbarn');
		$field['google'] = __('Google+ URL', 'uxbarn');
		$field['linkedin'] = __('LinkedIn URL', 'uxbarn');
		$field['dribbble'] = __('Dribbble URL', 'uxbarn');
		$field['forrst'] = __('Forrst URL', 'uxbarn');
		$field['flickr'] = __('Flickr URL', 'uxbarn');
		 
		return $field;
	}

}



if( ! function_exists('uxbarn_the_excerpt_max_charlength')) {
	
	function uxbarn_the_excerpt_max_charlength($excerpt, $charlength) {
		$charlength++;
	
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				$excerpt = mb_substr( $subex, 0, $excut );
			} else {
				$excerpt = $subex;
			}
			return $excerpt . ' ... ';
		} else {
			return $excerpt;
		}
	}
	
}



if( ! function_exists('uxbarn_trim_string')) {
	
	function uxbarn_trim_string($string, $charlength) {
		return uxbarn_the_excerpt_max_charlength($string, $charlength);
	}
	
}

if( ! function_exists('uxbarn_custom_excerpt_length')) {
	
	function uxbarn_custom_excerpt_length($length) {
		return 45;
	}
	
}

if( ! function_exists('uxbarn_new_excerpt_more')) {
	
	function uxbarn_new_excerpt_more($more) {
		return ' ... ';
	}
	
}

if( ! function_exists('uxbarn_get_portfolio_meta_text')) {
	
	function uxbarn_get_portfolio_meta_text($string) {
		if(trim($string) == '') {
			return '-';
		} else {
			return $string;
		}
	}
	
}

if( ! function_exists('uxbarn_request_filter')) {
	
	function uxbarn_request_filter( $query_vars ) {
		if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
			$query_vars['s'] = " ";
		}
		return $query_vars;
		
	}

}

if( ! function_exists('uxbarn_alter_query_object')) {
	
	function uxbarn_alter_query_object($query) {
		if(!is_admin() && $query->is_main_query()) {
			if(is_tax('portfolio-category')) {
				$query->set('posts_per_page', -1); // Reset posts-per-page for taxonomy-portfolio-category.php
			}
		}
	}
	
}

// For Team Member CPT
if( ! function_exists('uxbarn_get_member_social_list_string')) {
	
	function uxbarn_get_member_social_list_string($member_id) {
		$social_name_array = array(
			__('Twitter', 'uxbarn') => 'uxbarn_team_social_twitter', 
			__('Facebook', 'uxbarn') => 'uxbarn_team_social_facebook', 
			__('Google+', 'uxbarn') => 'uxbarn_team_social_googleplus',  
			__('LinkedIn', 'uxbarn') => 'uxbarn_team_social_linkedin', 
			__('Dribbble', 'uxbarn') => 'uxbarn_team_social_dribbble', 
			__('Forrst', 'uxbarn') => 'uxbarn_team_social_forrst', 
			__('Flickr', 'uxbarn') => 'uxbarn_team_social_flickr',
		);
		
		$social_list_item_string = '';
		foreach($social_name_array as $key => $value) {
			$social_list_item_string .= uxbarn_get_member_social_list_item($member_id, $value, $key);
		}
		
		return $social_list_item_string;
	}
	
}

// To be used by "get_member_social_list_string()" function
if( ! function_exists('uxbarn_get_member_social_list_item')) {
	
	function uxbarn_get_member_social_list_item($member_id, $custom_field_id, $filename) {
		
		$link = trim(uxbarn_get_array_value(get_post_meta($member_id, $custom_field_id), 0));
		
		if($link) {
			return '<li><a href="' . $link . '" target="_blank"><img src="' . IMAGE_PATH . '/social/team/' . $filename . '.png" alt="' . $filename . '" title="' . $filename . '" width="22" height="22" /></a></li>';
		} else {
			return '';
		}
	}
	
}

// For social icons in "footer.php"
if( ! function_exists('uxbarn_get_footer_social_list_string')) {
	
	function uxbarn_get_footer_social_list_string() {
		
		if ( function_exists( 'ot_get_option' ) ) {
				
			$social_name_array = array(
				__('Facebook', 'uxbarn') => 'uxbarn_to_setting_social_facebook', 
				__('Twitter', 'uxbarn') => 'uxbarn_to_setting_social_twitter', 
				__('Google+', 'uxbarn') => 'uxbarn_to_setting_social_google_plus',  
				__('LinkedIn', 'uxbarn') => 'uxbarn_to_setting_social_linkedin', 
				__('Flickr', 'uxbarn') => 'uxbarn_to_setting_social_flickr',
				__('Vimeo', 'uxbarn') => 'uxbarn_to_setting_social_vimeo', 
				__('YouTube', 'uxbarn') => 'uxbarn_to_setting_social_youtube', 
				__('Forrst', 'uxbarn') => 'uxbarn_to_setting_social_forrst', 
				__('Dribbble', 'uxbarn') => 'uxbarn_to_setting_social_dribbble', 
				__('RSS', 'uxbarn') => 'uxbarn_to_setting_social_rss', 
			);
			
			$social_list_item_string = '';
			foreach($social_name_array as $key => $value) {
				$social_list_item_string .= uxbarn_get_footer_social_list_item($value, $key);
			}
			
			return $social_list_item_string;
			
		} else {
			return '';
		}
		
	}

}

// To be used by "get_footer_social_list_string()"
if( ! function_exists('uxbarn_get_footer_social_list_item')) {
	
	function uxbarn_get_footer_social_list_item($option_id, $name) {
		
		$link = trim(ot_get_option($option_id));
		$filename = strtolower($name);
		
		if($filename == 'google+') {
			$filename = 'google-plus';
		}
		
		if($link) {
			return '<li><a href="' . $link . '" target="_blank"><img src="' . IMAGE_PATH . '/social/' . $filename . '-bw.png" alt="" title="" width="25" height="25" /><img class="hover" src="' . IMAGE_PATH . '/social/' . $filename . '.png" alt="' . $name . '" title="' . $name . '"  width="25" height="25" /></a></li>';
		} else {
			return '';
		}
	}

}

// To be called in "header.php" and "footer.php" files
if( ! function_exists('uxbarn_get_slider_header_footer_style')) {
	
	function uxbarn_get_slider_header_footer_style() {
		
		$header_style = 'full-width';
		if ( function_exists( 'ot_get_option' ) ) {
			$header_style = ot_get_option('uxbarn_to_setting_slider_header_style');
		}
		
		if($header_style == 'fixed-width') {
			return ' class="fixed-width" ';
		} else {
			return '';
		}
	}
	
}


if( ! function_exists('uxbarn_register_meta_boxes')) {
	
	function uxbarn_register_meta_boxes() {
		require_once(get_template_directory() . '/includes/meta-post.php');
		require_once(get_template_directory() . '/includes/meta-page.php');
		require_once(get_template_directory() . '/includes/meta-homeslider.php');
		require_once(get_template_directory() . '/includes/meta-portfolio.php');
		require_once(get_template_directory() . '/includes/meta-team.php');
		require_once(get_template_directory() . '/includes/meta-testimonials.php');
	}

}




// ---------------------------------------------- //
// Theme Helper Functions
// ---------------------------------------------- //

if( ! function_exists('uxbarn_get_attachment')) {
	
	function uxbarn_get_attachment($attachment_id) {
		
		$attachment = get_post($attachment_id);
		
		// Need to check it first
		if(isset($attachment)) {
				
			return array(
				'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
				'caption' => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href' => get_permalink($attachment->ID),
				'src' => $attachment->guid,
				'title' => $attachment->post_title,
			);
		
		} else {
			return array(
				'alt' => 'N/A',
				'caption' => 'N/A',
				'description' => 'N/A',
				'href' => 'N/A',
				'src' => 'N/A',
				'title' => 'N/A',
			);
		}
	}
	
}

if( ! function_exists('uxbarn_get_attachment_id_from_src')) {
	
	function uxbarn_get_attachment_id_from_src($image_src) {
		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
		$id = $wpdb->get_var($query);
		return $id;
	}

}

// For checking whether there is specified shortcode incluced in the current post
if( ! function_exists('uxbarn_has_shortcode')) {
		
	function uxbarn_has_shortcode($shortcode = '', $content) {
		
		// false because we have to search through the post content first
		$found = false;
		
		// if no short code was provided, return false
		if (!$shortcode) {
			return $found;
		}
		// check the post content for the short code
		if ( stripos($content, '[' . $shortcode) !== false ) {
			// we have found the short code
			$found = true;
		}
		
		// return our final results
		return $found;
	}

}

// Helper function for retrieving the content whether when using with VC or from normal editor
// Plus to fix any invalid HTML tags. Need to use within the loop.
if( ! function_exists('uxbarn_get_final_post_content')) {
	
	function uxbarn_get_final_post_content() {
		
		$content = get_the_content();
		
		// Need to use filter for applying the format back when using "get_the_content()" above
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		
		$final_content = balanceTags( $content, true );//uxbarn_get_html_validated_content($content); //uxbarn_DOMinnerHTML($dom->getElementById('dummy-wrapper'));
		
		// Essential Grid plugin might has some issue with "balanceTags()" so doesn't apply the function when there is its shortcode
		if( uxbarn_has_shortcode( 'ess_grid', get_the_content() ) ) {
			$final_content = $content;
		}
		
		// If user is using VC for the content
		if(uxbarn_has_shortcode('vc_row', get_the_content())) {
			
			// Get inner HTML of the dummy node
			return $final_content;
		
		} else { // In case the user is using normal post editor (no "vc_row" shortcode found)
		
			if(is_singular('post')) { // single post, no padding
			
				return $final_content;
			
			} else { // normal page
					
				return 
					'<div class="row">
						<div class="uxb-col large-12 columns">
							' . $final_content . ' 
						</div>
					</div>';
					
			}
		}
	}

}

if( ! function_exists('uxbarn_is_frontpage_child')) {
	
	function uxbarn_is_frontpage_child() {
		
		$show_on_front = get_option( 'show_on_front' );
		
		if ( $show_on_front == 'page') {
		
			$is_frontpage_child = false;
			global $post;
			if($post) {
				if($post->post_parent == get_option('page_on_front')) {
					$is_frontpage_child = true;
				}
			}
			return $is_frontpage_child;
			
		} else {
			return false;
		}
		
	}
	
}

// For getting array value when using with OptionTree meta box
if( ! function_exists('uxbarn_get_array_value')) {
	
	function uxbarn_get_array_value($array, $index) {
		return isset($array[$index]) ? $array[$index] : '';
	}
	
}

if( ! function_exists('uxbarn_replace_string_with_assoc_array')) {
	
	function uxbarn_replace_string_with_assoc_array(array $replace, $subject) { 
	   return str_replace(array_keys($replace), array_values($replace), $subject);    
	}
	
}

if( ! function_exists('uxbarn_get_translated_text_from_qTranslate')) {
	
	function uxbarn_get_translated_text_from_qTranslate($text) {
		// For qTranslate function (only work if it is installed) 
		if (function_exists('qtrans_getLanguage')) {
			$lan = qtrans_getLanguage();
			return qtrans_use($lan, $text, true);
		} else {
			return $text;
		}
	}
	
}

if( ! function_exists('uxbarn_get_comment_count_text')) {
		
	function uxbarn_get_comment_count_text($num_comments) {
		if ( $num_comments == 0 ) {
			return __('0 Comment', 'uxbarn');
		} elseif ( $num_comments > 1 ) {
			return $num_comments . __(' Comments', 'uxbarn');
		} else {
			return __('1 Comment', 'uxbarn');
		}
		
	}
	
}

if( ! function_exists('uxbarn_hex2rgb')) {
	
	function uxbarn_hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
	 
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   
	   return $rgb; // returns an array with the rgb values
	}
	
}

if( ! function_exists('uxbarn_get_sanitized_url')) {
		
	function uxbarn_get_sanitized_url($link) {
		if(trim($link) == '' || trim($link) == 'http://' || trim($link) == '#') {
			return '#';
		} else {
			if(strpos($link,'http://') === false) {
				if(strpos($link,'https://') !== false) {
					return $link;
				} else {
					return 'http://' . $link;
				}
			} else {
				return $link;
			}
		}
	}
	
}

if( ! function_exists('uxbarn_sanitize_numeric_input')) {
		
	function uxbarn_sanitize_numeric_input($input, $default) {
		
		if(trim($input) != '') {
			
			if(is_numeric($input)) {
				return $input;
			} else {
				return $default;
			}
			
		} else {
			return $default;
		}
		
	}
	
}

if( ! function_exists('uxbarn_sanitize_for_attribute')) {
		
	function uxbarn_sanitize_for_attribute($input) {
		
		if(trim($input) != '') {
			
			return esc_attr(strip_tags($input));
			
		} else {
			return '';
		}
		
	}

}

if( ! function_exists('uxbarn_is_old_android')) {
	
	function uxbarn_is_old_android($version = '4.0.0'){
	 
		if(strstr($_SERVER['HTTP_USER_AGENT'], 'Android')){
			
			preg_match('/Android (\d+(?:\.\d+)+)[;)]/', $_SERVER['HTTP_USER_AGENT'], $matches);
	 
			return version_compare($matches[1], $version, '<=');
	 
		}
	 
	}
}


// ---------------------------------------------- //
// Plugins
// ---------------------------------------------- //

if( ! function_exists('uxbarn_register_additional_plugins')) {
	
	function uxbarn_register_additional_plugins() {
		
		$plugins = array(
			array(
				'name' => 'Visual Composer',
				'slug' => 'js_composer',
				'source' => get_template_directory() . '/includes/plugin-packages/vc_4.11.2.zip',
				'required' => true,
				'version' => '4.11.2',
			),
			array(
				'name' => 'LayerSlider',
				'slug' => 'LayerSlider',
				'source' => get_template_directory() . '/includes/plugin-packages/layerslider_5.6.5.zip',
				'required' => true,
				'version' => '5.6.5',
			),
			array(
				'name' => 'Categories Images',
				'slug' => 'categories-images',
				'required' => false,
				'version' => '',
			),
			array(
				'name' => 'Contact Form 7',
				'slug' => 'contact-form-7',
				'required' => false,
				'version' => '',
			),
			
			array(
				'name' 		=> 'OptionTree',
				'slug' 		=> 'option-tree',
				'required' 	=> true,
				'version' 	=> '',
			),
			
		);

		tgmpa( $plugins );
	}

}



// Register a custom function to override some LayerSlider data
add_action('layerslider_ready', 'uxbarn_layerslider_overrides');
if( ! function_exists('uxbarn_layerslider_overrides')) {
	function uxbarn_layerslider_overrides() {
		// Items to override
		//$GLOBALS['lsPluginPath'] = get_template_directory_uri() . '/includes/layerslider/';
		$GLOBALS['lsAutoUpdateBox'] = false;
	}
}



/***** OptionTree Filters *****/

// Hide Theme Options UI builder
add_filter( 'ot_show_options_ui', '__return_false' );
// Hide Documentation menu
add_filter( 'ot_show_docs', '__return_false' );
// Hide Layout Tab
add_filter( 'ot_show_new_layout', '__return_false' );