<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package dreamer
 * @since dreamer 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function dreamer_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'dreamer_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dreamer_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'dreamer_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function dreamer_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'dreamer' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'dreamer_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function dreamer_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'dreamer_setup_author' );

/**
 * Slider Post Type
 *
 * @since dreamer 1.0
 */
function dreamer_slider_post_type() {

	$labels = array(
		'name' => __( 'Slides', 'dreamer' ),
		'singular_name' => __( 'Slide', 'dreamer' ),
		'all_items' => __( 'All Slides', 'dreamer' ),
		'add_new' => __( 'Add New Slide', 'dreamer' ),
		'add_new_item' => __( 'Add New Slide', 'dreamer' ),
		'edit_item' => __( 'Edit Slide', 'dreamer' ),
		'new_item' => __( 'New Slide', 'dreamer' ),
		'view_item' => __( 'View Slide', 'dreamer' ),
		'search_items' => __( 'Search Slides', 'dreamer' ),
		'not_found' => __( 'No Slide found', 'dreamer' ),
		'not_found_in_trash' => __( 'No Slide found in Trash', 'dreamer' )
	);
	$args = array(
    	'labels' => $labels,
    	'public' => true,
		'supports' => array( 'title', 'thumbnail', 'page-attributes' ),
		'capability_type' => 'post',
		'rewrite' => array("slug" => "slides"), // Permalinks format
		'menu_position' => 20,
		'has_archive' => true
	);
	register_post_type( 'slides', $args );
}
add_action( 'init', 'dreamer_slider_post_type' );

/**
 * Add Meta Box Slider Post Type
 *
 * @since dreamer 1.0
 */
function dreamer_slider_create_slide_metaboxes() {
    add_meta_box( 'dreamer_slider_metabox_1', __( 'Slide Link', 'dreamer' ), 'dreamer_slider_metabox_1', 'slides', 'normal', 'default' );
}
add_action( 'add_meta_boxes', 'dreamer_slider_create_slide_metaboxes' );

/**
 * Output Meta Box Slider Post Type
 *
 * @since dreamer 1.0
 */             
function dreamer_slider_metabox_1() {
	
	global $post;	
             
	/* Retrieve the metadata values if they already exist. */
	$slide_link_url = get_post_meta( $post->ID, '_slide_link_url', true ); ?>
	
	<p>URL: <input type="text" style="width: 90%;" name="slide_link_url" value="<?php echo esc_attr( $slide_link_url ); ?>" /></p>
	<span class="description"><?php echo _e( 'The URL this slide should link to.', 'dreamer' ); ?></span>
	
<?php }

/**
 * Save Meta Box Slider Post Type
 *
 * @since dreamer 1.0
 */
function dreamer_slider_save_meta( $post_id, $post ) {
	
	if ( isset( $_POST['slide_link_url'] ) ) {
		update_post_meta( $post_id, '_slide_link_url', strip_tags( $_POST['slide_link_url'] ) );
	}	
}
add_action( 'save_post', 'dreamer_slider_save_meta', 1, 2 );

/**
 * Facebook Open Graph
 *
 * @since dreamer 1.0
 */
function dreamer_fb_open_graph_tags() {
	if (is_single()) {
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$image = $thumbnail_object->guid;
		} else {	
			$image = ''; // Change this to the URL of the logo you want beside your links shown on Facebook
		}
		//$description = get_bloginfo('description');
		$description = my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace("\"", "'", $description);
?>
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $image; ?>" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />

<?php 	}
}

function my_excerpt($text, $excerpt){
	
    if ($excerpt) return $excerpt;

    $text = strip_shortcodes( $text );

    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = preg_split("/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
    } else {
            $text = implode(' ', $words);
    }

    return apply_filters('wp_trim_excerpt', $text, $excerpt);
}
add_action('wp_head', 'dreamer_fb_open_graph_tags');