<?php

// ---------------------------------------------- //
// VC Exising Elements Customization
// ---------------------------------------------- //

// Customize CSS classes to use Foundation
if(!function_exists('uxbarn_customize_custom_css_classes')) {
	function uxbarn_customize_custom_css_classes($class_string, $tag) {
			
		// vc_row 
		if ($tag=='vc_row' || $tag=='vc_row_inner') {
			$replace = array(
				'vc_row-fluid' => 'row',
				'wpb_row' => '',
				'vc_row' => '',
			);
			$class_string = uxbarn_replace_string_with_assoc_array($replace, $class_string);
		}
		
		// vc_column
		if ($tag=='vc_column' || $tag=='vc_column_inner') {
			$replace = array(
				'wpb_column' => '',
				'column_container' => '',
			);
			$to_be_replaced = array('', '');
			
			$class_string = uxbarn_replace_string_with_assoc_array(
								$replace, preg_replace('/vc_span(\d{1,2})/', 'uxb-col large-$1 columns', $class_string)
							);
							
			// Custom columns	
			$class_string = uxbarn_replace_string_with_assoc_array(
								$replace, preg_replace('/vc_(\d{1,2})\\/12/', 'uxb-col large-$1 columns', $class_string)
							);
							
			// VC 4.3.x (it changed the tags)
			$class_string = uxbarn_replace_string_with_assoc_array(
								$replace, preg_replace('/vc_col-(xs|sm|md|lg)-(\d{1,2})/', 'uxb-col large-$2 columns', $class_string)
							);
			
		}
		
		return $class_string;
	}
}
add_filter('vc_shortcodes_css_class', 'uxbarn_customize_custom_css_classes', 10, 2);



// ---------------------------------------------- //
// New Custom Params Registration
// ---------------------------------------------- //
require_once(get_template_directory() . '/includes/vc-extension/custom-attr-types.php');





// ---------------------------------------------- //
// Remove Default Elements
// ---------------------------------------------- //
// We will add some of them back later in the 
// following code for re-ordering purpose.
// ---------------------------------------------- //
if(!function_exists('uxbarn_remove_default_vc_elements')) {
	function uxbarn_remove_default_vc_elements() {
		
		if ( function_exists( 'vc_remove_element' ) ) {
				
			vc_remove_element( 'vc_row' ); // re-enable in mapping.php
			vc_remove_element('vc_button');
			vc_remove_element('vc_twitter');
			vc_remove_element('vc_googleplus');
			vc_remove_element('vc_tweetmeme');
			vc_remove_element('vc_facebook');
			vc_remove_element('vc_pinterest');
			vc_remove_element('vc_single_image'); // re-enable in mapping.php
			vc_remove_element('vc_gallery'); 
			vc_remove_element('vc_tabs'); // re-enable in mapping.php
			vc_remove_element('vc_tour'); // re-enable in mapping.php
			vc_remove_element('vc_accordion'); // re-enable in mapping.php
			vc_remove_element('vc_toggle');
			//vc_remove_element('vc_separator');
			vc_remove_element('vc_progress_bar'); // re-enable in mapping.php
			vc_remove_element('vc_cta_button');
			vc_remove_element('vc_message');
			vc_remove_element('vc_text_separator');
			vc_remove_element('vc_teaser_grid');
			vc_remove_element('vc_posts_slider');
			vc_remove_element('vc_video');
			vc_remove_element('vc_gmaps');
			vc_remove_element('vc_raw_html'); // re-enable in mapping.php
			vc_remove_element('vc_raw_js'); // re-enable in mapping.php
			vc_remove_element('vc_flickr'); // re-enable in mapping.php
			vc_remove_element('vc_wp_search');
			vc_remove_element('vc_wp_meta');
			vc_remove_element('vc_wp_recentcomments');
			vc_remove_element('vc_wp_calendar');
			vc_remove_element('vc_wp_pages');
			vc_remove_element('vc_wp_tagcloud');
			vc_remove_element('vc_wp_custommenu');
			vc_remove_element('vc_wp_text');
			vc_remove_element('vc_wp_posts');
			vc_remove_element('vc_wp_links');
			vc_remove_element('vc_wp_categories');
			vc_remove_element('vc_wp_archives');
			vc_remove_element('vc_wp_rss');
			vc_remove_element('vc_widget_sidebar');
			vc_remove_element('contact-form-7'); // re-enable in mapping.php
			vc_remove_element('layerslider_vc'); // re-enable in mapping.php
			vc_remove_element('gravityform'); // re-enable in mapping.php
			vc_remove_element('vc_pie'); // re-enable in mapping.php
			
			// From 3.7.1
			vc_remove_element( 'vc_posts_grid' ); // re-enable in mapping.php
			vc_remove_element( 'vc_carousel' );
			vc_remove_element( 'vc_images_carousel' );
			
			// From 4.0.2
			//vc_remove_element( 'vc_button2' );
			vc_remove_element( 'vc_cta_button2' );
			
			// From 4.7.x
			vc_remove_element( 'vc_tta_pageable' );
			vc_remove_element( 'vc_tta_accordion' );
			vc_remove_element( 'vc_tta_tour' );
			vc_remove_element( 'vc_tta_tabs' );
			
		}

		if ( function_exists( 'vc_remove_param' ) ) {
			
			vc_remove_param( 'vc_column', 'font_color' );
			vc_remove_param( 'vc_column', 'css' );
			vc_remove_param( 'vc_column', 'width' );
			vc_remove_param( 'vc_column', 'offset' );
			vc_remove_param( 'vc_column_text', 'css' );
			
		}

	}
}
add_action('admin_init', 'uxbarn_remove_default_vc_elements');


