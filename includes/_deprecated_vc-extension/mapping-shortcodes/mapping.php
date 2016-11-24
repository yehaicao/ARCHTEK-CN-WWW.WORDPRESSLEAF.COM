<?php

/* ORDER
 * -----------
 * Row (VC)
 * Heading
 * Button
 * Icon
 * Image (VC)
 * Video
 * Blockquote
 * Message Box
 * Google Maps
 * Gallery
 * Flickr (VC)
 * Tabs (VC)
 * Vertical Tabs (VC)
 * Accordion / Toggles (VC)
 * Divider
 * Pie Chart (VC)
 * Progress Bar (VC)
 * CTA Box
 * Portfolio
 * Team Member
 * Testimonial Slider
 * Blog Posts
 * Search Form
 * Raw HTML (VC)
 * Raw JS (VC)
 * Contact Form 7 (VC)
 * LayerSlider (VC)
 * Gravity Forms (VC)
 */
 
// Row

vc_map( array(
  "name" => __("Row", "js_composer"),
  "base" => "vc_row",
  "is_container" => true,
  "icon" => "icon-wpb-row",
  "show_settings_on_create" => false,
  "weight" => 3000,
  "category" => __('Content', 'js_composer'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  ),
  "js_view" => 'VcRowView'
) );

 

// Heading shortcode
vc_map( array(
   'name' => __('Heading', 'uxbarn'),
   'base' => 'uxb_heading',
   'icon' => 'icon-wpb-uxb_heading',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Heading text', 'uxbarn'),
         'param_name' => 'text',
         'value' => __('Title', 'uxbarn'),
         'description' => '',
         'admin_label' => true,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Type', 'uxbarn'),
         'param_name' => 'type',
         'value' => array(
                        'H1'=>'h1', 
                        'H2'=>'h2',
                        'H3'=>'h3',
                        'H4'=>'h4',
                        'H5'=>'h5',
                    ),
         'description' => __('Choose the heading type.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Style', 'uxbarn'),
         'param_name' => 'style',
         'value' => array(
                        __('Default', 'uxbarn') => '', 
                        __('Light', 'uxbarn') =>'light',
                    ),
         'description' => __('Choose the style.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Alignment', 'uxbarn'),
         'param_name' => 'alignment',
         'value' => array(
                        __('Left', 'uxbarn') => '', 
                        __('Center', 'uxbarn') =>'h-center',
                        __('Right', 'uxbarn') =>'h-right',
                    ),
         'description' => __('Select text alignment for this heading.', 'uxbarn'),
         'admin_label' => false,
      ),
      /*array(
         'type' => 'checkbox',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Has icon?', 'uxbarn'),
         'param_name' => 'has_icon',
         'value' => array(''=>'true'),
         'description' => __('Whether to display the icon before heading text.', 'uxbarn'),
         'admin_label' => false,
      ),*/
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Has line?', 'uxbarn'),
         'param_name' => 'has_line',
         'value' => array(
                        __('No', 'uxbarn') => 'false', 
                        __('Yes', 'uxbarn') =>'true',
                    ),
         'description' => __('Whether to display a line at the bottom of the heading.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Has icon?', 'uxbarn'),
         'param_name' => 'has_icon',
         'value' => array(
                        __('No', 'uxbarn') => '', 
                        __('Yes', 'uxbarn') =>'true',
                    ),
         'description' => __('Whether to display the icon before heading text.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Icon code', 'uxbarn'),
         'param_name' => 'icon',
         'value' => '',
         'description' => sprintf(__('<a href="%s" target="_blank">Click here to see all available icons</a>. Just copy and paste the icon code into the text field. For example: <em>icon-asterisk</em>. Leave this field blank when not to use icon.', 'uxbarn'), get_template_directory_uri() . '/css/FontAwesome/preview.html'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'has_icon',
                            'value' => array('true'),
                        ),
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Icon Size', 'uxbarn'),
         'param_name' => 'icon_size',
         'value' => '16',
         'description' => __('Specify the size number for the icon (px). Only number is allowed.', 'uxbarn'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'has_icon',
                            'value' => array('true'),
                        ),
      ),
      array(
         'type' => 'colorpicker',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Icon Color', 'uxbarn'),
         'param_name' => 'icon_color',
         'value' => '',
         'description' => __('Choose the color.', 'uxbarn'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'has_icon',
                            'value' => array('true'),
                        ),
      ),
      uxbarn_get_css_animation_param(),
      uxbarn_get_extra_class_name(),
   )
) );






// Button shortcode
vc_map( array(
   'name' => __('Button', 'uxbarn'),
   'base' => 'uxb_button',
   'icon' => 'icon-wpb-ui-button',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      uxbarn_get_button_text(),
      uxbarn_get_link_param(),
      uxbarn_get_open_new_window_param(),
      uxbarn_get_button_color(),
      uxbarn_get_button_custom_color('button_color', array('custom')),
      uxbarn_get_button_size(),
      uxbarn_get_button_border_style(),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Expanded?', 'uxbarn'),
         'param_name' => 'expanded',
         'value' => array(
                        'No' => '', 
                        'Yes'=>'true',
                    ),
         'description' => __('Whether to expand the button to fit the width of its containing column.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Bottom right position?', 'uxbarn'),
         'param_name' => 'bottom_right',
         'value' => array(
                        'No' => '', 
                        'Yes'=>'true',
                    ),
         'description' => __('Whether to display the button at the bottom right of its containing column.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Display right angle icon?', 'uxbarn'),
         'param_name' => 'display_angle',
         'value' => array(
                        'No' => '', 
                        'Yes'=>'true',
                    ),
         'description' => __('Whether to display the right angle icon.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Icon code', 'uxbarn'),
         'param_name' => 'icon',
         'value' => '',
         'description' => sprintf(__('<a href="%s" target="_blank">Click here to see all available icons</a>. Just copy and paste the icon code into the text field. For example: <em>icon-asterisk</em>. Leave this field blank when not to use icon.', 'uxbarn'), get_template_directory_uri() . '/css/FontAwesome/preview.html'),
         'admin_label' => false,
      ),
      uxbarn_get_extra_class_name(),
   )
) );





