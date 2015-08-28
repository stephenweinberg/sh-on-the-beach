<?php
/**
 * dreamer Shortcodes
 *
 * @package dreamer
 * @since dreamer 1.0
 */

/**
 * TABLE OF CONTENTS:
 ***********************
 * 1.0 - Dropcap
 * 2.0 - Slider
 * 3.0 - Columns
 * 4.0 - Buttons
 * 5.0 - Alerts
 * 6.0 - Icons
 * 7.0 - Highlights
 * 8.0 - Dividers
 * 9.0 - Archive
 ***********************
 */

/**
 * Remove <p></p> before and after the shortcode
 *
 * @since dreamer 1.0
 */
function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);

    return $content;
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');

/**
 * 1.0 Dropcap
 *
 * @since dreamer 1.0
 */
function dreamer_dropcap_shortcode( $atts, $content = null ) {
	return '<span class="dropcap">' . $content . '</span>';
}
add_shortcode( 'dropcap', 'dreamer_dropcap_shortcode' );

/**
 * 2.0 Slider
 *
 * @since dreamer 1.0
 */
function dreamer_responsive_slider($atts) {

	$slides = new WP_Query(
		array( 
			'orderby' => 'menu_order', 
			'order' => 'ASC' , 
			'post_type' => 'slides'
		)
	);

	$slider = '<div class="responsive-slider flexslider"><ul class="slides">';
	
	if($slides->have_posts()) : while($slides->have_posts()) : $slides->the_post();
				   
	$slider .= '<li><div id="slide-' . get_the_ID() . '" class="slide">';
						
	global $post;

		if ( has_post_thumbnail() ) {

			if ( get_post_meta( $post->ID, "_slide_link_url", true ) ) 
				$slider .= '<a href="' . get_post_meta( $post->ID, "_slide_link_url", true ) . '" title="' .  the_title_attribute ( array( 'echo' => 0 ) ) . '" >';

				$slider .= get_the_post_thumbnail( $post->ID, 'slide-thumbnail', array( 'class' => 'slide-thumbnail' ) );

			if ( get_post_meta( $post->ID, "_slide_link_url", true ) ) 
				$slider .= '</a>';

		}

	$slider .= '<h5 class="slide-title"><a href="' . get_post_meta( $post->ID, "_slide_link_url", true ) . '" title="' . the_title_attribute ( array( 'echo' => 0 ) ) . '" >' . get_the_title() . '</a></h5>';

	$slider .= '</div></li>';

	endwhile;

	wp_reset_query();

	return $slider . '</ul></div>';

	endif;
}
add_shortcode( 'slider', 'dreamer_responsive_slider' );

/**
 * 3.0 Columns
 *
 * @since dreamer 1.0
 */
function dreamer_columns() {
	add_shortcode('row-start', 'dreamer_row_start');
	add_shortcode('row-end', 'dreamer_row_end');
	add_shortcode('half', 'dreamer_half');
	add_shortcode('one-third', 'dreamer_one_third');
	add_shortcode('two-thirds', 'dreamer_two_thirds');
	add_shortcode('one-fourth', 'dreamer_one_fourth');
	add_shortcode('three-fourths', 'dreamer_three_fourths');
	add_shortcode('one-fifth', 'dreamer_one_fifth');
	add_shortcode('four-fifths', 'dreamer_four_fifths');
	add_shortcode('one-sixth', 'dreamer_one_sixth');
	add_shortcode('five-sixths', 'dreamer_five_sixths');
}
add_action( 'wp_head', 'dreamer_columns' );

function dreamer_row_start( $atts ) {
	return '<div class="row-shortcode clear">';
}

function dreamer_row_end( $atts ) {
	return '</div>';
}

function dreamer_half( $atts, $content = null ) {
	return '<div class="column half">' . do_shortcode($content) . '</div>';
}

function dreamer_one_third( $atts, $content = null ) {
	return '<div class="column third">' . do_shortcode($content) . '</div>';
}

function dreamer_two_thirds( $atts, $content = null ) {
	return '<div class="column two-thirds">' . do_shortcode($content) . '</div>';
}