// ---------------------------------------------- //
// Theme Shortcodes Mapping With VC
// ---------------------------------------------- //
if(!function_exists('uxbarn_map_shortcodes')) {
		
	define('VC_EDIT_MODE_JS', get_template_directory_uri().'/includes/vc-extension/js/vc-extension.js');
	define('VC_EDIT_MODE_CSS', '');
	
	function uxbarn_map_shortcodes() {
		
		$mapping_path = get_template_directory() . '/includes/vc-extension/mapping-shortcodes';
		
		require_once(get_template_directory() . '/includes/vc-extension/param-array.php');
		
		if ( function_exists( 'vc_map' ) ) {
			require_once($mapping_path . '/mapping.php');
		}
		
		
		// Modify VC element orders (since theme v1.5.0)
		if ( function_exists( 'vc_map_update' ) ) {
			
			if ( shortcode_exists( 'vc_row' ) ) {
				vc_map_update( 'vc_row', array( 'weight' => 500 ) );
			}

			if ( shortcode_exists( 'vc_column_text' ) ) {
				vc_map_update( 'vc_column_text', array( 'weight' => 495 ) );
			}
			
			if ( shortcode_exists( 'uxb_heading' ) ) {
				vc_map_update( 'uxb_heading', array( 'weight' => 490 ) );
			}
			
			if ( shortcode_exists( 'vc_custom_heading' ) ) {
				vc_map_update( 'vc_custom_heading', array( 'weight' => 485 ) );
			}

			if ( shortcode_exists( 'uxb_button' ) ) {
				vc_map_update( 'uxb_button', array( 'weight' => 480 ) );
			}
			
			if ( shortcode_exists( 'vc_button2' ) ) {
				vc_map_update( 'vc_button2', array( 'weight' => 475 ) );
			}
			
			if ( shortcode_exists( 'uxb_icon' ) ) {
				vc_map_update( 'uxb_icon', array( 'weight' => 470 ) );
			}
			
			if ( shortcode_exists( 'vc_single_image' ) ) {
				vc_map_update( 'vc_single_image', array( 'weight' => 465 ) );
			}
			
			if ( shortcode_exists( 'uxb_video' ) ) {
				vc_map_update( 'uxb_video', array( 'weight' => 460 ) );
			}
			
			if ( shortcode_exists( 'uxb_blockquote' ) ) {
				vc_map_update( 'uxb_blockquote', array( 'weight' => 455 ) );
			}

			if ( shortcode_exists( 'uxb_messagebox' ) ) {
				vc_map_update( 'uxb_messagebox', array( 'weight' => 450 ) );
			}

			if ( shortcode_exists( 'uxb_googlemap' ) ) {
				vc_map_update( 'uxb_googlemap', array( 'weight' => 445 ) );
			}
			
			if ( shortcode_exists( 'uxb_gallery' ) ) {
				vc_map_update( 'uxb_gallery', array( 'weight' => 440 ) );
			}

			if ( shortcode_exists( 'vc_flickr' ) ) {
				vc_map_update( 'vc_flickr', array( 'weight' => 435 ) );
			}
			
			if ( shortcode_exists( 'vc_tabs' ) ) {
				vc_map_update( 'vc_tabs', array( 'weight' => 430 ) );
			}
			
			if ( shortcode_exists( 'vc_tour' ) ) {
				vc_map_update( 'vc_tour', array( 'weight' => 425 ) );
			}
			
			if ( shortcode_exists( 'vc_accordion' ) ) {
				vc_map_update( 'vc_accordion', array( 'weight' => 420 ) );
			}
			
			if ( shortcode_exists( 'uxb_divider' ) ) {
				vc_map_update( 'uxb_divider', array( 'weight' => 415 ) );
			}
			
			if ( shortcode_exists( 'vc_separator' ) ) {
				vc_map_update( 'vc_separator', array( 'weight' => 410 ) );
			}
			
			if ( shortcode_exists( 'vc_empty_space' ) ) {
				vc_map_update( 'vc_empty_space', array( 'weight' => 405 ) );
			}

			if ( shortcode_exists( 'vc_pie' ) ) {
				vc_map_update( 'vc_pie', array( 'weight' => 400 ) );
			}
			
			if ( shortcode_exists( 'vc_progress_bar' ) ) {
				vc_map_update( 'vc_progress_bar', array( 'weight' => 395 ) );
			}
			
			if ( shortcode_exists( 'uxb_cta_box' ) ) {
				vc_map_update( 'uxb_cta_box', array( 'weight' => 390 ) );
			}

			if ( shortcode_exists( 'uxb_portfolio' ) ) {
				vc_map_update( 'uxb_portfolio', array( 'weight' => 385 ) );
			}

			if ( shortcode_exists( 'uxb_team_member' ) ) {
				vc_map_update( 'uxb_team_member', array( 'weight' => 380 ) );
			}

			if ( shortcode_exists( 'uxb_testimonial_slider' ) ) {
				vc_map_update( 'uxb_testimonial_slider', array( 'weight' => 375 ) );
			}
			
			if ( shortcode_exists( 'uxb_blog_posts' ) ) {
				vc_map_update( 'uxb_blog_posts', array( 'weight' => 370 ) );
			}
			
			if ( shortcode_exists( 'uxb_searchform' ) ) {
				vc_map_update( 'uxb_searchform', array( 'weight' => 365 ) );
			}
			
		}
		
	}
}
// Need to hook this function with init because registering cpt & tax are hooked with init too
// then these templates can call "get_terms()", for example, to list the tax terms for selection.
// Otherwise, the tax terms will not be recognized.
// In other words, including templates above must be called after cpt & tax registration.
add_action('admin_init', 'uxbarn_map_shortcodes');



