<?php

/**
 * Build the custom settings & update OptionTree.
 */
if(!function_exists('uxbarn_custom_theme_options')) {
    
    function uxbarn_custom_theme_options() {
      /**
       * Get a copy of the saved settings array. 
       */
      $saved_settings = get_option( 'option_tree_settings', array() );
      
      /**
       * Custom settings array that will eventually be 
       * passes to the OptionTree Settings API Class.
       */
      $custom_settings = array( 
        'contextual_help' => array(
          
          'sidebar'       => ''
        ),
        
        // Sections
        
        'sections'        => array( 
          array(
            'id'          => 'uxbarn_to_general_section',
            'title'       => __('General', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_header_section',
            'title'       => __('Header Image', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_sidebar_section',
            'title'       => __('Custom Sidebar', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_home_slider_section',
            'title'       => __('Home Slider', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_portfolio_section',
            'title'       => __('Portfolio Single Page', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_blog_section',
            'title'       => __('Blog', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_footer_section',
            'title'       => __('Footer', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_social_network_section',
            'title'       => __('Social Network', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_google_fonts_section',
            'title'       => __('Google Fonts', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_plugins_section',
            'title'       => __('Plugins', 'uxbarn')
          ),
          array(
            'id'          => 'uxbarn_to_chinese_author',
            'title'       => __('汉化作者', 'uxbarn')
          ),
        ),
        'settings'        => array( 
            
              // General Tab
            
              array(
                'id'          => 'uxbarn_to_setting_upload_favicon',
                'label'       => __('Upload Favicon', 'uxbarn'),
                'desc'        => __('Favicon will be displayed on the address bar and tab of the browser. Click at the icon to upload the image or if you already know the URL of the image, just paste it to the box.', 'uxbarn'),
                'std'         => '',
                'type'        => 'upload',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_use_fixed_header',
                'label'       => __('Use Fixed Header?', 'uxbarn'),
                'desc'        => __('Whether to always fix the header (logo and menu) at the top even when scrolling down the page.', 'uxbarn'),
                'std'         => 'true',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
			  array(
                'id'          => 'uxbarn_to_setting_header_style',
                'label'       => __('Header Style', 'uxbarn'),
                'desc'        => __('Select the style for the header. "Center Alignment" style will make the logo and menu center aligned.', 'uxbarn'),
                'std'         => '',
                'type'        => 'select',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => 'default',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'default',
                    'label'       => __('Default', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'center',
                    'label'       => __('Center Alignment', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_auto_flipping_submenu',
                'label'       => __('Auto Flipping Submenu?', 'uxbarn'),
                'desc'        => __('Whether to flip the submenu display for the last two menu items.', 'uxbarn'),
                'std'         => 'true',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_display_breadcrumb',
                'label'       => __('Display Breadcrumb Navigation?', 'uxbarn'),
                'desc'        => __('Whether to display the breadcrumb bar on all pages (except front page).', 'uxbarn'),
                'std'         => 'true',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_slider_header_style',
                'label'       => __('Home Slider, Header Image and Footer Style', 'uxbarn'),
                'desc'        => __('Select the style for home slider, header image and footer widgets area. Note that "Fixed-Width" style is 1020px width.', 'uxbarn'),
                'std'         => 'full-width',
                'type'        => 'select',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'full-width',
                    'label'       => __('Full-Width', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'fixed-width',
                    'label'       => __('Fixed-Width', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_enable_lightbox_wp_gallery',
                'label'       => __('Enable Lightbox for WordPress Gallery?', 'uxbarn'),
                'desc'        => __('Whether to enable lightbox feature for WordPress gallery shortcode. <p><strong>Note:</strong> Also make sure that you already set the "Link To" option to "Media File" in your gallery shortcode.</p>', 'uxbarn'),
                'std'         => 'true',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_enable_page_comment',
                'label'       => __('Enable Page Comment?', 'uxbarn'),
                'desc'        => __('<p>Whether to enable the comment function for all Page by default.</p><p>When you have enabled it, please make sure that each Page is also marked as "Allow Comments". You can find that mark from the Quick Edit menu of the Page.</p>', 'uxbarn'),
                'std'         => 'false',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_display_scroll_to_top_button',
                'label'       => __('Display Scroll-To-Top Button?', 'uxbarn'),
                'desc'        => __('Whether to display the button for scrolling to the top of the page.', 'uxbarn'),
                'std'         => 'false',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_general_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              
              
              // Header Tab
              
              array(
                'id'          => 'uxbarn_to_setting_upload_search_header_image',
                'label'       => __('Upload Search Page\'s Header Image', 'uxbarn'),
                'desc'        => __('Click at the icon to upload the image or if you already know the URL of the image, just paste it to the box.', 'uxbarn'),
                'std'         => '',
                'type'        => 'upload',
                'section'     => 'uxbarn_to_header_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_upload_404_header_image',
                'label'       => __('Upload 404 Page\'s Header Image', 'uxbarn'),
                'desc'        => __('Click at the icon to upload the image or if you already know the URL of the image, just paste it to the box.', 'uxbarn'),
                'std'         => '',
                'type'        => 'upload',
                'section'     => 'uxbarn_to_header_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              
              
              
              // Sidebar Tab
              
              array(
                'id'          => 'uxbarn_to_setting_custom_sidebars',
                'label'       => __('Custom Sidebars', 'uxbarn'),
                'desc'        => __('<p>With this option, you can create your own custom sidebars as many as you want. After that, go to <strong>Appearance &gt; Widgets</strong> to manage widgets for them.</p><p>You can then assign a custom sidebar to a page by going to Add New or Edit Page menu and look for the meta box named Sidebar Setting.</p>', 'uxbarn'),
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'uxbarn_to_sidebar_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'settings'    => array( 
                  array(
                    'id'          => 'uxbarn_to_setting_custom_sidebars_item_description',
                    'label'       => __('Description', 'uxbarn'),
                    'desc'        => '',
                    'std'         => '',
                    'type'        => 'text',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'class'       => ''
                  )
                )
              ),
              
              
              
              // Home Slider Tab
              
              array(
                'id'          => 'uxbarn_to_setting_select_slider',
                'label'       => __('Slider Type', 'uxbarn'),
                'desc'        => __('<p>Select which slider type you would like to use on homepage:</p><p><strong>Basic Slider:</strong> This is the default one. You can use "Home Slider" menu on your admin panel to manage slides for this type.</p><p><strong>LayerSlider:</strong> You can manage sliders using "LayerSlider WP" menu on your admin panel. After you have created some sliders there, select this option as "LayerSlider" then you can use the option below to select which slider to be used on homepage.</p>', 'uxbarn'),
                'std'         => 'basic-slider',
                'type'        => 'select',
                'section'     => 'uxbarn_to_home_slider_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'basic-slider',
                    'label'       => __('Basic Slider', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'layerslider',
                    'label'       => __('LayerSlider', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_basic_slider_transition',
                'label'       => __("Home Slider's Transition Effect", 'uxbarn'),
                'desc'        => __('Select the transition for basic slider.', 'uxbarn'),
                'std'         => 'directscroll',
                'type'        => 'select',
                'section'     => 'uxbarn_to_home_slider_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'directscroll',
                    'label'       => __('Slide', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'crossfade',
                    'label'       => __('Fade', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'cover-fade',
                    'label'       => __('Cover', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'uncover-fade',
                    'label'       => __('Uncover', 'uxbarn'),
                    'src'         => ''
                  ),
                ),
                'condition'   => 'uxbarn_to_setting_select_slider:is(basic-slider)',
				'operator'    => 'and'
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_basic_slider_transition_speed',
                'label'       => __("Home Slider's Transition Speed", 'uxbarn'),
                'desc'        => __('Enter a number of how fast you want the transition to animate, in milliseconds.', 'uxbarn'),
                'std'         => '1000',
                'type'        => 'text',
                'section'     => 'uxbarn_to_home_slider_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'condition'   => 'uxbarn_to_setting_select_slider:is(basic-slider)',
				'operator'    => 'and'
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_basic_slider_auto_rotation',
                'label'       => __("Enable Home Slider's Auto Rotation?", 'uxbarn'),
                'desc'        => __('Whether to enable the auto rotation mode for the slider.', 'uxbarn'),
                'std'         => 'true',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_home_slider_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
                'condition'   => 'uxbarn_to_setting_select_slider:is(basic-slider)',
				'operator'    => 'and'
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_basic_slider_rotation_duration',
                'label'       => __("Home Slider's Rotation Duration", 'uxbarn'),
                'desc'        => __('Enter a number of how long to stay on the current slide before rotating to the next one, in milliseconds.', 'uxbarn'),
                'std'         => '8000',
                'type'        => 'text',
                'section'     => 'uxbarn_to_home_slider_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'condition'   => 'uxbarn_to_setting_select_slider:is(basic-slider),uxbarn_to_setting_basic_slider_auto_rotation:is(true)',
				'operator'    => 'and'
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_select_layerslider',
                'label'       => __('LayerSlider for Homepage', 'uxbarn'),
                'desc'        => __('Enter the shortcode of the slider you want to display.<p>You can find the slider shortcode by going to "LayerSlider WP" menu on your admin panel.</p>', 'uxbarn'),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_home_slider_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'condition'   => 'uxbarn_to_setting_select_slider:is(layerslider)',
				'operator'    => 'and'
              ),
              
              /*array(
                'id'          => 'uxbarn_to_setting_wpml_layerslider',
                'label'       => __('[WPML] LayerSlider for Other Languages', 'uxbarn'),
                'desc'        => __('You can duplicate the LayerSlider in "LayerSlider WP" menu, then translate each of those duplicated ones, and use this option to select which slider to be used with any specific languages of WPML.', 'uxbarn'),
                'std'         => '',
                'type'        => 'ux-wpml-layerslider-select',
                'section'     => 'uxbarn_to_home_slider_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'settings'    => array( 
                      array(
                        'id'          => 'uxbarn_to_setting_wpml_language_code',
                        'label'       => __('Language Code', 'uxbarn'),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'class'       => ''
                      ),
                      array(
                        'id'          => 'uxbarn_to_setting_layerslider_id',
                        'label'       => __('LayerSlider for This Language', 'uxbarn'),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'ux-layerslider-select',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'class'       => ''
                      ),
                  ),
              ),
              */
              
              
              // Portfolio Tab
              
              array(
                'id'          => 'uxbarn_to_setting_display_related_items_section',
                'label'       => __('Display Related Items?', 'uxbarn'),
                'desc'        => __('Whether to display the Related Items section on the single page.', 'uxbarn'),
                'std'         => 'true',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_portfolio_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_related_items_scope',
                'label'       => __('Related Items: Optional Scopes', 'uxbarn'),
                'desc'        => __('By default, theme uses only portfolio category for displaying related items. This option lets you choose any optional scopes (from custom fields) to be used with the portfolio category. The operators are applied as:<p><strong>category AND (client OR website OR date)</strong></p><p>Also note that all scopes here use the exact match (=) to compare the values.</p>', 'uxbarn'),
                'std'         => '',
                'type'        => 'checkbox',
                'section'     => 'uxbarn_to_portfolio_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array(
                  array(
                    'value'       => 'client',
                    'label'       => __('Client', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'website',
                    'label'       => __('Website', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'date',
                    'label'       => __('Date', 'uxbarn'),
                    'src'         => ''
                  ),
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_portfolio_slider_transition',
                'label'       => __('Portfolio Slider\'s Transition Effect', 'uxbarn'),
                'desc'        => __('Select the transition for portfolio slider on the single page.', 'uxbarn'),
                'std'         => 'directscroll',
                'type'        => 'select',
                'section'     => 'uxbarn_to_portfolio_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'directscroll',
                    'label'       => __('Slide', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'crossfade',
                    'label'       => __('Fade', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'cover-fade',
                    'label'       => __('Cover', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'uncover-fade',
                    'label'       => __('Uncover', 'uxbarn'),
                    'src'         => ''
                  ),
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_portfolio_slider_transition_speed',
                'label'       => __("Portfolio Slider's Transition Speed", 'uxbarn'),
                'desc'        => __('Enter a number of how fast you want the transition to animate, in milliseconds.', 'uxbarn'),
                'std'         => '1000',
                'type'        => 'text',
                'section'     => 'uxbarn_to_portfolio_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_portfolio_slider_auto_rotation',
                'label'       => __("Enable Portfolio Slider's Auto Rotation?", 'uxbarn'),
                'desc'        => __('Whether to enable the auto rotation mode for the slider.', 'uxbarn'),
                'std'         => 'true',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_portfolio_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_portfolio_slider_rotation_duration',
                'label'       => __("Portfolio Slider's Rotation Duration", 'uxbarn'),
                'desc'        => __('Enter a number of how long to stay on the current slide before rotating to the next one, in milliseconds.', 'uxbarn'),
                'std'         => '5000',
                'type'        => 'text',
                'section'     => 'uxbarn_to_portfolio_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'condition'   => 'uxbarn_to_setting_portfolio_slider_auto_rotation:is(true)',
				'operator'    => 'and'
              ),
              
              
              
              // Blog Tab
              
              array(
                'id'          => 'uxbarn_to_setting_blog_sidebar',
                'label'       => __('Blog Sidebar', 'uxbarn'),
                'desc'        => __('Select how the blog sidebar displayed on the blog page (Posts page).', 'uxbarn'),
                'std'         => 'right',
                'type'        => 'select',
                'section'     => 'uxbarn_to_blog_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => '',
                    'label'       => __('No Sidebar', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'right',
                    'label'       => __('Right Side', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'left',
                    'label'       => __('Left Side', 'uxbarn'),
                    'src'         => ''
                  ),
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_post_thumbnail_location',
                'label'       => __('Post Thumbnail Location', 'uxbarn'),
                'desc'        => __('Select where to display the post thumbnail. This will be applied to the blog page (Posts page).', 'uxbarn'),
                'std'         => 'below-title',
                'type'        => 'select',
                'section'     => 'uxbarn_to_blog_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array(
                  array(
                    'value'       => 'below-title',
                    'label'       => __('Below Post Title', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'above-title',
                    'label'       => __('Above Post Title', 'uxbarn'),
                    'src'         => ''
                  ),
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_override_post_meta_info',
                'label'       => __('Override Post Meta Info?', 'uxbarn'),
                'desc'        => __('Whether to override some custom fields of all individual posts with this global setting.', 'uxbarn'),
                'std'         => 'false',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_blog_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_post_meta_info_display',
                'label'       => __('Meta Info Display', 'uxbarn'),
                'desc'        => __('Use this option if you want to show or hide meta information. This will affect both blot-posts page and single page.', 'uxbarn'),
                'std'         => '',
                'type'        => 'checkbox',
                'section'     => 'uxbarn_to_blog_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'date',
                    'label'       => __('Show date?', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'author_name',
                    'label'       => __('Show author name?', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'comment',
                    'label'       => __('Show comment count?', 'uxbarn'),
                    'src'         => ''
                  )
                ),
                'condition'   => 'uxbarn_to_setting_override_post_meta_info:is(true)',
				'operator'    => 'and'
              ),
              
              array(
                'id'          => 'uxbarn_to_post_single_post_element_display',
                'label'       => __('Single Post Element Display', 'uxbarn'),
                'desc'        => __('These elements are in the single post page. You can use this option whether to display them or not.', 'uxbarn'),
                'std'         => '',
                'type'        => 'checkbox',
                'section'     => 'uxbarn_to_blog_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'author',
                    'label'       => __('Show author box?', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'tags',
                    'label'       => __('Show tags?', 'uxbarn'),
                    'src'         => ''
                  ),
                ),
                'condition'   => 'uxbarn_to_setting_override_post_meta_info:is(true)',
				'operator'    => 'and'
              ),
              
              
              
              // Footer Tab
              
              array(
                'id'          => 'uxbarn_to_setting_display_footer_widget_area',
                'label'       => __('Display Footer Widget Area?', 'uxbarn'),
                'desc'        => __('Whether to display the widget area on footer.', 'uxbarn'),
                'std'         => 'true',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_footer_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_footer_widget_area_columns',
                'label'       => __('Footer Widget Area Columns', 'uxbarn'),
                'desc'        => __('Select a number of columns for the footer widget area.', 'uxbarn'),
                'std'         => '3',
                'type'        => 'select',
                'section'     => 'uxbarn_to_footer_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => '1',
                    'label'       => __('1 Column', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => '2',
                    'label'       => __('2 Columns', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => '3',
                    'label'       => __('3 Columns', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => '4',
                    'label'       => __('4 Columns', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
              array(
                'id'          => 'uxbarn_to_setting_copyright_text',
                'label'       => __('Copyright Text', 'uxbarn'),
                'desc'        => __('<p>This copyright text will be displayed on the footer below the widget area.</p><p><strong>Important: </strong>If you are using some HTML tag like an anchor tag for a link, make sure to have the opening and closing tags properly.</p>', 'uxbarn'),
                'std'         => __( '2013 &copy; Archtek. Premium Template by <a href="http://themeforest.net/user/UXbarn?ref=UXbarn">UXbarn</a>.', 'uxbarn' ),
                'type'        => 'text',
                'section'     => 'uxbarn_to_footer_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              
    		  
    		  
    		  // Social Network Tab
              
              array(
                'id'          => 'uxbarn_to_setting_social_facebook',
                'label'       => __('Facebook', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_twitter',
                'label'       => __('Twitter', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_google_plus',
                'label'       => __('Google+', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_linkedin',
                'label'       => __('LinkedIn', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_flickr',
                'label'       => __('Flickr', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_vimeo',
                'label'       => __('Vimeo', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_youtube',
                'label'       => __('YouTube', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_forrst',
                'label'       => __('Forrst', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_dribbble',
                'label'       => __('Dribbble', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              array(
                'id'          => 'uxbarn_to_setting_social_rss',
                'label'       => __('RSS', 'uxbarn'),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_social_network_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              
              
              
              // Google Fonts Tab
              
              array(
                'id'          => 'uxbarn_to_setting_google_fonts_loader',
                'label'       => __('Google Fonts Loader', 'uxbarn'),
                'desc'        => '<p>To enable Google Fonts selection, please go to <a href="http://www.google.com/webfonts#" target="_blank">Google Web Fonts website</a>, select the fonts you like, copy the family list then paste them to this textbox. After that simply press "Save Changes" button and the fonts will be loaded to all font select lists in Style Customizer.</p><p>Please read more detail about this in the provided documentation under the section of "Getting Started > Google Fonts".</p>',
                'std'         => DEFAULT_GOOGLE_FONTS,
                'type'        => 'textarea-simple',
                'section'     => 'uxbarn_to_google_fonts_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => ''
              ),
              
			  
			  
			  // Plugins Tab
              
              array(
                'id'          => 'uxbarn_to_setting_display_theme_wpml_lang_selector',
                'label'       => __('Display WPML Language Selector?', 'uxbarn'),
                'desc'        => __('If WPML is activated, use this option to display the WPML language selector in the header location defined by theme. <p><strong>Note: </strong>Theme will use the configuration that you set in "WPML > Languages > Language switcher options".</p>', 'uxbarn'),
                'std'         => 'false',
                'type'        => 'radio',
                'section'     => 'uxbarn_to_plugins_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'choices'     => array( 
                  array(
                    'value'       => 'true',
                    'label'       => __('Yes', 'uxbarn'),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'false',
                    'label'       => __('No', 'uxbarn'),
                    'src'         => ''
                  )
                ),
              ),
              
          // chinese author
              
              array(
                'id'          => 'uxbarn_to_setting_chinese_author',
                'label'       => __('Archtek汉化中文版由<a href=http://www.wordpressleaf.com target=_blank>WordPress leaf</a>汉化，<a href=http://themostspecialname.com target=_blank>The Most Special Name</a>联合出品。如果您需要深度汉化请联系作者。<br>
			<a target=_blank href=http://www.wordpressleaf.com class=wordpressleaf-badge wp-badge>WordPress Leaf</a> <br>
			<a target=_blank href=http://themostspecialname.com class=themostspecialname-badge wp-badge>themostspecialname</a><br><br>
   		<h3 style=margin: 0 0 10px;>捐助我们</h3>
			如果您愿意捐助我们，请点击<a href=http://www.wordpressleaf.com/donate target=_blank><strong>这里</strong></a>或者使用微信扫描下面的二维码进行捐助。谢谢！<br>
			<img src=http://www.wordpressleaf.com/wp-content/themes/wordpressleaf/assets/images/weixin.png width=140 height=140 alt=捐助我们> 
		', 'uxbarn'),
		            'desc'        => '<p></p>',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'uxbarn_to_chinese_author'
              ), 
              
        )
      );
       
      /* settings are not the same update the DB */
      if ( $saved_settings !== $custom_settings ) {
        update_option( 'option_tree_settings', $custom_settings ); 
      }
      
    }

}