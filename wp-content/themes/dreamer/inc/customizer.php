<?php
/**
 * dreamer Theme Customizer
 *
 * @package dreamer
 * @since dreamer 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dreamer_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'dreamer_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dreamer_customize_preview_js() {
	wp_enqueue_script( 'dreamer_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'dreamer_customize_preview_js' );

/**
 * Customizer
 *
 * @since dreamer 1.0
 */
function dreamer_theme_customizer( $wp_customize ) {

	/*--------------------------------------------------------------
		Layout
	--------------------------------------------------------------*/
	$wp_customize->add_section( 'dreamer_layout_section' , array(
	    'title' => __( 'Layout', 'dreamer' ),
	    'priority' => 10,
	    'description' => 'Layout Customization',
	) );

	$wp_customize->add_setting('dreamer_sidebar_position', array(
		'default' => 'left',
	));

	$wp_customize->add_control('dreamer_sidebar_position', array(
		'label' => __('Blog Sidebar Position', 'dreamer'),
		'section' => 'dreamer_layout_section',
		'settings' => 'dreamer_sidebar_position',
		'type' => 'select',
		'choices' => array(
			'right' => 'left',
			'left' => 'right'
		),
	));
	
	/* Excerpt Automatic */
	$wp_customize->add_setting('dreamer_excerpt', array(
		'default' => 'no',
	));

	$wp_customize->add_control('dreamer_excerpt', array(
		'label' => __('Excerpt Automatic', 'dreamer'),
		'section' => 'dreamer_layout_section',
		'settings' => 'dreamer_excerpt',
		'type' => 'select',
		'choices' => array(
			'no' => 'No',
			'yes' => 'Yes'
		),
	));
	
	/*--------------------------------------------------------------
		Slider Options
	--------------------------------------------------------------*/
	$wp_customize->add_section( 'dreamer_slider_section' , array(
	    'title' => __( 'Slider Options', 'dreamer' ),
	    'priority' => 20,
	    'description' => 'Slider Options',
	) );

	/* Slider Home Page */
	$wp_customize->add_setting('dreamer_slider_option', array(
		'default' => 'default',
	));

	$wp_customize->add_control('dreamer_slider_option', array(
		'label' => __('Home Page Activated?', 'dreamer'),
		'priority' => 1,
		'section' => 'dreamer_slider_section',
		'settings' => 'dreamer_slider_option',
		'type' => 'select',
		'choices' => array(
			'no' => 'No',
			'yes' => 'Yes'
		),
	));

	/* Directions Colors */
    $wp_customize->add_setting( 'dreamer_slider_color', array(
        'default' => '#64625a',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control ( $wp_customize, 'dreamer_slider_color', array(
		'label' => __( 'Directions Colors', 'dreamer' ),
		'priority' => 2,
		'section' => 'dreamer_slider_section',
		'settings' => 'dreamer_slider_color',
	) ) );

	/*--------------------------------------------------------------
		Google Fonts and Font Size
	--------------------------------------------------------------*/
	$wp_customize->add_section( 'dreamer_fonts_section' , array(
		'title' => __( 'Fonts', 'dreamer' ),
		'priority' => 30,
		'description' => __( 'Choose the Google Fonts, insert the link like http://fonts.googleapis.com/css?family=Raleway, then insert the Font Name (ex: Raleway) in the text area of the elements like Body.', 'dreamer' ),
	) );

	class dreamer_Customize_Fonts_Control extends WP_Customize_Control {
	    public $type = 'text';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <input type="text" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></input>
	            </label>
	        <?php
	    }
	}

	$wp_customize->add_setting( 'dreamer_body_font_link' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_body_font_link',
	        array(
	            'label' => 'Insert the Link Code',
	            'priority' => 1,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_body_font_link'
	        )
	    )
	);

	/* Body Font Name */
	$wp_customize->add_setting( 'dreamer_body_font_name' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_body_font_name',
	        array(
	            'label' => 'Body Font Name',
	            'priority' => 2,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_body_font_name'
	        )
	    )
	);

	/* Body Font Size */
	$wp_customize->add_setting( 'dreamer_body_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_body_font_size',
	        array(
	            'label' => 'Body Font Size (ex: 14px)',
	            'priority' => 3,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_body_font_size'
	        )
	    )
	);

	/* Site Title Font Name */
	$wp_customize->add_setting( 'dreamer_site_title_font_name' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_site_title_font_name',
	        array(
	            'label' => 'Site Title Font Name',
	            'priority' => 4,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_site_title_font_name'
	        )
	    )
	);

	/* Site Title Font Size */
	$wp_customize->add_setting( 'dreamer_site_title_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_site_title_font_size',
	        array(
	            'label' => 'Site Title Font Size (ex: 14px)',
	            'priority' => 5,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_site_title_font_size'
	        )
	    )
	);

	/* Headings Font Name */
	$wp_customize->add_setting( 'dreamer_heading_font_name' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_heading_font_name',
	        array(
	            'label' => 'Headings Font Name',
	            'priority' => 6,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_heading_font_name'
	        )
	    )
	);

	/* Headings H1 Font Size */
	$wp_customize->add_setting( 'dreamer_heading_h1_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_heading_h1_font_size',
	        array(
	            'label' => 'H1 Font Size (ex: 34px)',
	            'priority' => 7,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_heading_h1_font_size'
	        )
	    )
	);

	/* Headings H2 Font Size */
	$wp_customize->add_setting( 'dreamer_heading_h2_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_heading_h2_font_size',
	        array(
	            'label' => 'H2 Font Size (ex: 28px)',
	            'priority' => 8,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_heading_h2_font_size'
	        )
	    )
	);

	/* Headings H3 Font Size */
	$wp_customize->add_setting( 'dreamer_heading_h3_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_heading_h3_font_size',
	        array(
	            'label' => 'H3 Font Size (ex: 22px)',
	            'priority' => 9,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_heading_h3_font_size'
	        )
	    )
	);

	/* Headings H4 Font Size */
	$wp_customize->add_setting( 'dreamer_heading_h4_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_heading_h4_font_size',
	        array(
	            'label' => 'H4 Font Size (ex: 16px)',
	            'priority' => 10,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_heading_h4_font_size'
	        )
	    )
	);

	/* Headings H5 Font Size */
	$wp_customize->add_setting( 'dreamer_heading_h5_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_heading_h5_font_size',
	        array(
	            'label' => 'H5 Font Size (ex: 14px)',
	            'priority' => 11,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_heading_h5_font_size'
	        )
	    )
	);

	/* Headings H6 Font Size */
	$wp_customize->add_setting( 'dreamer_heading_h6_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_heading_h6_font_size',
	        array(
	            'label' => 'H6 Font Size (ex: 12px)',
	            'priority' => 12,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_heading_h6_font_size'
	        )
	    )
	);

	/* Post and Page Title Font Name */
	$wp_customize->add_setting( 'dreamer_post_font_name' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_post_font_name',
	        array(
	            'label' => 'Post and Page Title Font Name',
	            'priority' => 13,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_post_font_name'
	        )
	    )
	);

	/* Post and Page Title Font Size */
	$wp_customize->add_setting( 'dreamer_post_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_post_font_size',
	        array(
	            'label' => 'Post and Page Title Font Size (ex: 20px)',
	            'priority' => 14,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_post_font_size'
	        )
	    )
	);

	/* Navigation Font Name */
	$wp_customize->add_setting( 'dreamer_nav_font_name' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_nav_font_name',
	        array(
	            'label' => 'Navigation Font Name',
	            'priority' => 15,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_nav_font_name'
	        )
	    )
	);

	/* Navigation Font Size */
	$wp_customize->add_setting( 'dreamer_nav_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_nav_font_size',
	        array(
	            'label' => 'Navigation Font Size (ex: 20px)',
	            'priority' => 16,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_nav_font_size'
	        )
	    )
	);

	/* Widget Title Font Name */
	$wp_customize->add_setting( 'dreamer_widget_title_font_name' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_widget_title_font_name',
	        array(
	            'label' => 'Widget Title Font Name',
	            'priority' => 17,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_widget_title_font_name'
	        )
	    )
	);

	/* Widget Title Font Size */
	$wp_customize->add_setting( 'dreamer_widget_title_font_size' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Fonts_Control(
	        $wp_customize,
	        'dreamer_widget_title_font_size',
	        array(
	            'label' => 'Widget Title Font Size (ex: 14px)',
	            'priority' => 18,
	            'section' => 'dreamer_fonts_section',
	            'settings' => 'dreamer_widget_title_font_size'
	        )
	    )
	);

	/*--------------------------------------------------------------
		Colors
	--------------------------------------------------------------*/
	/* Border Body Color */
    $wp_customize->add_setting( 'dreamer_border_body_color', array(
        'default' => '#c1d1cd',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_border_body_color', array(
		'label' => __( 'Border Body Color', 'dreamer' ),
		'section' => 'colors',
		'priority' => 0,
		'settings' => 'dreamer_border_body_color',
	) ) );

	/* Body Font Color */
    $wp_customize->add_setting( 'dreamer_body_color', array(
        'default' => '#666666',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_body_color', array(
		'label' => __( 'Body Font Color', 'dreamer' ),
		'section' => 'colors',
		'priority' => 1,
		'settings' => 'dreamer_body_color',
	) ) );

	/* Link Color */
    $wp_customize->add_setting( 'dreamer_link_color', array(
        'default' => '#666666',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_link_color', array(
		'label' => __( 'Link Color', 'dreamer' ),
		'section' => 'colors',
		'priority' => 2,
		'settings' => 'dreamer_link_color',
	) ) );

	/* Link Hover Color */
    $wp_customize->add_setting( 'dreamer_hover_color', array(
        'default' => '#cccccc',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_hover_color', array(
		'label' => __( 'Link Hover Color', 'dreamer' ),
		'section' => 'colors',
		'priority' => 3,
		'settings' => 'dreamer_hover_color',
	) ) );

	/* Site Title Font Color */
    $wp_customize->add_setting( 'dreamer_site_title_color', array(
        'default' => '#c1d1cd',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_site_title_color', array(
		'label' => __( 'Site Title Font Color', 'dreamer' ),
		'priority' => 4,
		'section' => 'colors',
		'settings' => 'dreamer_site_title_color',
	) ) );

	/* Headings Font Color */
    $wp_customize->add_setting( 'dreamer_heading_color', array(
        'default' => '#666666',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_heading_color', array(
		'label' => __( 'Headings Font Color', 'dreamer' ),
		'priority' => 5,
		'section' => 'colors',
		'settings' => 'dreamer_heading_color',
	) ) );

	/* Main Menu Text Color */
    $wp_customize->add_setting( 'dreamer_nav_text_color', array(
        'default' => '#ffffff',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_nav_text_color', array(
		'label' => __( 'Main Menu Text Color', 'dreamer' ),
		'priority' => 6,
		'section' => 'colors',
		'settings' => 'dreamer_nav_text_color',
	) ) );

	/* Main Menu Background Color */
    $wp_customize->add_setting( 'dreamer_nav_bg_color', array(
        'default' => '#c1d1cd',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_nav_bg_color', array(
		'label' => __( 'Main Menu Background Color', 'dreamer' ),
		'priority' => 7,
		'section' => 'colors',
		'settings' => 'dreamer_nav_bg_color',
	) ) );

	/* Post Title Link Color */
    $wp_customize->add_setting( 'dreamer_post_color', array(
        'default' => '#000000',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_post_color', array(
		'label' => __( 'Post Title Color', 'dreamer' ),
		'section' => 'colors',
		'priority' => 8,
		'settings' => 'dreamer_post_color',
	) ) );

	/* Post Title Link Hover Color */
    $wp_customize->add_setting( 'dreamer_post_hover_color', array(
        'default' => '#cccccc',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_post_hover_color', array(
		'label' => __( 'Post Title Hover Color', 'dreamer' ),
		'priority' => 9,
		'section' => 'colors',
		'settings' => 'dreamer_post_hover_color',
	) ) );

	/* Widget Border Color */
    $wp_customize->add_setting( 'dreamer_widget_border_color', array(
        'default' => '#c1d1cd',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_widget_border_color', array(
		'label' => __( 'Widget Border Color', 'dreamer' ),
		'section' => 'colors',
		'priority' => 10,
		'settings' => 'dreamer_widget_border_color',
	) ) );

	/* Widget Title Color */
    $wp_customize->add_setting( 'dreamer_widget_title_color', array(
        'default' => '#000000',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_widget_title_color', array(
		'label' => __( 'Widget Title Color', 'dreamer' ),
		'section' => 'colors',
		'priority' => 11,
		'settings' => 'dreamer_widget_title_color',
	) ) );

	/* Icons Color */
    $wp_customize->add_setting( 'dreamer_icons_color', array(
        'default' => '#c1d1cd',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_icons_color', array(
		'label' => __( 'Icons Color', 'dreamer' ),
		'section' => 'colors',
		'priority' => 12,
		'settings' => 'dreamer_icons_color',
	) ) );
	
	/* Blockquote Color */
    $wp_customize->add_setting( 'dreamer_blockquote_color', array(
        'default' => '#c1d1cd',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_blockquote_color', array(
		'label' => __( 'Blockquote', 'dreamer' ),
		'priority' => 13,
		'section' => 'colors',
		'settings' => 'dreamer_blockquote_color',
	) ) );

	/* Button Color */
    $wp_customize->add_setting( 'dreamer_button_color', array(
        'default' => '#cccccc',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_button_color', array(
		'label' => __( 'Button', 'dreamer' ),
		'priority' => 14,
		'section' => 'colors',
		'settings' => 'dreamer_button_color',
	) ) );

	/* Button Text Color */
    $wp_customize->add_setting( 'dreamer_button_text_color', array(
        'default' => '#ffffff',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_button_text_color', array(
		'label' => __( 'Button Text', 'dreamer' ),
		'priority' => 15,
		'section' => 'colors',
		'settings' => 'dreamer_button_text_color',
	) ) );
	
	/* Pagination Current Color */
    $wp_customize->add_setting( 'dreamer_pagination_current_color', array(
        'default' => '#c1d1cd',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_pagination_current_color', array(
		'label' => __( 'Pagination Current', 'dreamer' ),
		'priority' => 24,
		'section' => 'colors',
		'settings' => 'dreamer_pagination_current_color',
	) ) );

	/* Pagination Next Color */
    $wp_customize->add_setting( 'dreamer_pagination_next_color', array(
        'default' => '#cccccc',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_pagination_next_color', array(
		'label' => __( 'Pagination Next', 'dreamer' ),
		'priority' => 25,
		'section' => 'colors',
		'settings' => 'dreamer_pagination_next_color',
	) ) );

	/* Pagination Text Color */
    $wp_customize->add_setting( 'dreamer_pagination_text_color', array(
        'default' => '#ffffff',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_pagination_text_color', array(
		'label' => __( 'Pagination Text', 'dreamer' ),
		'priority' => 26,
		'section' => 'colors',
		'settings' => 'dreamer_pagination_text_color',
	) ) );

	/*--------------------------------------------------------------
		Footer Credits
	--------------------------------------------------------------*/
	$wp_customize->add_section( 'dreamer_footer_section' , array(
	    'title'       => __( 'Footer Credits', 'dreamer' ),
	    'priority' => 70,
	    'description' => 'Custom Footer Credits',
	) );

	$wp_customize->add_setting('dreamer_footer');

	$wp_customize->add_control(
	    'dreamer_footer',
	    array(
	        'label' => 'Footer Credits',
	        'section' => 'dreamer_footer_section',
	        'type' => 'text',
	    )
	);

	/*--------------------------------------------------------------
		Custom CSS
	--------------------------------------------------------------*/
	class dreamer_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}

	$wp_customize->add_section( 'dreamer_css_section' , array(
	    'title'       => __( 'Custom CSS', 'dreamer' ),
	    'priority'    => 80,
	    'description' => 'You can add your custom CSS',
	) );

	$wp_customize->add_setting( 'dreamer_css' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Textarea_Control(
	        $wp_customize,
	        'dreamer_css',
	        array(
	            'label' => 'Custom CSS',
	            'section' => 'dreamer_css_section',
	            'settings' => 'dreamer_css'
	        )
	    )
	);

	/*--------------------------------------------------------------
		Footer Scripts
	--------------------------------------------------------------*/
	$wp_customize->add_section( 'dreamer_scripts_section' , array(
	    'title'       => __( 'Custom Footer Scripts', 'dreamer' ),
	    'priority'    => 90,
	    'description' => 'You can add your custom Scripts in the footer without the tag "script". For example: google analytics.',
	) );

	$wp_customize->add_setting( 'dreamer_scripts' );
	 
	$wp_customize->add_control(
	    new dreamer_Customize_Textarea_Control(
	        $wp_customize,
	        'dreamer_scripts',
	        array(
	            'label' => 'Custom Scripts',
	            'section' => 'dreamer_scripts_section',
	            'settings' => 'dreamer_scripts'
	        )
	    )
	);
}
add_action('customize_register', 'dreamer_theme_customizer');