// Add some custom param to the existing elements
if(!function_exists('uxbarn_add_custom_param_to_vc_elements')) {
	function uxbarn_add_custom_param_to_vc_elements() {
		
		if ( function_exists( 'vc_add_param' ) ) {
			
			$theme_class_desc = __('You can select some predefined options here for additional styles (Learn more about this in the documentation on "Tutorial" section). If you want more custom styles, please enter your custom CSS class to the "Extra class name" field above.', 'uxbarn');
			
			// To Row element
			$predefined_class_for_row = uxbarn_get_predefined_class_for_row_array( $theme_class_desc );
			vc_add_param('vc_row', $predefined_class_for_row);
			
			// To Column element
			$predefined_class_for_column = uxbarn_get_predefined_class_for_column_array( $theme_class_desc );
			vc_add_param('vc_column', $predefined_class_for_column);
					
		}

	}
}
add_action('admin_init', 'uxbarn_add_custom_param_to_vc_elements');


if(!function_exists('uxbarn_add_custom_param_to_vc_inner_elements')) {
	function uxbarn_add_custom_param_to_vc_inner_elements() {
		
		if ( function_exists( 'vc_add_param' ) ) {
			
			$theme_class_desc = __('You can select some predefined options here for additional styles (Learn more about this in the documentation on "Tutorial" section). If you want more custom styles, please enter your custom CSS class to the "Extra class name" field above.', 'uxbarn');
			// To Inner Row element
			$predefined_class_for_row = uxbarn_get_predefined_class_for_row_array( $theme_class_desc );
			vc_add_param('vc_row_inner', $predefined_class_for_row);
			
			// To Inner Column element
			$predefined_class_for_column = uxbarn_get_predefined_class_for_column_array( $theme_class_desc );
			vc_add_param('vc_column_inner', $predefined_class_for_column);
					
		}
		
	}
}
add_action('vc_before_init', 'uxbarn_add_custom_param_to_vc_inner_elements');





if(!function_exists('uxbarn_get_predefined_class_for_row_array')) {
	function uxbarn_get_predefined_class_for_row_array( $theme_class_desc ) {
		return array(
					 'type' => 'checkbox',
					 'holder' => 'span',
					 'class' => '',
					 'heading' => __('Predefined options', 'uxbarn'),
					 'param_name' => 'uxb_theme_class',
					 'value' => array(
									__('Increase outer padding', 'uxbarn') . '<br/>' => 'outer-padding',
									__('Make contained columns smaller padding', 'uxbarn') . '<br/>' => 'col-small-padding',
									__('Increase top margin', 'uxbarn') . '<br/>' => 'top-margin',
									__('No top padding', 'uxbarn') . '<br/>' => 'no-padding-top',
									__('No bottom padding', 'uxbarn') . '<br/>' => 'no-padding-bottom',
									__('Has line at the bottom', 'uxbarn') . '<br/>' => 'bottom-line',
									__('No background', 'uxbarn') . '<br/>' => 'no-bg',
								),
					'save_always' => true,
					 'description' => $theme_class_desc,
					 'admin_label' => false,
				  );
	}
}


