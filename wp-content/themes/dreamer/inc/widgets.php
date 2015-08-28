<?php
/**
 * Custom Widgets
 *
 * @package dreamer
 * @since dreamer 1.0
 */

/**
 * Social Links
 *
 * @since dreamer 1.0
 */
class social_dreamer extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	function social_dreamer() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-social', 'description' => 'Show Icons of your Social Links.', 'dreamer' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'social_dreamer' );

		/* Create the widget. */
		$this->WP_Widget( 'social_dreamer', 'Social Links (dreamer)', $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters( 'widget_title', $instance['title'] );
		$feed = $instance['feed'];
		$email = $instance['email'];
		$linkedin = $instance['linkedin'];
		$bloglovin = $instance['bloglovin'];
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$googleplus = $instance['googleplus'];
		$pinterest = $instance['pinterest'];
		$instagram = $instance['instagram'];
		$flickr = $instance['flickr'];
		$youtube = $instance['youtube'];
		$vimeo = $instance['vimeo'];
		$dribbble = $instance['dribbble'];
		$behance = $instance['behance'];
		$github = $instance['github'];
		$skype = $instance['skype'];
		$tumblr = $instance['tumblr'];
		$wordpress = $instance['wordpress'];


		/* Before widget (defined by themes). */
		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		if ( $feed )
			echo '<span><a href="' . $feed . '" title="' . __( 'Feed', 'dreamer' ) . '" class="' . __( 'social social-feed', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $email )
			echo '<span><a href="mailto:' . $email . '" title="' . __( 'Email', 'dreamer' ) . '" class="' . __( 'social social-email', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $linkedin )
			echo '<span><a href="' . $linkedin . '" title="' . __( 'Linkedin', 'dreamer' ) . '" class="' . __( 'social social-linkedin', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';
		
		if ( $bloglovin )
			echo '<span><a href="' . $bloglovin . '" title="' . __( 'Bloglovin', 'dreamer' ) . '" class="' . __( 'social social-bloglovin', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $twitter )
			echo '<span><a href="' . $twitter . '" title="' . __( 'Twitter', 'dreamer' ) . '" class="' . __( 'social social-twitter', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $facebook )
			echo '<span><a href="' . $facebook . '" title="' . __( 'Facebook', 'dreamer' ) . '" class="' . __( 'social social-facebook', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $googleplus )
			echo '<span><a href="' . $googleplus . '" title="' . __( 'Googleplus', 'dreamer' ) . '" class="' . __( 'social social-googleplus', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $pinterest )
			echo '<span><a href="' . $pinterest . '" title="' . __( 'Pinterest', 'dreamer' ) . '" class="' . __( 'social social-pinterest', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $instagram )
			echo '<span><a href="' . $instagram . '" title="' . __( 'Instagram', 'dreamer' ) . '" class="' . __( 'social social-instagram', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $flickr )
			echo '<span><a href="' . $flickr . '" title="' . __( 'Flickr', 'dreamer' ) . '" class="' . __( 'social social-flickr', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $youtube )
			echo '<span><a href="' . $youtube . '" title="' . __( 'Youtube', 'dreamer' ) . '" class="' . __( 'social social-youtube', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $vimeo )
			echo '<span><a href="' . $vimeo . '" title="' . __( 'Vimeo', 'dreamer' ) . '" class="' . __( 'social social-vimeo', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $dribbble )
			echo '<span><a href="' . $dribbble . '" title="' . __( 'Dribbble', 'dreamer' ) . '" class="' . __( 'social social-dribbble', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $behance )
			echo '<span><a href="' . $behance . '" title="' . __( 'Behance', 'dreamer' ) . '" class="' . __( 'social-fontello social-behance', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $github )
			echo '<span><a href="' . $github . '" title="' . __( 'Github', 'dreamer' ) . '" class="' . __( 'social social-github', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $skype )
			echo '<span><a href="' . $skype . '" title="' . __( 'Skype', 'dreamer' ) . '" class="' . __( 'social social-skype', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $tumblr )
			echo '<span><a href="' . $tumblr . '" title="' . __( 'Tumblr', 'dreamer' ) . '" class="' . __( 'social social-tumblr', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';

		if ( $wordpress )
			echo '<span><a href="' . $wordpress . '" title="' . __( 'Wordpress', 'dreamer' ) . '" class="' . __( 'social social-wordpress', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>';
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['feed'] = $new_instance['feed'];
		$instance['email'] = $new_instance['email'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['bloglovin'] = $new_instance['bloglovin'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['googleplus'] = $new_instance['googleplus'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['vimeo'] = $new_instance['vimeo'];
		$instance['dribbble'] = $new_instance['dribbble'];
		$instance['behance'] = $new_instance['behance'];
		$instance['github'] = $new_instance['github'];
		$instance['skype'] = $new_instance['skype'];
		$instance['tumblr'] = $new_instance['tumblr'];
		$instance['wordpress'] = $new_instance['wordpress'];

		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
						'title' => 'Social Links', 
						'feed' => 'http://www.website.com/feed/',
						'email' => '', 
						'linkedin' => '',
						'bloglovin' => '',
						'twitter' => '',
						'facebook' => '',
						'googleplus' => '',
						'pinterest' => '',
						'instagram' => '',
						'flickr' => '',
						'youtube' => '',
						'vimeo' => '',
						'dribbble' => '',
						'behance' => '',
						'github' => '',
						'skype' => '',
						'tumblr' => '',
						'tumblr' => ''
					);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'feed' ); ?>"><?php _e('Feed:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'feed' ); ?>" name="<?php echo $this->get_field_name( 'feed' ); ?>" value="<?php echo $instance['feed']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance['email']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('Linkedin:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bloglovin' ); ?>"><?php _e('Bloglovin:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'bloglovin' ); ?>" name="<?php echo $this->get_field_name( 'bloglovin' ); ?>" value="<?php echo $instance['bloglovin']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Googleplus:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instance['instagram']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e('Flickr:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo $instance['flickr']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Youtube:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e('Dribbble:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e('Behance:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e('Github:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo $instance['github']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e('Skype:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo $instance['skype']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'wordpress' ); ?>"><?php _e('Wordpress:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'wordpress' ); ?>" name="<?php echo $this->get_field_name( 'wordpress' ); ?>" value="<?php echo $instance['wordpress']; ?>" style="width:100%;" />
		</p>

		<?php
	}

}

function register_social_dreamer() {
    register_widget( 'social_dreamer' );
}
add_action( 'widgets_init', 'register_social_dreamer' );

/**
 * About Widget
 *
 * @since dreamer 1.0
 */
class about_dreamer extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	function about_dreamer() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-about', 'description' => 'About Widget with your image and description.', 'dreamer' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'about_dreamer' );

		/* Create the widget. */
		$this->WP_Widget( 'about_dreamer', 'About (dreamer)', $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters( 'widget_title', $instance['title'] );
		$imageurl = $instance['imageurl'];
		$imagealt = $instance['imagealt'];
		$imagewidth = $instance['imagewidth'];
		$imageheight = $instance['imageheight'];
		$aboutdescription = $instance['aboutdescription'];
		$feed = $instance['feed'];
		$email = $instance['email'];
		$linkedin = $instance['linkedin'];
		$bloglovin = $instance['bloglovin'];
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$googleplus = $instance['googleplus'];
		$pinterest = $instance['pinterest'];
		$instagram = $instance['instagram'];
		$flickr = $instance['flickr'];
		$youtube = $instance['youtube'];
		$vimeo = $instance['vimeo'];
		$dribbble = $instance['dribbble'];
		$behance = $instance['behance'];
		$github = $instance['github'];
		$skype = $instance['skype'];
		$tumblr = $instance['tumblr'];
		$wordpress = $instance['wordpress'];

		echo $before_widget; 
		?>

			<div class="about">
				<div class="about-image">
					<img src="<?php echo $imageurl; ?>" width="<?php echo $imagewidth; ?>" height="<?php echo $imageheight; ?>" class="about-img" alt="<?php echo $imagealt; ?>">
				</div>

				<?php if($title != '') echo '<h5 class="widget-title">'.$title.'</h5>'; ?>
				
				<div class="about-description">
					<p><?php echo $aboutdescription; ?></p>
					<p class="about-social">
						<?php if($feed != '') echo '<span><a href="' . $feed . '" title="' . __( 'Feed', 'dreamer' ) . '" class="' . __( 'social social-feed', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($email != '') echo '<span><a href="mailto:' . $email . '" title="' . __( 'Email', 'dreamer' ) . '" class="' . __( 'social social-email', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($linkedin != '') echo '<span><a href="' . $linkedin . '" title="' . __( 'Linkedin', 'dreamer' ) . '" class="' . __( 'social social-linkedin', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($bloglovin != '') echo '<span><a href="' . $bloglovin . '" title="' . __( 'Bloglovin', 'dreamer' ) . '" class="' . __( 'social social-bloglovin', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($twitter != '') echo '<span><a href="' . $twitter . '" title="' . __( 'Twitter', 'dreamer' ) . '" class="' . __( 'social social-twitter', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($facebook != '') echo '<span><a href="' . $facebook . '" title="' . __( 'Facebook', 'dreamer' ) . '" class="' . __( 'social social-facebook', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($googleplus != '') echo '<span><a href="' . $googleplus . '" title="' . __( 'Googleplus', 'dreamer' ) . '" class="' . __( 'social social-googleplus', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($pinterest != '') echo '<span><a href="' . $pinterest . '" title="' . __( 'Pinterest', 'dreamer' ) . '" class="' . __( 'social social-pinterest', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($instagram != '') echo '<span><a href="' . $instagram . '" title="' . __( 'Instagram', 'dreamer' ) . '" class="' . __( 'social social-instagram', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($flickr != '') echo '<span><a href="' . $flickr . '" title="' . __( 'Flickr', 'dreamer' ) . '" class="' . __( 'social social-flickr', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($youtube != '') echo '<span><a href="' . $youtube . '" title="' . __( 'Youtube', 'dreamer' ) . '" class="' . __( 'social social-youtube', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($vimeo != '') echo '<span><a href="' . $vimeo . '" title="' . __( 'Vimeo', 'dreamer' ) . '" class="' . __( 'social social-vimeo', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($dribbble != '') echo '<span><a href="' . $dribbble . '" title="' . __( 'Dribbble', 'dreamer' ) . '" class="' . __( 'social social-dribbble', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($behance != '') echo '<span><a href="' . $behance . '" title="' . __( 'Behance', 'dreamer' ) . '" class="' . __( 'social-fontello social-behance', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($github != '') echo '<span><a href="' . $github . '" title="' . __( 'Github', 'dreamer' ) . '" class="' . __( 'social social-github', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($skype != '') echo '<span><a href="' . $skype . '" title="' . __( 'Skype', 'dreamer' ) . '" class="' . __( 'social social-skype', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($tumblr != '') echo '<span><a href="' . $tumblr . '" title="' . __( 'Tumblr', 'dreamer' ) . '" class="' . __( 'social social-tumblr', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
						<?php if($wordpress != '') echo '<span><a href="' . $wordpress . '" title="' . __( 'Wordpress', 'dreamer' ) . '" class="' . __( 'social social-wordpress', 'dreamer' ) . '" target="' . __( '_blank', 'dreamer' ) . '"></a></span>'; ?>
					</p>
				</div>
			</div>

		<?php
		echo $after_widget;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['imageurl'] = $new_instance['imageurl'];
		$instance['imagealt'] = $new_instance['imagealt'];
		$instance['imagewidth'] = $new_instance['imagewidth'];
		$instance['imageheight'] = $new_instance['imageheight'];
		$instance['aboutdescription'] = $new_instance['aboutdescription'];
		$instance['feed'] = $new_instance['feed'];
		$instance['email'] = $new_instance['email'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['bloglovin'] = $new_instance['bloglovin'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['googleplus'] = $new_instance['googleplus'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['vimeo'] = $new_instance['vimeo'];
		$instance['dribbble'] = $new_instance['dribbble'];
		$instance['behance'] = $new_instance['behance'];
		$instance['github'] = $new_instance['github'];
		$instance['skype'] = $new_instance['skype'];
		$instance['tumblr'] = $new_instance['tumblr'];
		$instance['wordpress'] = $new_instance['wordpress'];

		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
						'title' => 'About Me', 
						'imageurl' => 'http://...', 
						'imagealt' => '',  
						'imagewidth' => '230', 
						'imageheight' => '230',
						'aboutdescription' => '',
						'feed' => 'http://www.website.com/feed/',
						'email' => '',
						'linkedin' => '',
						'bloglovin' => '',
						'twitter' => '',
						'facebook' => '',
						'googleplus' => '',
						'pinterest' => '',
						'instagram' => '',
						'flickr' => '',
						'youtube' => '',
						'vimeo' => '',
						'dribbble' => '',
						'behance' => '',
						'github' => '',
						'skype' => '',
						'tumblr' => '',
						'tumblr' => ''
					);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'imageurl' ); ?>"><?php _e('Image URL:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'imageurl' ); ?>" name="<?php echo $this->get_field_name( 'imageurl' ); ?>" value="<?php echo $instance['imageurl']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'imagealt' ); ?>"><?php _e('Image ALT:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'imagealt' ); ?>" name="<?php echo $this->get_field_name( 'imagealt' ); ?>" value="<?php echo $instance['imagealt']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'imagewidth' ); ?>"><?php _e('Image Width:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'imagewidth' ); ?>" name="<?php echo $this->get_field_name( 'imagewidth' ); ?>" value="<?php echo $instance['imagewidth']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'imageheight' ); ?>"><?php _e('Image Height:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'imageheight' ); ?>" name="<?php echo $this->get_field_name( 'imageheight' ); ?>" value="<?php echo $instance['imageheight']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'aboutdescription' ); ?>"><?php _e('About Description:','dreamer'); ?></label>
			<textarea id="<?php echo $this->get_field_id( 'aboutdescription' ); ?>" name="<?php echo $this->get_field_name( 'aboutdescription' ); ?>" rows="12" cols="20" style="width:100%;"><?php echo $instance['aboutdescription']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'feed' ); ?>"><?php _e('Feed:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'feed' ); ?>" name="<?php echo $this->get_field_name( 'feed' ); ?>" value="<?php echo $instance['feed']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance['email']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('Linkedin:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bloglovin' ); ?>"><?php _e('Bloglovin:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'bloglovin' ); ?>" name="<?php echo $this->get_field_name( 'bloglovin' ); ?>" value="<?php echo $instance['bloglovin']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Googleplus:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instance['instagram']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e('Flickr:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo $instance['flickr']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Youtube:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e('Dribbble:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e('Behance:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e('Github:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo $instance['github']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e('Skype:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo $instance['skype']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'wordpress' ); ?>"><?php _e('Wordpress:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'wordpress' ); ?>" name="<?php echo $this->get_field_name( 'wordpress' ); ?>" value="<?php echo $instance['wordpress']; ?>" style="width:100%;" />
		</p>

		<?php
	}

}

function register_about_dreamer() {
    register_widget( 'about_dreamer' );
}
add_action( 'widgets_init', 'register_about_dreamer' );

/**
 * Instagram Widget
 *
 * @since dreamer 1.0
 */
class instagram_dreamer extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	function instagram_dreamer() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-instagram', 'description' => 'Instagram Widget with images from your instagram feed.', 'dreamer' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'instagram_dreamer' );

		/* Create the widget. */
		$this->WP_Widget( 'instagram_dreamer', 'Instagram (dreamer)', $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters( 'widget_title', $instance['title'] );
		$username = $instance['username'];
		$number = $instance['number'];
		$customsize = $instance['customsize'];

		echo $before_widget; 
		?>

			<div class="instagram-wrap">
				<?php if($title != '') echo '<h5 class="widget-title">'.$title.'</h5>'; ?>
				<?php if($username != '') {
					$images_array = $this->scrape_instagram($username, $number);

					if ( is_wp_error($images_array) ) {
					   echo $images_array->get_error_message();
					} else {
						?><ul class="instagram-pics"><?php
						foreach ($images_array as $image) {
							echo '<li><a href="'.$image['link'].'" target="_blank"><img src="'.$image['large']['url'].'"  alt="'.$image['description'].'" title="'.$image['description'].'" width="'.$customsize.'" height="'.$customsize.'"/></a></li>';
						}
						?></ul><?php
					}
				}?>
			</div>

		<?php
		echo $after_widget;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = trim(strip_tags($new_instance['username']));
		$instance['number'] = !absint($new_instance['number']) ? 6 : $new_instance['number'];
		$instance['customsize'] = $new_instance['customsize'];

		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, 
			array( 
				'title' => __('Instagram','dreamer'), 
				'username' => '', 
				'number' => 6, 
				'customsize' => '90'
				) 
			);
		$title = esc_attr($instance['title']);
		$username = esc_attr($instance['username']);
		$number = absint($instance['number']);
		$customsize = esc_attr($instance['customsize']);
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Username:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo $instance['username']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of photos:','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $instance['number']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'customsize' ); ?>"><?php _e('Custom Size (suggested 90):','dreamer'); ?></label>
			<input id="<?php echo $this->get_field_id( 'customsize' ); ?>" name="<?php echo $this->get_field_name( 'customsize' ); ?>" value="<?php echo $instance['customsize']; ?>" style="width:100%;" />
		</p>

		<?php
	}

	// based on https://gist.github.com/cosmocatalano/4544576
	function scrape_instagram($username, $slice = 9) {

		if (false === ($instagram = get_transient('instagram-photos-'.sanitize_title_with_dashes($username)))) {
			
			$remote = wp_remote_get('http://instagram.com/'.trim($username));

			if (is_wp_error($remote)) 
	  			return new WP_Error('site_down', __('Unable to communicate with Instagram.','dreamer'));

  			if ( 200 != wp_remote_retrieve_response_code( $remote ) ) 
  				return new WP_Error('invalid_response', __('Instagram did not return a 200.','dreamer'));

			$shards = explode('window._sharedData = ', $remote['body']);
			$insta_json = explode(';</script>', $shards[1]);
			$insta_array = json_decode($insta_json[0], TRUE);

			if (!$insta_array)
	  			return new WP_Error('bad_json', __('Instagram has returned invalid data.','dreamer'));

			$images = $insta_array['entry_data']['UserProfile'][0]['userMedia'];

			$instagram = array();
			foreach ($images as $image) {

				if ($image['type'] == 'image' && $image['user']['username'] == $username) {

					$instagram[] = array(
						'description' 	=> $image['caption']['text'],
						'link' 			=> $image['link'],
						'time'			=> $image['created_time'],
						'comments' 		=> $image['comments']['count'],
						'likes' 		=> $image['likes']['count'],
						'large' 		=> $image['images']['standard_resolution']
					);
				}
			}

			$instagram = base64_encode( serialize( $instagram ) );
			set_transient('instagram-photos-'.sanitize_title_with_dashes($username), $instagram, apply_filters('null_instagram_cache_time', HOUR_IN_SECONDS*2));
		}

		$instagram = unserialize( base64_decode( $instagram ) );

		return array_slice($instagram, 0, $slice);
	}

}

function register_instagram_dreamer() {
    register_widget( 'instagram_dreamer' );
}
add_action( 'widgets_init', 'register_instagram_dreamer' );