function dreamer_one_fourth( $atts, $content = null ) {
	return '<div class="column fourth">' . do_shortcode($content) . '</div>';
}

function dreamer_three_fourths( $atts, $content = null ) {
	return '<div class="column three-fourths">' . do_shortcode($content) . '</div>';
}

function dreamer_one_fifth( $atts, $content = null ) {
	return '<div class="column fifth">' . do_shortcode($content) . '</div>';
}

function dreamer_four_fifths( $atts, $content = null ) {
	return '<div class="column four-fifths">' . do_shortcode($content) . '</div>';
}

function dreamer_one_sixth( $atts, $content = null ) {
	return '<div class="column sixth">' . do_shortcode($content) . '</div>';
}

function dreamer_five_sixths( $atts, $content = null ) {
	return '<div class="column five-sixths">' . do_shortcode($content) . '</div>';
}

/**
 * 4.0 Buttons
 *
 * @since dreamer 1.0
 */
function dreamer_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url' => '#',
		'target' => '_self',
		'color' => 'grey',
		'size' => 'small',
		'type' => 'square',
		'display' => '',
		'title' => '',
		'class' => '',
		'rel' => ''
    ), $atts));
	
   return '<a target="'.$target.'" class="button '.$size.' '.$color.' '. $type .' '. $class .' '. $display .'" href="'.$url.'" title="' . $title . '" rel="' . $rel . '">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'dreamer_button');

/**
 * 5.0 Alerts
 *
 * @since dreamer 1.0
 */
function dreamer_alert( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'color' => 'grey',
		'type' => 'square',
		'text_align' => 'center',
		'width' => '100%'
    ), $atts));
	
   return '<div class="alert '.$color.' '. $type .' '. $text_align .'" style="width:'.$width.';">' . do_shortcode($content) . '</div>';
}
add_shortcode('alert', 'dreamer_alert');

/**
 * 6.0 Icons
 *
 * @since dreamer 1.0
 */
function dreamer_icon( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type' => '',
		'size' => '32px'
    ), $atts));
	
   return '<span class="genericon genericon-'.$type.'" style="font-size:'.$size.'; width:'.$size.'; height:'.$size.';">' . do_shortcode($content) . '</span>';
}
add_shortcode('icon', 'dreamer_icon');

/**
 * 7.0 Highlights
 *
 * @since dreamer 1.0
 */
function dreamer_highlight( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'color'	=> 'grey',
		'class'	=> ''
	  ), $atts ));
	  return '<span class="highlight ' . $color . ' ' . $class . '">' . do_shortcode($content) . '</span>';

}
add_shortcode('highlight', 'dreamer_highlight');

/**
 * 8.0 Dividers
 *
 * @since dreamer 1.0
 */
function dreamer_divider( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'color'	=> 'grey',
		'type'	=> 'solid',
		'width'	=> '100%',
		'class'	=> ''
	  ), $atts ));
	  return '<hr class="divider ' . $color . ' ' . $type . ' ' . $class . '" style="width:'.$width.';">' . do_shortcode($content) . '</span>';

}
add_shortcode('divider', 'dreamer_divider');

/**
 * 9.0 Archive
 *
 * @since dreamer 1.0
 */
function dreamer_archive_shortcode($atts, $content = null){
   	
   	extract(shortcode_atts(
   		array(
			'posts' => '',
			'cat' => '',
			'orderby' => '',
			'order' => ''
		), 
	$atts));

	$loop = new WP_Query(
		array( 
			'order' => $order, 
			'showposts' => $posts, 
			'cat' => $cat,
			'orderby' => $orderby
		)
	);

	$list = '<h3 class="shortcode-content">' . $content . '</h3><ul class="shortcode-archive">';

	if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();

	$list .= '<li><span class="shortcode-archive-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></span><span class="shortcode-date">' . get_the_date() . '</span></li>';

	endwhile;
	
	wp_reset_query();
	
	return $list . '</ul>';

	endif;

}
add_shortcode('archive', 'dreamer_archive_shortcode');