// Icon shortcode
vc_map( array(
   'name' => __('Icon', 'uxbarn'),
   'base' => 'uxb_icon',
   'icon' => 'icon-wpb-uxb_icon',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Icon code', 'uxbarn'),
         'param_name' => 'code',
         'value' => 'icon-',
         'description' => sprintf(__('<a href="%s" target="_blank">Click here to see all available icons</a>. Just copy and paste the icon code into the text field. For example: <em>icon-asterisk</em>', 'uxbarn'), get_template_directory_uri() . '/css/FontAwesome/preview.html'),
         'admin_label' => true,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Size', 'uxbarn'),
         'param_name' => 'size',
         'value' => '16',
         'description' => __('Specify the size number for the icon (px). Only number is allowed.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'colorpicker',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Color', 'uxbarn'),
         'param_name' => 'color',
         'value' => '',
         'description' => __('Choose the color.', 'uxbarn'),
         'admin_label' => false,
      ), 
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Alignment', 'uxbarn'),
         'param_name' => 'alignment',
         'value' => array(
                        __('Left', 'uxbarn') => 'normal-align-left', 
                        __('Center', 'uxbarn') =>'normal-align-center',
                        __('Right', 'uxbarn') =>'normal-align-right',
                    ),
         'description' => __('Select the alignment for this icon.', 'uxbarn'),
         'admin_label' => false,
      ),
      uxbarn_get_extra_class_name(),
   )
) );






/* Single image */

vc_map( array(
  'name' => __('Image', 'uxbarn'),
  'base' => 'vc_single_image',
  'icon' => 'icon-wpb-single-image',
  'category' => __('Media', 'uxbarn'),
  'params' => array(
    array(
      'type' => 'attach_image',
      'heading' => __('Image', 'uxbarn'),
      'param_name' => 'image',
      'value' => '',
      'description' => __('Select image from media library.', 'uxbarn'),
        'admin_label' => false,
    ),
    array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Image size', 'uxbarn'),
         'param_name' => 'img_size',
         'value' => uxbarn_get_image_size_array(),
         'description' => __('Select the image size you want from the list.', 'uxbarn'),
         'admin_label' => true,
      ),
      uxbarn_get_stretch_image(),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Image position', 'uxbarn'),
         'param_name' => 'image_position',
         'value' => array(
                        __('Left', 'uxbarn') => 'normal-align-left', 
                        __('Center', 'uxbarn') => 'normal-align-center',
                        __('Right', 'uxbarn') => 'normal-align-right',
                        __('Float left (text will wrap around image)', 'uxbarn') => 'alignleft',
                        __('Float right (text will wrap around image)', 'uxbarn') => 'alignright',
                    ),
         'description' => __('Select how this image will be aligned.', 'uxbarn'),
         'admin_label' => true,
         'dependency' => array(
                            'element' => 'stretch_image',
                            'value' => array('false'),
                        ),
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Has link?', 'uxbarn'),
         'param_name' => 'has_link',
         'value' => array(
                        __('No', 'uxbarn') => 'false', 
                        __('Yes', 'uxbarn') =>'true',
                    ),
         'description' => __('Whether to has a link on the image.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Link type', 'uxbarn'),
         'param_name' => 'link_type',
         'value' => array(
                        __('Link to normal URL, same window', 'uxbarn') => 'normal', 
                        __('Link to normal URL on a new window/tab', 'uxbarn') => 'normal-window',
                        __('Link to its own full-size image file showing on lightbox (will ignore the Target URL below)', 'uxbarn') => 'image',
                    ),
         'description' => __('Specify which type for the target link of this image.', 'uxbarn'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'has_link',
                            'value' => array('true'),
                        ),
      ),
      uxbarn_get_link_param('has_link', array('true'), __('<strong>Note that this URL only works with "Link to normal URL ..." of "Link type" option above.</strong>', 'uxbarn')),
      /*array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Alt text', 'uxbarn'),
         'param_name' => 'alt_text',
         'value' => '',
         'description' => __('Enter the alternate text for image. <strong>NOTE:</strong> This will be used to display as a lightbox caption as well.', 'uxbarn'),
         'admin_label' => false,
      ),*/
    uxbarn_get_css_animation_param(),
    uxbarn_get_extra_class_name(),
  )
));






// Video shortcode
vc_map( array(
   'name' => __('Video', 'uxbarn'),
   'base' => 'uxb_video',
   'icon' => 'icon-wpb-film-youtube',
   'class' => '',
   'category' => __('Media', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Source', 'uxbarn'),
         'param_name' => 'source',
         'value' => array(
                        'Vimeo' => 'vimeo', 
                        'YouTube' => 'youtube',
                    ),
         'description' => '',
         'admin_label' => true,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Video ID', 'uxbarn'),
         'param_name' => 'video_id',
         'value' => '',
         'description' => __('Example: <em>23534361</em> for Vimeo. <em>G_G8SdXktHg</em> for YouTube.', 'uxbarn'),
         'admin_label' => true,
      ),
      /*array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Size', 'uxbarn'),
         'param_name' => 'size',
         'value' => __('', 'uxbarn'),
         'description' => __('Specify the video size you want. For example: <em>560x315</em>. Or simply leave it blank to use full-width size.', 'uxbarn')
      ),*/
  )
 ));
 
 
 
 
 
 
// Blockquote shortcode
vc_map( array(
   'name' => __('Blockquote', 'uxbarn'),
   'base' => 'uxb_blockquote',
   'icon' => 'icon-wpb-uxb_blockquote',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'textarea_html',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Text', 'uxbarn'),
         'param_name' => 'content',
         'value' => 'Everything is okay in the end, if it\'s not ok, then it\'s not the end.',
         'description' => __('Enter the text for this quote.', 'uxbarn'),
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Cite', 'uxbarn'),
         'param_name' => 'cite',
         'value' => '',
         'description' => __('Enter the name or source of the quote.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Type', 'uxbarn'),
         'param_name' => 'type',
         'value' => array(
                        'Normal' => '', 
                        'Float left' => 'left',
                        'Float right' => 'right',
                    ),
         'description' => __('Choose the display type.', 'uxbarn'),
         'admin_label' => false,
      ),
      uxbarn_get_extra_class_name(),
   )
) );






// Message box shortcode
vc_map( array(
   'name' => __('Message Box', 'uxbarn'),
   'base' => 'uxb_messagebox',
   'icon' => 'icon-wpb-information-white',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Type', 'uxbarn'),
         'param_name' => 'type',
         'value' => array(
                        __('Success', 'uxbarn') => 'success',
                        __('Error', 'uxbarn') => 'error',
                        __('Info', 'uxbarn') => 'info', 
                        __('Warning', 'uxbarn') => 'warning',
                    ),
         'description' => __('Choose the message box type.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'textarea_html',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Text', 'uxbarn'),
         'param_name' => 'content',
         'value' => __('The message goes here...', 'uxbarn'),
         'description' => __('Enter the text for this box.', 'uxbarn'),
         'admin_label' => false,
      ),
      uxbarn_get_extra_class_name(),
   )
) );







