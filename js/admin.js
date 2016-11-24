/*global jQuery:false, AdminSettings:false */

jQuery(document).ready(function($) {
	"use strict";
   
    // ---------------------------------------------- //
    // General
    // ---------------------------------------------- //
   
    //$('#option-tree-sub-header').append('<div style="float:left; margin-top: 17px; margin-left:18px; color:#666;"><img src="' + AdminSettings.image_path + '/admin/uxbarn_sm.jpg" alt="" style="vertical-align: middle;margin-right: 8px;margin-bottom: 5px;" />' + AdminSettings.welcome_text + ' <a href="http://themeforest.net/user/UXbarn?ref=UXbarn" target="_blank">ThemeForest</a>.</div>');
    
    $('#option-tree-sub-header').append('<div id="theme-options-msg">' + AdminSettings.welcome_text + ' <a href="http://themeforest.net/user/UXbarn?ref=UXbarn" target="_blank">ThemeForest</a>.</div>');

	$('#option-tree-version').html('<span id="theme-version">' + AdminSettings.theme_version + '</span>');
	$('#option-tree-header #option-tree-logo a').attr('href', 'http://themeforest.net/user/UXbarn?ref=UXbarn').attr('target', '_blank');
    
    
    // ---------------------------------------------- //
    // Portfolio Meta
    // ---------------------------------------------- //
    
    // Portfolio Format Selection
    /*var selectedFormat = $('input[name="uxbarn_portfolio_item_format"]:checked').val();
    
    hidePortfolioFormatContentBoxes(selectedFormat);
    
    $('input[name="uxbarn_portfolio_item_format"]').on('change', function() {
        hidePortfolioFormatContentBoxes($(this).val());
    });
    
    function hidePortfolioFormatContentBoxes(excludedFormat) {
        $('#uxbarn_portfolio_image_slideshow_format_meta_box, #uxbarn_portfolio_video_format_meta_box').hide();
        
        switch(excludedFormat) {
            case 'image-slideshow' : $('#uxbarn_portfolio_image_slideshow_format_meta_box').show(); break;
            case 'video' : $('#uxbarn_portfolio_video_format_meta_box').show(); break;
        }
    
    }
    */
    
    
});