if(!function_exists('uxbarn_get_predefined_class_for_column_array')) {
	function uxbarn_get_predefined_class_for_column_array( $theme_class_desc ) {
		return array(
					 'type' => 'checkbox',
					 'holder' => 'span',
					 'class' => '',
					 'heading' => __('Predefined options', 'uxbarn'),
					 'param_name' => 'uxb_theme_class',
					 'value' => array(
									__('For nesting other rows/columns <em>(if use this, please also uncheck "No padding" option below)</em>', 'uxbarn') . '<br/>' => 'for-nested',
									__('No padding', 'uxbarn') . '<br/>' => 'no-padding',
									__('Has line at the bottom', 'uxbarn') . '<br/>' => 'bottom-line',
									__('Center alignment', 'uxbarn') . '<br/>' => 'col-center',
									__('Fixed 255px height', 'uxbarn') . '<br/>' => 'height-255',
									__('Fixed 510px height', 'uxbarn') . '<br/>' => 'height-510',
								),
					'save_always' => true,
					 'description' => $theme_class_desc,
					 'admin_label' => false,
				  );
	}
}


// ---------------------------------------------- //
// Extended class (use in "team member" shortcode)
// ---------------------------------------------- //
class VCCustomExtended extends WPBakeryShortCode {}




// *** UPDATE: Since theme v1.7.0, the entire sections below are obsoleted.


/*if(!function_exists('uxbarn_load_custom_vc_js')) {
	function uxbarn_load_custom_vc_js() {
		// ---------------------------------
		// wpb_composer_front_js (v4.3.2)
		// ---------------------------------
		// Main purposes are to: 
		// 1. Unload script of vc accordion to use our own
		// 2. Fix the conflict with Theme Customizer in "vc_tabsBehaviour()", so the function is commented out
		//wp_deregister_script('wpb_composer_front_js');
		//wp_register_script('wpb_composer_front_js', get_template_directory_uri() . '/includes/vc-extension/js/js_composer_front.js', array('jquery'), WPB_VC_VERSION, true);
	}
}
add_action('wp_enqueue_scripts', 'uxbarn_load_custom_vc_js');





// Drop default js and override using our custom cloned js instead
// NOTE: Search for "// CUSTOM CODE" in the file to see the modified/added code
if(!function_exists('uxbarn_load_admin_custom_vc_js')) {
	function uxbarn_load_admin_custom_vc_js() {
		
		// ---------------------------------
		// wpb_js_composer_js_atts (v3.6.12)
		// ---------------------------------
		// Main purposes are to: 
		// 1. Add one more custom type of "uxb_checkbox" to change some styles (line-break + label wrapper)
	   // wp_deregister_script('wpb_js_composer_js_atts');
	  //  wp_register_script('wpb_js_composer_js_atts', get_template_directory_uri() . '/includes/vc-extension/js/composer-atts.js', array('wpb_js_composer_js_tools'), WPB_VC_VERSION, true);
		
		
		// ---------------------------------
		// wpb_js_composer_js_view (v3.6.12)
		// ---------------------------------
		// Main purposes are to: 
		// 1. Lock the background position (hide scrollbar) when the modal is active (via edit pencil icon)
		// 2. Unlock the background position when the modal is closed (via "X" and "Cancel" button)
		// 3. (replaced with 4.) Fix twice confirmation alert (second alert comes up after clicking "Cancel" on the first one)
		// 4. Remove confirmation dialog out of Cancel and Close buttons
		//wp_deregister_script('wpb_js_composer_js_view');
		//wp_register_script('wpb_js_composer_js_view', get_template_directory_uri() . '/includes/vc-extension/js/composer-view.js', array('wpb_js_composer_js_models'), WPB_VC_VERSION, true);
		
		// ---------------------------------
		// wpb_js_composer_js_custom_views (v3.6.12)
		// ---------------------------------
		// Main purposes are to: 
		// 1. Fix JS error of tab element on page edit screen
		//wp_deregister_script('wpb_js_composer_js_custom_views');
		//wp_register_script('wpb_js_composer_js_custom_views', get_template_directory_uri() . '/includes/vc-extension/js/composer-custom-views.js', array('wpb_js_composer_js_view'), WPB_VC_VERSION, true);
	}
}
add_action('admin_init', 'uxbarn_load_admin_custom_vc_js');

*/