// Google map shortcode
vc_map( array(
   'name' => __('Google Map', 'uxbarn'),
   'base' => 'uxb_googlemap',
   'icon' => 'icon-wpb-map-pin',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'textarea',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Address', 'uxbarn'),
         'param_name' => 'address',
         'value' => '',
         'description' => __('By default, the theme will use this address field as a primary value for generating the map. For example: <em>New York, US</em>. <br/><strong>NOTE:</strong> In case you want to use latitude and logitude values below, just leave this field blank.', 'uxbarn'),
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Latitude', 'uxbarn'),
         'param_name' => 'latitude',
         'value' => '',
         'description' => __('Enter the latitude value. <a href="http://itouchmap.com/latlong.html" target="_blank">Click here to find yours</a>', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Logitude', 'uxbarn'),
         'param_name' => 'longitude',
         'value' => '',
         'description' => __('Enter the longitude value. <a href="http://itouchmap.com/latlong.html" target="_blank">Click here to find yours</a>', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Zoom level', 'uxbarn'),
         'param_name' => 'zoom',
         'value' => array(
                        '7' => '7', 
                        '8' => '8',
                        '9' => '9',
                        '10' => '10',
                        '11' => '11', 
                        '12' => '12',
                        '13' => '13',
                        '14' => '14',
                        '15' => '15',
                        '16' => '16',
                        '17' => '17',
                        '18' => '18',
                        '19' => '19',
                        '20' => '20',
                    ),
         'description' => __('Select the zoom level.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Display type', 'uxbarn'),
         'param_name' => 'display_type',
         'value' => array(
                        __('Roadmap', 'uxbarn') => 'ROADMAP', 
                        __('Satellite', 'uxbarn') => 'SATELLITE',
                        __('Hybrid', 'uxbarn') => 'HYBRID',
                        __('Terrain', 'uxbarn') => 'TERRAIN',
                    ),
         'description' => __('Choose the display type.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Height', 'uxbarn'),
         'param_name' => 'height',
         'value' => '250',
         'description' => __('Enter the height in pixel unit. Enter only a number.', 'uxbarn'),
         'admin_label' => false,
      ),
      uxbarn_get_extra_class_name(),
   )
) );







// Gallery shortcode
vc_map( array(
   'name' => __('Image Gallery/Slider', 'uxbarn'),
   'base' => 'uxb_gallery',
   'icon' => 'icon-wpb-images-stack',
   'class' => '',
   'category' => __('Media', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'attach_images',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Images', 'uxbarn'),
         'param_name' => 'images',
         'value' => '',
         'description' => __('Select images.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Type', 'uxbarn'),
         'param_name' => 'type',
         'value' => array(
                        __('Grid', 'uxbarn') => 'grid', 
                        __('Slider', 'uxbarn') => 'slider',
                    ),
         'description' => __('Select which type of the gallery to be displayed.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Grid style', 'uxbarn'),
         'param_name' => 'style',
         'value' => array(
                        __('Style 1 (no border, no margin)', 'uxbarn') => 'gallery1', 
                        __('Style 2 (has border and margin)', 'uxbarn') => 'gallery2',
                    ),
         'description' => __('Select the style for grid gallery.', 'uxbarn'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'type',
                            'value' => array('grid'),
                        ),
      ),
    array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Thumbnail size', 'uxbarn'),
         'param_name' => 'size',
         'value' => uxbarn_get_image_size_array(),
         'description' => __('Select which size to be used for the thumbnails. Anyway, the image will be scaled depending on its original size and containing column. If you are not sure which one to use, try <em>Large Square</em> or <em>Original size</em>.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Grid columns', 'uxbarn'),
         'param_name' => 'columns',
         'value' => array(
                        __('3 Columns', 'uxbarn') => 'col3',
                        __('4 Columns', 'uxbarn') => 'col4',
                        __('5 Columns', 'uxbarn') => 'col5',
                    ),
         'description' => __('Choose the number of columns.', 'uxbarn'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'type',
                            'value' => array('grid'),
                        ),
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Link type', 'uxbarn'),
         'param_name' => 'link',
         'value' => array(
                        __('Display full image on lightbox', 'uxbarn') => 'lightbox', 
                        __('Display full image on new window/tab', 'uxbarn') => 'link-window',
                        __('No link', 'uxbarn') => 'none',
                    ),
         'description' => __('Select the type of the link for each gallery thumbnail.', 'uxbarn'),
         'admin_label' => false,
      ),
      uxbarn_get_auto_rotation('type', array('slider')),
      uxbarn_get_extra_class_name(),
   )
) );







/* Flickr
---------------------------------------------------------- */
vc_map( array(
  "base" => "vc_flickr",
  "name" => __("Flickr Widget", "uxbarn"),
  "icon" => "icon-wpb-flickr",
  "category" => __('Media', 'uxbarn'),
  "params"  => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "uxbarn"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "uxbarn")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Flickr ID", "uxbarn"),
      "param_name" => "flickr_id",
      'admin_label' => true,
      "description" => sprintf(__('To find your flickID visit %s.', "uxbarn"), '<a href="http://idgettr.com/" target="_blank">idGettr</a>')
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Number of photos", "uxbarn"),
      "param_name" => "count",
      "value" => array(9, 8, 7, 6, 5, 4, 3, 2, 1),
      "description" => __("Number of photos.", "uxbarn")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Type", "uxbarn"),
      "param_name" => "type",
      "value" => array(__("User", "uxbarn") => "user", __("Group", "uxbarn") => "group"),
      "description" => __("Photo stream type.", "uxbarn")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Display", "uxbarn"),
      "param_name" => "display",
      "value" => array(__("Latest", "uxbarn") => "latest", __("Random", "uxbarn") => "random"),
      "description" => __("Photo order.", "uxbarn")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "uxbarn"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "uxbarn")
    )
  )
) );






$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;
/* Tabs
---------------------------------------------------------- */
$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
vc_map( array(
  "name"  => __("Tabs", "uxbarn"),
  "base" => "vc_tabs",
  "show_settings_on_create" => false,
  "is_container" => true,
  "icon" => "icon-wpb-ui-tab-content",
  "category" => __('Content', 'uxbarn'),
  "params" => array(
    /*array(
      "type" => "textfield",
      "heading" => __("Widget title", "uxbarn"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "uxbarn")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Auto rotate tabs", "uxbarn"),
      "param_name" => "interval",
      "value" => array(__("Disable", "uxbarn") => 0, 3, 5, 10, 15),
      "description" => __("Auto rotate tabs each X seconds.", "uxbarn")
    ),*/
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "uxbarn"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "uxbarn")
    )
  ),
  "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
  ,
  'default_content' => '
  [vc_tab title="'.__('Tab 1','uxbarn').'" tab_id="'.$tab_id_1.'"][/vc_tab]
  [vc_tab title="'.__('Tab 2','uxbarn').'" tab_id="'.$tab_id_2.'"][/vc_tab]
  ',
  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
) );





