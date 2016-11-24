<?php

$output = $extra_class = $image = $img_size = $has_link = $link = $stretch_image = $link_type = $alt_text = $css_animation = '';

extract(shortcode_atts(array(
    'image' => $image,
    'img_size'  => '',
    'stretch_image' => '', // true, false
    'image_position' => '',
    'has_link' => 'false', // true, false
    'link' => '', // to any url
    'link_type' => 'normal', // normal, normal-window, image
    /*'alt_text' => '',*/
    'extra_class' => '',
    'css_animation' => '',
), $atts));


$img_size = trim($img_size);

$img_id = preg_replace('/[^\d]/', '', $image);

$extra_class = $this->getExtraClass($extra_class);

$img_array = wp_get_attachment_image_src($img_id, $img_size);

$img_src = $img_array[0];

$image_class = '';
if($stretch_image == 'true') {
    $image_class .= ' stretch-image ';
}

$css_animation .= $this->getCSSAnimation($css_animation);

//$image_class .= ' ' . $css_animation;
$image_class = ' class="image-shortcode ' . $image_class . '" ';

$attachment = uxbarn_get_attachment($img_id);

$alt = $attachment['alt']; //trim(esc_attr(strip_tags( get_post_meta($img_id, '_wp_attachment_image_alt', true) )));
$title = $attachment['title'];
$caption = $attachment['caption'];
    
$output = '<img src="' . $img_src . '" alt="' . $alt . '" ' . $image_class . ' width="' . $img_array[1] . '" height="' . $img_array[2] . '" />';

if($has_link == 'true') {
    
    $target = '';
    if($link_type == 'normal-window') {
        $target = ' target="_blank" ';
    }
    
    $lightbox_class = '';
    if($link_type == 'image') {
        //wp_enqueue_style('uxbarn-fancybox');
        //wp_enqueue_script('uxbarn-fancybox');
        $lightbox_class = ' image-box ';
        $link = wp_get_attachment_image_src($img_id, 'full');
        $link = $link[0];
        
    }

    $class = ' class="' . $lightbox_class . ' link-image"';
    
    if($title != '') {
        $title = ' title="' . $title . '" ';
    }
    
    $output = '<a href="' . esc_url( $link ) . '" ' . $target . $class . ' ' . $title . '>' . $output . '</a>';

}

if($caption != '') {
	$output .= '<div class="image-caption">' . $caption . '</div>';
}

$stretch_class = '';
if($stretch_image == 'true') {
    $stretch_class = ' stretched ';
}

echo '<div class="vc_single_image ' . $image_position . ' ' . $extra_class . ' ' . $css_animation . ' ' . $stretch_class . '">' . $output . '</div>';