jQuery(document).ready(function($) {
    
    /*if(jQuery().iphoneStyle) {
        $('.wpb_el_type_checkbox input.checkbox').not('.uxb_theme_class').iphoneStyle({
            checkedLabel: AdminSettings.yes_text,
            uncheckedLabel: AdminSettings.no_text
        });
    }*/
    
    //$('input.uxb_theme_class').before('<span style="display: block; margin-bottom: 3px;"></span>');
    
    function isNumber(evt) {
        var charCode = (event.which) ? event.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    
    $('input.size, input.icon_size').keypress(function() {
        return isNumber($(this).val());
    });
    
    
});