$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;
/* Tour section
---------------------------------------------------------- */
$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
WPBMap::map( 'vc_tour', array(
  "name" => __("Vertical Tabs", "uxbarn"),
  "base" => "vc_tour",
  "show_settings_on_create" => false,
  "is_container" => true,
  "container_not_allowed" => true,
  "icon" => "icon-wpb-ui-tab-content-vertical",
  "category" => __('Content', 'uxbarn'),
  "wrapper_class" => "clearfix",
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "uxbarn"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "uxbarn")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Auto rotate slides", "uxbarn"),
      "param_name" => "interval",
      "value" => array(__("Disable", "uxbarn") => 0, 3, 5, 10, 15),
      "description" => __("Auto rotate slides each X seconds.", "uxbarn")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "uxbarn"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "uxbarn")
    )
  ),
  "custom_markup" => '  
  <div class="wpb_tabs_holder wpb_holder clearfix vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
  ,
  'default_content' => '
  [vc_tab title="'.__('Tab 1','uxbarn').'" tab_id="'.$tab_id_1.'"][/vc_tab]
  [vc_tab title="'.__('Tab 2','uxbarn').'" tab_id="'.$tab_id_2.'"][/vc_tab]
  ',
  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
) );







/* Accordion block
---------------------------------------------------------- */
vc_map( array(
  "name" => __("Accordion / Toggle", "uxbarn"),
  "base" => "vc_accordion",
  "show_settings_on_create" => false,
  "is_container" => true,
  "icon" => "icon-wpb-ui-accordion",
  "category" => __('Content', 'uxbarn'),
  "params" => array(
    /*array(
      "type" => "textfield",
      "heading" => __("Widget title", "uxbarn"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "uxbarn")
    ),*/
    array(
      "type" => 'dropdown',
      "heading" => __("Use as", "uxbarn"),
      "param_name" => "use_as",
      "description" => __('Select mode for this element. <strong>NOTE:</strong> If you select "Toggle", make sure to have only one section for the element.', 'uxbarn'),
      "value" => Array(
                    __("Accordion", "uxbarn") => 'accordion',
                    __("Toggle", "uxbarn") => 'toggle',
                )
    ),
    array(
      "type" => 'dropdown',
      "heading" => __("Collapsible?", "uxbarn"),
      "param_name" => "collapsible",
      "description" => __('Whether to make each section collapsible.', 'uxbarn'),
      "value" => Array(
                    __("No", "uxbarn") => 'no',
                    __("Yes", "uxbarn") => 'yes',
                ),
        'dependency' => array(
                            'element' => 'use_as',
                            'value' => array('accordion'),
                        ),
    ),
    array(
      "type" => 'textfield',
      "heading" => __("Active section", "uxbarn"),
      "param_name" => "active_section",
      "description" => __('Enter a section number that you want it to expanded by default. For example, enter <em>2</em> if you want to make the second section active.', 'uxbarn'),
      "value" => '1',
        'dependency' => array(
                            'element' => 'use_as',
                            'value' => array('accordion'),
                        ),
    ),
    array(
      "type" => 'dropdown',
      "heading" => __("Toggle expanded?", "uxbarn"),
      "param_name" => "expanded",
      "description" => __('Whether to make it expanded (active) by default.', 'uxbarn'),
      "value" => Array(
                    __("Yes", "uxbarn") => 'true',
                    __("No", "uxbarn") => 'false',
                ),
        'dependency' => array(
                        'element' => 'use_as',
                        'value' => array('toggle'),
                    )
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "uxbarn"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "uxbarn")
    ),
  ),
  "custom_markup" => '
  <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
  %content%
  </div>
  <div class="tab_controls">
  <button class="add_tab" title="'.__("Add section", "uxbarn").'">'.__("Add section (for accordion)", "uxbarn").'</button>
  </div>
  ',
  'default_content' => '
  [vc_accordion_tab title="'.__('Section', "uxbarn").'"][/vc_accordion_tab]
  ',
  'js_view' => 'VcAccordionView'
) );
vc_map( array(
  "name" => __("Accordion/Toggle Section", "uxbarn"),
  "base" => "vc_accordion_tab",
  "allowed_container_element" => 'vc_row',
  "is_container" => true,
  "content_element" => false,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Title", "uxbarn"),
      "param_name" => "title",
      "description" => __("Section title.", "uxbarn")
    ),
  ),
  'js_view' => 'VcAccordionTabView'
) );







// Divider shortcode
vc_map( array(
   'name' => __('Divider', 'uxbarn'),
   'base' => 'uxb_divider',
   'icon' => 'icon-wpb-uxb_divider',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Style', 'uxbarn'),
         'param_name' => 'style',
         'value' => array(
                        __('Thin', 'uxbarn') => 'thin',
                        __('Light', 'uxbarn') => 'light',
                        __('Bold', 'uxbarn') => 'bold',
                        __('Thin + Dashed', 'uxbarn') => 'thin dashed',
                        __('Light + Dashed', 'uxbarn') => 'light dashed',
                        __('Bold + Dashed', 'uxbarn') => 'bold dashed',
                    ),
         'description' => __('Choose the style for divider.', 'uxbarn'),
         'admin_label' => true,
      ),
      uxbarn_get_extra_class_name(),
   )
) );





/**
 * Pie chat
 */
 $colors_arr = array(__("Grey", "uxbarn") => "wpb_button", __("Blue", "uxbarn") => "btn-primary", __("Turquoise", "uxbarn") => "btn-info", __("Green", "uxbarn") => "btn-success", __("Orange", "uxbarn") => "btn-warning", __("Red", "uxbarn") => "btn-danger", __("Black", "uxbarn") => "btn-inverse");
vc_map( array(
    "name" => __("Pie chart", 'uxbarn'),
    "base" => "vc_pie",
    "class" => "",
    "icon" => "icon-wpb-vc_pie",
    "category" => __('Content', 'uxbarn'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget title", "uxbarn"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "uxbarn"),
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Pie value", "uxbarn"),
            "param_name" => "value",
            "description" => __('Input graph value here. Witihn a range 0-100.', 'uxbarn'),
            "value" => "50",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Pie label value", "uxbarn"),
            "param_name" => "label_value",
            "description" => __('Input integer value for label. If empty "Pie value" will be used.', 'uxbarn'),
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Units", "uxbarn"),
            "param_name" => "units",
            "description" => __("Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.", "uxbarn")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Bar color", "uxbarn"),
            "param_name" => "color",
            "value" => $colors_arr,//$pie_colors,
            "description" => __("Select pie chart color.", "uxbarn"),
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "uxbarn"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "uxbarn")
        ),

    )
) );




