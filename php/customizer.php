<?php

function fancy_ustomizer( $wp_customize ){

	$wp_customize->add_section(
		'sec_copyright', array(
			'title' 		=> 'Copyright Settings',
			'description' 	=> 'Copyright Section' 
		)
	);

            $wp_customize->add_setting(
                'set_copyright', array(
                    'type' 				=> 'theme_mod',
                    'default' 			=> '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_copyright', array(
                    'label' 		=> 'Copyright',
                    'description' 	=> 'Please, add your copyright information here',
                    'section' 		=> 'sec_copyright',
                    'type' 			=> 'text'
                ) 
            );

    // ---------------------------------------------------

    $wp_customize->add_section(
        'sec_slider', array(
            'title' 		=> 'Slider Settings',
            'description' 	=> 'Slider Section' 
        )
    );

            for ($i = 1; $i <= 3; $i++) {
                

            // ---------------------------------------------------

            $wp_customize->add_setting(
                'set_slider_page'.$i, array(
                    'type' 				=> 'theme_mod',
                    'default' 			=> '',
                    'sanitize_callback' => 'absint'
                )
            ); 

            $wp_customize->add_control(
                'set_slider_page'.$i, array(
                    'label' 		=> 'Set slider page '.$i,
                    'description' 	=> 'Set slider page '.$i,
                    'section' 		=> 'sec_slider',
                    'type' 			=> 'dropdown-pages'
                ) 
            );

            // ---------------------------------------------------

            $wp_customize->add_setting(
                'set_slider_button_text'.$i, array(
                    'type' 				=> 'theme_mod',
                    'default' 			=> '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            ); 

            $wp_customize->add_control(
                'set_slider_button_text'.$i, array(
                    'label' 		=> 'Button Text for Page '.$i,
                    'description' 	=> 'Button Text for Page '.$i,
                    'section' 		=> 'sec_slider',
                    'type' 			=> 'text'
                ) 
            );

            // ---------------------------------------------------

            $wp_customize->add_setting(
                'set_slider_button_url'.$i, array(
                    'type' 				=> 'theme_mod',
                    'default' 			=> '',
                    'sanitize_callback' => 'esc_url_raw'
                )
            ); 

            $wp_customize->add_control(
                'set_slider_button_url'.$i, array(
                    'label' 		=> 'URL for Page '.$i,
                    'description' 	=> 'URL for Page '.$i,
                    'section' 		=> 'sec_slider',
                    'type' 			=> 'url'
                ) 
            );

            
            }    

}
add_action( 'customize_register', 'fancy_ustomizer' );
