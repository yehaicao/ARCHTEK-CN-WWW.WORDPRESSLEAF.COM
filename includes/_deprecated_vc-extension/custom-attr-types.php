<?php

// Custom checkbox type (to have a proper style and line-break)
if(!function_exists('uxbarn_register_uxb_checkbox_type')) {
    function uxbarn_register_uxb_checkbox_type($settings, $value) {
        
        $dependency = vc_generate_dependencies_attributes($settings);
        $param_line = '<input class="wpb_vc_param_value wpb-checkboxes" type="hidden" value="" name="'.$settings['param_name'].'"/>';
        $current_value = explode(',', $value);
        $values = is_array($settings['value']) ? $settings['value'] : array();
        
        foreach ( $values as $label => $v ) {
            $checked = in_array($v, $current_value) ? ' checked="checked"' : '';
            $param_line .= ' <label class="uxb_checkbox_label"><input id="'. $settings['param_name'] . '-' . $v .'" value="' . $v . '" class="'.$settings['param_name'].' '.$settings['type'].'" type="checkbox" name="'.$settings['param_name'].'"'.$checked.'> ' . __($label, 'uxbarn') . '</label>';
        }
        
        return $param_line;
    }
}
add_shortcode_param('uxb_checkbox', 'uxbarn_register_uxb_checkbox_type');