/* Progress bar
---------------------------------------------------------- */
vc_map( array(
  "name" => __("Progress Bar", "uxbarn"),
  "base" => "vc_progress_bar",
  "icon" => "icon-wpb-graph",
  "category" => __('Content', 'uxbarn'),
  "params" => array(
    array(
      "type" => "exploded_textarea",
      "heading" => __("Bar values", "uxbarn"),
      "param_name" => "values",
      "description" => __('Enter bar values here. Separate each bar with line-break (Enter). Example: If you enter <em>90|Development</em>, theme will display a bar of "Development" label at 90% width of its containing column.', 'uxbarn'),
      "value" => "90|Development,80|Design,70|Marketing"
    ),
    array(
      "type" => "textfield",
      "heading" => __("Unit on label", "uxbarn"),
      "param_name" => "units",
      "description" => __("Enter the unit to be displayed with a number on label. Example: <em>%, scores, marks, degrees</em>, etc. If you leave this blank, the number will not be displayed on label.", "uxbarn")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Bar color", "uxbarn"),
      "param_name" => "bgcolor",
      "value" => array(__("Grey", "uxbarn") => "bar_grey", __("Blue", "uxbarn") => "bar_blue", __("Turquoise", "uxbarn") => "bar_turquoise", __("Green", "uxbarn") => "bar_green", __("Orange", "uxbarn") => "bar_orange", __("Red", "uxbarn") => "bar_red", __("Black", "uxbarn") => "bar_black", __("Custom Color", "uxbarn") => "custom"),
      "description" => __("Select bar background color.", "uxbarn"),
      "admin_label" => true
    ),
    array(
      "type" => "colorpicker",
      "heading" => __("Bar custom color", "uxbarn"),
      "param_name" => "custombgcolor",
      "description" => __("Select custom background color for bars.", "uxbarn"),
      "dependency" => Array('element' => "bgcolor", 'value' => array('custom'))
    ),
    array(
      "type" => "checkbox",
      "heading" => __("Options", "uxbarn"),
      "param_name" => "options",
      "value" => array(
                    __("Sharp corner?", "uxbarn") . '<br/>' => "no-radius", 
                    __("Add stripes?", "uxbarn") . '<br/>' => "striped", 
                    __("Add animation? (only work with striped bars)", "uxbarn") . '<br/>' => "animated"
                )
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "uxbarn"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "uxbarn")
    )
  )
) );






/* Call to Action Button
---------------------------------------------------------- */
vc_map( array(
  "name" => __("Call-to-Action Box", "uxbarn"),
  "base" => "uxb_cta_box",
  "icon" => "icon-wpb-call-to-action",
  "category" => __('Content', 'uxbarn'),
  "params" => array(
    array(
      "type" => "textarea_html",
      'admin_label' => true,
      "heading" => __("Content", "uxbarn"),
      "param_name" => "content",
      "value" => __("Welcome! This is an example text for CTA box. Grab it now for 20% off!", "uxbarn"),
      "description" => __("Enter your content.", "uxbarn")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Display button?", "uxbarn"),
      "param_name" => "display_button",
      "value" => array(
                    __('Yes', 'uxbarn') => 'true',
                    __('No', 'uxbarn') => 'false',
                ),
    ),
    
    array(
      "type" => "dropdown",
      "heading" => __("Button position", "uxbarn"),
      "param_name" => "button_position",
      "value" => array(
                    __('Right', 'uxbarn') => 'right',
                    __('Bottom', 'uxbarn') => 'bottom',
                ),
        'dependency' => array(
                            'element' => 'display_button',
                            'value' => array('true'),
                        ),
    ),
    uxbarn_get_button_text('display_button', array('true')),
    uxbarn_get_link_param('display_button', array('true')),
    uxbarn_get_open_new_window_param('display_button'),
    uxbarn_get_button_color('display_button', array('true')),
    uxbarn_get_button_custom_color('button_color', array('custom'), ''),
    uxbarn_get_button_size('display_button', array('true')),
    uxbarn_get_button_border_style('display_button', array('true')),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Icon code', 'uxbarn'),
         'param_name' => 'icon_code',
         'value' => '',
         'description' => sprintf(__('<a href="%s" target="_blank">Click here to see all available icons</a>. Just copy and paste the icon code into the text field. For example: <em>icon-asterisk</em>. Leave this field blank when not to use icon.', 'uxbarn'), get_template_directory_uri() . '/css/FontAwesome/preview.html'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'display_button',
                            'value' => array('true'),
                        ),
      ),
    uxbarn_get_extra_class_name(),
    ),
) );







// Portfolio shortcode

// Prepare ID list array for selection
global $post;
$id_array = array();
//$id_array[''] = ''; // Set first dummy item (not used)
$args = array(
			'hide_empty' => 0,
            'orderby' => 'title',
            'order' => 'ASC',
        );
$terms = get_terms('portfolio-category', $args);
if(count($terms) > 0) {
	foreach($terms as $term) {
      	// If WPML is active
		if(function_exists('icl_object_id')) {
			
			global $sitepress;
			$default_lang = $sitepress->get_default_language();
			
			// Text will be changed depending on current active lang, but the IDs are still original ones from default lang
			$id_array[$term->name] = icl_object_id($term->term_id, 'portfolio-category', true, $default_lang);
			
			
		} else { // If there is no WPML
			$id_array[$term->name] = $term->term_id;
		}
		
	}
}
 