/**
 * Customizer Apply Style
 *
 * @since dreamer 1.0
 */
if ( ! function_exists( 'dreamer_apply_style' ) ) :
  	
  	function dreamer_apply_style() {	
		if ( get_theme_mod('dreamer_slider_color') || 
		     get_theme_mod('dreamer_sidebar_position') || 
			 get_theme_mod('dreamer_body_font_link') || 
			 get_theme_mod('dreamer_body_font_name') || 
			 get_theme_mod('dreamer_body_font_size') || 
			 get_theme_mod('dreamer_site_title_font_name') || 
			 get_theme_mod('dreamer_site_title_font_size') || 
			 get_theme_mod('dreamer_heading_font_name') || 
		     get_theme_mod('dreamer_heading_h1_font_size') || 
		     get_theme_mod('dreamer_heading_h2_font_size') || 
		     get_theme_mod('dreamer_heading_h3_font_size') || 
		     get_theme_mod('dreamer_heading_h4_font_size') || 
		     get_theme_mod('dreamer_heading_h5_font_size') || 
		     get_theme_mod('dreamer_heading_h6_font_size') || 
			 get_theme_mod('dreamer_post_font_name') || 
			 get_theme_mod('dreamer_post_font_size') || 
			 get_theme_mod('dreamer_nav_font_name') || 
			 get_theme_mod('dreamer_nav_font_size') || 
			 get_theme_mod('dreamer_widget_title_font_name') || 
			 get_theme_mod('dreamer_widget_title_font_size') || 
			 get_theme_mod('dreamer_border_body_color') || 
			 get_theme_mod('dreamer_body_color') || 
			 get_theme_mod('dreamer_link_color') || 
			 get_theme_mod('dreamer_hover_color') || 
			 get_theme_mod('dreamer_site_title_color') || 
			 get_theme_mod('dreamer_heading_color') || 
			 get_theme_mod('dreamer_nav_text_color') || 
			 get_theme_mod('dreamer_nav_bg_color') || 
			 get_theme_mod('dreamer_post_color') || 
			 get_theme_mod('dreamer_post_hover_color') || 
			 get_theme_mod('dreamer_widget_border_color') || 
			 get_theme_mod('dreamer_widget_title_color') || 
			 get_theme_mod('dreamer_icons_color') || 
			 get_theme_mod('dreamer_blockquote_color') || 
			 get_theme_mod('dreamer_button_color') || 
			 get_theme_mod('dreamer_button_text_color') || 
			 get_theme_mod('dreamer_pagination_current_color') || 
			 get_theme_mod('dreamer_pagination_next_color') || 
			 get_theme_mod('dreamer_pagination_text_color') || 
			 get_theme_mod('dreamer_css')
		) { 
		?>
			<?php if ( get_theme_mod('dreamer_body_font_link') ) : ?>
				<link href='<?php echo get_theme_mod('dreamer_body_font_link');  ?>' rel='stylesheet' type='text/css'>
			<?php endif; ?>
			<style id="dreamer-layout-settings">
				<?php if ( get_theme_mod('dreamer_sidebar_position') ) : ?>
					@media (min-width: 1024px) {
						.blog .column,
						.single .column {
							float: <?php echo get_theme_mod('dreamer_sidebar_position'); ?>;
						}
					}
				<?php endif; ?>
			</style>
			<style id="dreamer-style-settings">
				<?php if ( get_theme_mod('dreamer_slider_color') ) : ?>
					.flexslider:hover .flex-next,
					.flexslider:hover .flex-prev {
						color: <?php echo get_theme_mod('dreamer_slider_color');  ?>;
					}
				<?php endif; ?>
				
				<?php if ( get_theme_mod('dreamer_border_body_color') ) : ?>
					html {
						border: 12px solid <?php echo get_theme_mod('dreamer_border_body_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_body_font_name') ) : ?>
					body,
					button,
					input,
					select,
					textarea {
						font-family: '<?php echo get_theme_mod('dreamer_body_font_name');  ?>';
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_body_font_size') ) : ?>
					body,
					button,
					input,
					select,
					textarea {
						font-size: <?php echo get_theme_mod('dreamer_body_font_size');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_body_color') ) : ?>
					body,
					button,
					input,
					select,
					textarea {
						color: <?php echo get_theme_mod('dreamer_body_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_site_title_font_name') ) : ?>
					.site-title {
						font-family: '<?php echo get_theme_mod('dreamer_site_title_font_name');  ?>';
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_site_title_font_size') ) : ?>
					.site-title {
						font-size: <?php echo get_theme_mod('dreamer_site_title_font_size');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_site_title_color') ) : ?>
					.site-title a {
						color: <?php echo get_theme_mod('dreamer_site_title_color');  ?>;
					}
					.site-description {
						color: <?php echo get_theme_mod('dreamer_site_title_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_heading_font_name') ) : ?>
					h1, h2, h3, h4, h5, h6 {
						font-family: '<?php echo get_theme_mod('dreamer_heading_font_name');  ?>';
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_heading_h1_font_size') || 
						   get_theme_mod('dreamer_heading_h2_font_size') || 
						   get_theme_mod('dreamer_heading_h3_font_size') || 
						   get_theme_mod('dreamer_heading_h4_font_size') || 
						   get_theme_mod('dreamer_heading_h5_font_size') || 
						   get_theme_mod('dreamer_heading_h6_font_size')
						 ) : ?>
					h1 { font-size: <?php echo get_theme_mod('dreamer_heading_h1_font_size');  ?>; }
					h2 { font-size: <?php echo get_theme_mod('dreamer_heading_h2_font_size');  ?>; }
					h3 { font-size: <?php echo get_theme_mod('dreamer_heading_h3_font_size');  ?>; }
					h4 { font-size: <?php echo get_theme_mod('dreamer_heading_h4_font_size');  ?>; }
					h5 { font-size: <?php echo get_theme_mod('dreamer_heading_h5_font_size');  ?>; }
					h6 { font-size: <?php echo get_theme_mod('dreamer_heading_h6_font_size');  ?>; }
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_heading_color') ) : ?>
					h1, h2, h3, h4, h5, h6 {
						color: <?php echo get_theme_mod('dreamer_heading_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_link_color') ) : ?>
					a,
					a:visited {
						color: <?php echo get_theme_mod('dreamer_link_color');  ?>;
					}
				<?php endif; ?>
			
				<?php if ( get_theme_mod('dreamer_hover_color') ) : ?>
					a:hover,
					a:focus,
					a:active {
						color: <?php echo get_theme_mod('dreamer_hover_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_post_font_name') ) : ?>
					.entry-title,
					.entry-title a {
						font-family: '<?php echo get_theme_mod('dreamer_post_font_name');  ?>';
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_post_font_size') ) : ?>
					.entry-title,
					.entry-title a {
						font-size: <?php echo get_theme_mod('dreamer_post_font_size');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_post_color') ) : ?>
					.entry-title,
					.entry-title a {
						color: <?php echo get_theme_mod('dreamer_post_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_post_hover_color') ) : ?>
					.entry-title a:hover {
						color: <?php echo get_theme_mod('dreamer_post_hover_color');  ?> !important;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_nav_font_name') ) : ?>
					.main-navigation {
						font-family: '<?php echo get_theme_mod('dreamer_nav_font_name');  ?>';
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_nav_font_size') ) : ?>
					.main-navigation {
						font-size: <?php echo get_theme_mod('dreamer_nav_font_size');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_nav_text_color') ) : ?>
					.main-navigation a {
						color: <?php echo get_theme_mod('dreamer_nav_text_color');  ?> !important;
					}
					@media screen and (max-width: 1023px) {
						button.menu-toggle {
							color: <?php echo get_theme_mod('dreamer_nav_text_color');  ?>;
						}
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_nav_bg_color') ) : ?>
					.main-navigation {
						background-color: <?php echo get_theme_mod('dreamer_nav_bg_color');  ?>;
					}

					.main-navigation ul ul {
						background-color: <?php echo get_theme_mod('dreamer_nav_bg_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_widget_title_font_name') ) : ?>
					.widget-title {
						font-family: '<?php echo get_theme_mod('dreamer_widget_title_font_name');  ?>';
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_widget_title_font_size') ) : ?>
					.widget-title {
						font-size: <?php echo get_theme_mod('dreamer_widget_title_font_size');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_widget_title_color') ) : ?>
					.widget-title {
						color: <?php echo get_theme_mod('dreamer_widget_title_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_widget_border_color') ) : ?>
					.widget {
						border: 6px solid <?php echo get_theme_mod('dreamer_widget_border_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_icons_color') ) : ?>
					.social,
					.social-fontello {
						background-color: <?php echo get_theme_mod('dreamer_icons_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_blockquote_color') ) : ?>
					blockquote {
						border-left: 5px solid <?php echo get_theme_mod('dreamer_blockquote_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_button_color') || get_theme_mod('dreamer_button_text_color') ) : ?>
					button, 
					input[type="button"], 
					input[type="reset"], 
					input[type="submit"] {
						border: 1px solid <?php echo get_theme_mod('dreamer_button_color');  ?>;
						background: <?php echo get_theme_mod('dreamer_button_color');  ?>;
						color: <?php echo get_theme_mod('dreamer_button_text_color');  ?>;
					}
				<?php endif; ?>
				
				<?php if ( get_theme_mod('dreamer_pagination_current_color') ) : ?>
					.pagination a:hover, 
					.pagination .current {
						background: <?php echo get_theme_mod('dreamer_pagination_current_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_pagination_next_color') ) : ?>
					.pagination a {
						background: <?php echo get_theme_mod('dreamer_pagination_next_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('dreamer_pagination_text_color') ) : ?>
					.pagination a:hover, 
					.pagination .current,
					.pagination a {
						color: <?php echo get_theme_mod('dreamer_pagination_text_color');  ?>;
					}
				<?php endif; ?>
			</style>
			<style id="dreamer-custom-css">
				<?php if ( get_theme_mod('dreamer_css') ) : ?>
					<?php echo get_theme_mod('dreamer_css');  ?>;
				<?php endif; ?>
			</style>
		<?php
    }
}
endif;
add_action( 'wp_head', 'dreamer_apply_style' );

/**
 * Customizer Footer
 *
 * @since dreamer 1.0
 */
if ( ! function_exists( 'dreamer_apply_footer' ) ) :
  	
  	function dreamer_apply_footer() {	
		if ( get_theme_mod('dreamer_scripts') ) { 
		?>

		<script id="dreamer-custom-scriptss">
			<?php if ( get_theme_mod('dreamer_scripts') ) : ?>
				<?php echo get_theme_mod('dreamer_scripts');  ?>;
			<?php endif; ?>
		</script>
		<?php
    }
}
endif;
add_action('wp_footer', 'dreamer_apply_footer');