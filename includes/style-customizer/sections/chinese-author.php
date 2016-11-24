<?php

if( ! function_exists('uxbarn_ctmzr_chinese_author')) {

    function uxbarn_ctmzr_chinese_author($wp_customize) {
        $wp_customize->add_section('uxbarn_sc_chinese_author_section', array(
                'title'    => __('汉化作者', 'uxbarn'),
                'description' => '',
                'priority' => '1',
            )
        );
        
        // Description
        $wp_customize->add_setting('uxbarn_sc_chinese_author_description', array(
            'default' => '',
        ));
        $wp_customize->add_control(new WP_Customize_Description_Custom_Control($wp_customize, 'uxbarn_sc_chinese_author_description', 
                array(
                    'label' => __('Archtek汉化中文版由<a href=http://www.wordpressleaf.com target=_blank>WordPress leaf</a>汉化，<a href=http://themostspecialname.com target=_blank>The Most Special Name</a>联合出品。<br>如果您需要深度汉化请联系作者。<br>
			<a target=_blank href=http://www.wordpressleaf.com class=wordpressleaf-badge wp-badge>WordPress Leaf</a> <br>
			<a target=_blank href=http://themostspecialname.com class=themostspecialname-badge wp-badge>themostspecialname</a><br><br>
   		<h3 style=margin: 0 0 10px;>捐助我们</h3>
			如果您愿意捐助我们，请点击<a href=http://www.wordpressleaf.com/donate target=_blank><strong>这里</strong></a>或者使用微信扫描下面的二维码进行捐助。谢谢！<br>
			<img src=http://www.wordpressleaf.com/wp-content/themes/wordpressleaf/assets/images/weixin.png width=140 height=140 alt=捐助我们> ', 'uxbarn'),
                    'section' => 'uxbarn_sc_chinese_author_section',
                    'priority' => '31',
                )
            )
        );
        
    }

}
    

?>