vc_map( array(
   'name' => __('Portfolio', 'uxbarn'),
   'base' => 'uxb_portfolio',
   'icon' => 'icon-wpb-uxb_portfolio',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'checkbox',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Portfolio categories', 'uxbarn'),
         'param_name' => 'categories',
         'value' => $id_array,
         'description' => __('Select the categories from the list.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Maximum number of items to be displayed', 'uxbarn'),
         'param_name' => 'max_item',
         'value' => '',
         'description' => __('Enter a number to limit the max number of items to be listed. Leave it blank to show all items from the selected categories above. Only number is allowed.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Display description box?', 'uxbarn'),
         'param_name' => 'display_desc',
         'value' => array(
                        __('Yes', 'uxbarn') => 'true',
                        __('No', 'uxbarn') => 'false',
                    ),
         'description' => __('Whether to display the description box.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Title', 'uxbarn'),
         'param_name' => 'title',
         'value' => '',
         'description' => __('Enter the title.', 'uxbarn'),
         'dependency' => array(
                            'element' => 'display_desc',
                            'value' => array('true'),
                        ),
         'admin_label' => false,
      ),
      array(
         'type' => 'textarea',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Box description', 'uxbarn'),
         'param_name' => 'desc',
         'value' => '',
         'description' => __('Enter the description.', 'uxbarn'),
         'dependency' => array(
                            'element' => 'display_desc',
                            'value' => array('true'),
                        ),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Display line at the bottom?', 'uxbarn'),
         'param_name' => 'display_line',
         'value' => array(
                        __('Yes', 'uxbarn') => 'true',
                        __('No', 'uxbarn') => 'false',
                    ),
         'description' => __('Whether to display a line at the bottom of the description box.', 'uxbarn'),
         'dependency' => array(
                            'element' => 'display_desc',
                            'value' => array('true'),
                        ),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Button style', 'uxbarn'),
         'param_name' => 'button_style',
         'value' => array(
                        __('No angle icon + default position below text', 'uxbarn') => 'no-angle-default',
                        __('No angle icon + bottom right position of the box', 'uxbarn') => 'no-angle-bottom',
                        __('Has angle icon + default position below text', 'uxbarn') => 'angle-default',
                        __('Has angle icon + bottom right position of the box', 'uxbarn') => 'angle-bottom',
                        __('No button', 'uxbarn') => 'none',
                    ),
         'description' => __('Select the style of the description box\'s button.', 'uxbarn'),
         'dependency' => array(
                            'element' => 'display_desc',
                            'value' => array('true'),
                        ),
         'admin_label' => false,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Button text', 'uxbarn'),
         'param_name' => 'button_text',
         'value' => __('View all projects', 'uxbarn'),
         'description' => __('Enter the button text.', 'uxbarn'),
         'dependency' => array(
                            'element' => 'display_desc',
                            'value' => array('true'),
                        ),
         'admin_label' => false,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Button target URL', 'uxbarn'),
         'param_name' => 'button_url',
         'value' => '',
         'description' => __('Enter the target URL for the button. Example: <em>http://www.uxbarn.com</em>', 'uxbarn'),
         'dependency' => array(
                            'element' => 'display_desc',
                            'value' => array('true'),
                        ),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Columns', 'uxbarn'),
         'param_name' => 'columns',
         'value' => array(
                        __('3 Columns', 'uxbarn') => 'col3',
                        __('4 Columns', 'uxbarn') => 'col4',
                    ),
         'description' => __('Choose the number of columns.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Category filter', 'uxbarn'),
         'param_name' => 'category_filter_style',
         'value' => array(
                        __('No filter', 'uxbarn') => 'none',
                        __('Inside description box', 'uxbarn') => 'inside',
                        __('Outside description box', 'uxbarn') => 'outside',
                    ),
         'description' => __('Select the location for the category filter.', 'uxbarn'),
         'admin_label' => false,
      ),
      uxbarn_get_orderby(),
      uxbarn_get_order(),
      uxbarn_get_extra_class_name(),
   )
) );







// Team member shortcode

// Prepare ID list array for selection
global $post; // required 
$id_array = array();
$id_array['- Select member -'] = ''; // Set first dummy item (not used)
$args = array(
            'post_type' => 'team',
            'nopaging' => true,
            'orderby' => 'title',
            'order' => 'ASC',
        );
$items = get_posts($args);
if ( !empty($items) ) {
	foreach( $items as $post ) : setup_postdata($post);
	
		// If WPML is active
		if(function_exists('icl_object_id')) {
			$original_id = get_the_ID();
			
			global $sitepress;
			$default_lang = $sitepress->get_default_language();
			
			$post_lang_info = wpml_get_language_information($original_id);
			
			// If the post is the translated one (not default lang)
			if(strpos($post_lang_info['locale'], $default_lang) !== false) {
				// If the post is translated, display it or else, display the original title
				$title = get_the_title(icl_object_id($original_id, 'team', true));
				$id_array[$title] = get_the_title($original_id) . '|' . $original_id;
			}
			
			
		} else { // If there is no WPML
			$id_array[get_the_title()] = get_the_title() . '|' . get_the_ID();
		}
		
	endforeach;
}
wp_reset_postdata();
 

vc_map( array(
   'name' => __('Team Member', 'uxbarn'),
   'base' => 'uxb_team_member',
   'icon' => 'icon-wpb-uxb_team_member',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Team member', 'uxbarn'),
         'param_name' => 'member_id',
         'value' => $id_array,
         'description' => __('Select a member to be added into the column.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Thumbnail size', 'uxbarn'),
         'param_name' => 'image_size',
         'value' => uxbarn_get_image_size_array(),
         'description' => __('Select which size to be used for the member thumbnail. Anyway, the image will be scaled depending on its original size and containing column. If you are not sure which one to use, try <em>Original size, Rectangle or Large Square</em>.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Link?', 'uxbarn'),
         'param_name' => 'link',
         'value' => array(
                        __('Yes, enable link on thumbnail and member name to the single page', 'uxbarn') => 'true',
                        __('No link', 'uxbarn') => 'false',
                    ),
         'description' => __('Whether to have a link to member\'s single page.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Heading size', 'uxbarn'),
         'param_name' => 'heading_size',
         'value' => array(
                        __('Large', 'uxbarn') => 'large',
                        __('Small', 'uxbarn') => 'small',
                    ),
         'description' => __('Select the size for heading which is used to display name and position.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Display social icons?', 'uxbarn'),
         'param_name' => 'display_social',
         'value' => array(
                        __('Yes', 'uxbarn') => 'true',
                        __('No', 'uxbarn') => 'false',
                    ),
         'description' => __('Whether to display the social network icons.', 'uxbarn'),
         'admin_label' => false,
      ),
      uxbarn_get_css_animation_param(),
      uxbarn_get_extra_class_name(),
   )
) );







// Testimonial slider shortcode

// Prepare ID list array for selection
$id_array = array();
//$id_array[''] = ''; // Set first dummy item (not used)
$args = array(
            'post_type' => 'testimonials',
            'nopaging' => true,
            'orderby' => 'title',
            'order' => 'ASC',
        );
$testimonials = get_posts($args);
if ( !empty($testimonials) ) {
	
	foreach( $testimonials as $post ) : setup_postdata($post);
		
		// If WPML is active
		if(function_exists('icl_object_id')) {
			$original_id = get_the_ID();
			
			global $sitepress;
			$default_lang = $sitepress->get_default_language();
			
			$post_lang_info = wpml_get_language_information($original_id);
			//echo var_dump(strpos($post_lang_info['locale'], $default_lang));
			
			// If the post is the translated one (not default lang)
			if(strpos($post_lang_info['locale'], $default_lang) !== false) {
				// If the post is translated, display it or else, display the original title
				$title = get_the_title(icl_object_id($original_id, 'testimonials', true));
				$id_array[$title . '<br/>'] = $original_id;
			}
			
			
		} else { // If there is no WPML
			$id_array[get_the_title() . '<br/>'] = get_the_ID();
		}
		
	endforeach;
}
wp_reset_postdata();

$list_heading = __('Available items', 'uxbarn');

// WP_Query didn't work somehow....
/*$testimonials = new WP_Query($args);
var_dump($testimonials->request);
if($testimonials->have_posts()) {
    while($testimonials->have_posts()) {
        $testimonials->the_post();
        $id_array[get_the_title()] = get_the_ID();
        echo var_dump(get_the_title());
    }
} wp_reset_postdata();
*/
 

vc_map( array(
   'name' => __('Testimonial Slider', 'uxbarn'),
   'base' => 'uxb_testimonial_slider',
   'icon' => 'icon-wpb-uxb_testimonial_slider',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'checkbox',
         'holder' => 'div',
         'class' => '',
         'heading' => $list_heading,
         'param_name' => 'id_list',
         'value' => $id_array,
         'description' => __('Select the items from the list.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Style', 'uxbarn'),
         'param_name' => 'type',
         'value' => array(
                        __('Full-width + thumbnail (work best on 1/1 column with "no-padding" option)', 'uxbarn') => 'full-width', 
                        __('Text only + float left', 'uxbarn') => 'left',
                        __('Text only + float right', 'uxbarn') => 'right',
                    ),
         'description' => __('Choose the testimonial style.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Width', 'uxbarn'),
         'param_name' => 'width',
         'value' => '',
         'description' => __('Specify the width in % or px unit. Example: <em>400px</em> OR <em>50%</em>. Leave it blank to use 100% width as default.', 'uxbarn'),
         'dependency' => array(
                            'element' => 'type',
                            'value' => array('left', 'right'),
                        ),
         'admin_label' => false,
      ),
      uxbarn_get_auto_rotation(),
      uxbarn_get_orderby(),
      uxbarn_get_order(),
      uxbarn_get_extra_class_name(),
   )
) );







// Blog posts shortcode

// Prepare ID list array for selection

$id_array = array();
//$id_array[''] = ''; // Set first dummy item (not used)
$args = array(
            'hide_empty' => 0,
            'orderby' => 'title',
            'order' => 'ASC',
        );
$categories = get_categories($args);
if(count($categories) > 0) {
	foreach($categories as $category) {
			
		// If WPML is active
		if(function_exists('icl_object_id')) {
			
			global $sitepress;
			$default_lang = $sitepress->get_default_language();
			
			// Text will be changed depending on current active lang, but the IDs are still original ones from default lang
			$id_array[$category->name . '<br/>'] = icl_object_id($category->term_id, 'category', true, $default_lang);
			
			
		} else { // If there is no WPML
			$id_array[$category->name . '<br/>'] = $category->term_id;
		}
		
	}
}
 

vc_map( array(
   'name' => __('Blog Posts', 'uxbarn'),
   'base' => 'uxb_blog_posts',
   'icon' => 'icon-wpb-application-icon-large',
   'class' => '',
   'category' => __('Content', 'uxbarn'),
   'admin_enqueue_js' => VC_EDIT_MODE_JS,
   'admin_enqueue_css' => VC_EDIT_MODE_CSS,
   'params' => array(
      array(
         'type' => 'checkbox',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Blog categories', 'uxbarn'),
         'param_name' => 'categories',
         'value' => $id_array,
         'description' => __('Select the categories from the list.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Maximum number of items to be displayed', 'uxbarn'),
         'param_name' => 'max_item',
         'value' => '',
         'description' => __('Enter a number to limit the max number of items to be listed. Leave it blank to show all items from the selected categories above. Only number is allowed.', 'uxbarn'),
         'admin_label' => false,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Blog posts style', 'uxbarn'),
         'param_name' => 'blog_style',
         'value' => array(
                        __('Grid with large first post (work best on 1/1 column with "no-padding" option)', 'uxbarn') => 'grid',
                        __('Grid 2 columns (work best on 1/1 column with "no-padding" option)', 'uxbarn') => 'grid-2-cols',
                        __('List Items', 'uxbarn') => 'list',
                        //__('Full Size (as using on actual blog page, work best on 3/4 column with "no-padding" option)', 'uxbarn') => 'full',
                    ),
         'description' => __('Select the blog style to use.', 'uxbarn'),
         'admin_label' => true,
      ),
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Thumbnail style', 'uxbarn'),
         'param_name' => 'thumbnail_style',
         'value' => array(
                        __('Below blog title', 'uxbarn') => 'below',
                        __('Above blog title', 'uxbarn') => 'above',
                        __('No thumbnail', 'uxbarn') => 'none',
                    ),
         'description' => __('Select the style for post thumbnail.', 'uxbarn'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'blog_style',
                            'value' => array('grid', 'grid-2-cols'),
                        )
      ),
      
      array(
         'type' => 'dropdown',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Display thumbnail?', 'uxbarn'),
         'param_name' => 'list_display_thumbnail',
         'value' => array(
                        __('Yes', 'uxbarn') => 'true',
                        __('No', 'uxbarn') => 'false',
                    ),
         'description' => __('Whether to display post thumbnail with the list.', 'uxbarn'),
         'admin_label' => false,
         'dependency' => array(
                            'element' => 'blog_style',
                            'value' => array('list'),
                        )
      ),
      array(
         'type' => 'checkbox',
         'holder' => 'div',
         'class' => '',
         'heading' => __('Meta info display', 'uxbarn'),
         'param_name' => 'meta_info_display',
         'value' => array(
                        __('Date', 'uxbarn') . '<br/>' => 'date',
                        __('Author', 'uxbarn') . '<br/>' => 'author',
                        __('Comment', 'uxbarn') . '<br/>' => 'comment',
                    ),
         'description' => __('Select which meta info to be displayed. <strong>* NOTE:</strong> The first Grid style will display "Author" and "Comment" only in the first item. Other items will show only date.', 'uxbarn'),
         'admin_label' => false,
      ),
      uxbarn_get_orderby(),
      uxbarn_get_order(),
      uxbarn_get_extra_class_name(),
   )
) );








/* Search form
---------------------------------------------------------- */
vc_map( array(
  'name' => __('Search Box', 'uxbarn'),
  'base' => 'uxb_searchform',
   'icon' => 'icon-wpb-uxb_searchform',
  'category' => __('Content', 'uxbarn'),
  'params' => array(
        array(
          'type' => 'textfield',
          'admin_label' => true,
          'heading' => __('Title', 'uxbarn'),
          'param_name' => 'title',
          'value' => __('Search', 'uxbarn'),
          'description' => __('Enter the title. Leave it blank to hide it.', 'uxbarn')
        ),
    )
));







/* Raw HTML
---------------------------------------------------------- */
vc_map( array(
  "name" => __("Raw HTML", "uxbarn"),
    "base" => "vc_raw_html",
    "icon" => "icon-wpb-raw-html",
    "category" => __('Code', 'uxbarn'),
    "wrapper_class" => "clearfix",
    "params" => array(
        array(
        "type" => "textarea_raw_html",
            "holder" => "div",
            "heading" => __("Raw HTML", "uxbarn"),
            "param_name" => "content",
            "value" => base64_encode("<p>I am raw html block.<br/>Click edit button to change this html</p>"),
            "description" => __("Enter your HTML content.", "uxbarn")
        ),
    )
) );







/* Raw JS
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Raw JS", "uxbarn"),
    "base" => "vc_raw_js",
    "icon" => "icon-wpb-raw-javascript",
    "category" => __('Code', 'uxbarn'),
    "wrapper_class" => "clearfix",
    "params" => array(
    array(
        "type" => "textarea_raw_html",
            "holder" => "div",
            "heading" => __("Raw js", "uxbarn"),
            "param_name" => "content",
            "value" => __(base64_encode("<script type='text/javascript'> alert('Enter your js here!'); </script>"), "uxbarn"),
            "description" => __("Enter your JS code.", "uxbarn")
        ),
    )
) );






// Contact form 7 plugin
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
if (is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
  global $wpdb;
  $cf7 = $wpdb->get_results( 
    "
    SELECT ID, post_title 
    FROM $wpdb->posts
    WHERE post_type = 'wpcf7_contact_form' 
    "
  );
  $contact_forms = array();
  if ($cf7) {
    foreach ( $cf7 as $cform ) {
      $contact_forms[$cform->post_title] = $cform->ID;
    }
  } else {
    $contact_forms["No contact forms found"] = 0;
  }
  vc_map( array(
    "base" => "contact-form-7",
    "name" => __("Contact Form 7", "uxbarn"),
    "icon" => "icon-wpb-contactform7",
    "category" => __('Plugin', 'uxbarn'),
    "params" => array(
      array(
        "type" => "textfield",
        "heading" => __("Form title", "uxbarn"),
        "param_name" => "title",
        "admin_label" => true,
        "description" => __("What text use as form title. Leave blank if no title is needed.", "uxbarn")
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Select contact form", "uxbarn"),
        "param_name" => "id",
        "value" => $contact_forms,
        "description" => __("Choose previously created contact form from the drop down list.", "uxbarn")
      )
    )
  ) );
} // if contact form7 plugin active






if (is_plugin_active('LayerSlider/layerslider.php') || file_exists(get_template_directory() . '/includes/layerslider/layerslider.php')) {
  global $wpdb;
  $ls = $wpdb->get_results( 
    "
    SELECT id, name, date_c
    FROM ".$wpdb->prefix."layerslider
    WHERE flag_hidden = '0' AND flag_deleted = '0'
    ORDER BY date_c ASC LIMIT 100
    "
  );
  $layer_sliders = array();
  if ($ls) {
    foreach ( $ls as $slider ) {
      $layer_sliders[$slider->name] = $slider->id;
    }
  } else {
    $layer_sliders["No sliders found"] = 0;
  }
  vc_map( array(
    "base" => "layerslider",
    "name" => __("Layer Slider", "uxbarn"),
    "icon" => "icon-wpb-layerslider",
    "category" => __('Plugin', 'uxbarn'),
    "params" => array(
      array(
        "type" => "textfield",
        "heading" => __("Widget title", "uxbarn"),
        "param_name" => "title",
        "description" => __("What text use as a widget title. Leave blank if no title is needed.", "uxbarn")
      ),
      array(
        "type" => "dropdown",
        "heading" => __("LayerSlider ID", "uxbarn"),
        "param_name" => "id",
        "admin_label" => true,
        "value" => $layer_sliders,
        "description" => __("Select your LayerSlider.", "uxbarn")
      ),
      array(
        "type" => "textfield",
        "heading" => __("Extra class name", "uxbarn"),
        "param_name" => "el_class",
        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "uxbarn")
      )
    )
  ) );
} // if layer slider plugin active






if (is_plugin_active('gravityforms/gravityforms.php')) {
  $gravity_forms_array[__("No Gravity forms found.", "uxbarn")] = '';
  if ( class_exists('RGFormsModel') ) {
    $gravity_forms = RGFormsModel::get_forms(1, "title");
    if ($gravity_forms) {
      $gravity_forms_array = array(__("Select a form to display.", "uxbarn") => '');
      foreach ( $gravity_forms as $gravity_form ) {
        $gravity_forms_array[$gravity_form->title] = $gravity_form->id;
      }
    }
  }
  vc_map( array(
    "name" => __("Gravity Form", "uxbarn"),
    "base" => "gravityform",
    "icon" => "icon-wpb-vc_gravityform",
    "category" => __("Content", "uxbarn"),
    "params" => array(
      array(
        "type" => "dropdown",
        "heading" => __("Form", "uxbarn"),
        "param_name" => "id",
        "value" => $gravity_forms_array,
        "description" => __("Select a form to add it to your post or page.", "uxbarn"),
        "admin_label" => true
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Display Form Title", "uxbarn"),
        "param_name" => "title",
        "value" => array( __("No", "uxbarn") => 'false', __("Yes", "uxbarn") => 'true' ),
        "description" => __("Would you like to display the forms title?", "uxbarn"),
        "dependency" => Array('element' => "id", 'not_empty' => true)
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Display Form Description", "uxbarn"),
        "param_name" => "description",
        "value" => array( __("No", "uxbarn") => 'false', __("Yes", "uxbarn") => 'true' ),
        "description" => __("Would you like to display the forms description?", "uxbarn"),
        "dependency" => Array('element' => "id", 'not_empty' => true)
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Enable AJAX?", "uxbarn"),
        "param_name" => "ajax",
        "value" => array( __("No", "uxbarn") => 'false', __("Yes", "uxbarn") => 'true' ),
        "description" => __("Enable AJAX submission? <strong>Note:</strong> If you experience some issue in the form, try disabling this.", "uxbarn"),
        "dependency" => Array('element' => "id", 'not_empty' => true)
      ),
      array(
        "type" => "textfield",
        "heading" => __("Tab Index", "uxbarn"),
        "param_name" => "tabindex",
        "description" => __("(Optional) Specify the starting tab index for the fields of this form. Leave blank if you're not sure what this is.", "uxbarn"),
        "dependency" => Array('element' => "id", 'not_empty' => true)
      )
    )
  ) );
} // if gravityforms active